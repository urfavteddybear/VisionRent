<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    // Menentukan atribut yang dapat diisi
    protected $fillable = [
        'user_id',
        'item_id',
        'start_date',
        'end_date',
        'dp',
        'status', // Status rental (dipinjam/kembali)
    ];

    // Menentukan tipe data untuk beberapa kolom
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Kurangi stok barang saat rental dibuat
    protected static function booted()
    {
        static::creating(function ($rental) {
            // Periksa apakah stok barang mencukupi
            $item = $rental->item;
            if ($item->stock <= 0) {
                throw new \Exception('Stok barang habis!');
            }
            // Kurangi stok barang
            // $item->decrement('stock');
        });

        static::creating(function ($rental) {
            // Check if the item is available for the requested period
            $conflictingRentals = static::where('item_id', $rental->item_id)
                ->where(function ($query) use ($rental) {
                    $query->whereBetween('start_date', [$rental->start_date, $rental->end_date])
                        ->orWhereBetween('end_date', [$rental->start_date, $rental->end_date])
                        ->orWhere(function ($q) use ($rental) {
                            $q->where('start_date', '<=', $rental->start_date)
                            ->where('end_date', '>=', $rental->end_date);
                        });
                })
                ->count();

            $item = $rental->item;

            if ($conflictingRentals >= $item->stock) {
                throw new \Exception('Barang tidak tersedia untuk periode yang dipilih!');
            }

            // Set initial status
            $rental->status = Carbon::today()->lt($rental->start_date) ? 'scheduled' : 'rented';

            // Only decrement stock if rental starts today
            if ($rental->status === 'rented') {
                $item->decrement('stock');
            }
        });
    }

    // Tambah stok barang saat rental dikembalikan
    public function returnItem()
    {
        // Ambil item yang terkait dengan rental
        $item = $this->item;

        // Tambahkan stok barang yang dikembalikan
        $item->increment('stock');

        // Update status rental menjadi 'returned'
        $this->update(['status' => 'returned']);
    }

}
