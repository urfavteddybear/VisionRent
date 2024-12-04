<?php

namespace App\Models;

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
            $item->decrement('stock');
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
