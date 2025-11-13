<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ini udah bener!
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pengguna extends Authenticatable // ⬅ ubah ini
{
    use HasFactory, Notifiable;

    protected $table = 'penggunas';

    protected $primaryKey = 'idPengguna';
    public $incrementing = true; 
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'email',
        'universitas',
        'password',
        'role',
        'status',
        'join_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'join_date' => 'date',
    ];

    /**
     * Mutator untuk otomatis enkripsi password
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value)
        );
    }
}
