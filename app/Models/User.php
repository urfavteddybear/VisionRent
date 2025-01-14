<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'full_name',
        'nik',
        'phone',
        'address',
        'ktp_path',
        'verification_status',
        'rejection_reason'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function needsVerification(): bool
    {
        return $this->verification_status === 'unverified' && $this->role === 'customer';
    }

    public function isPending(): bool
    {
        return $this->verification_status === 'pending';
    }
}
