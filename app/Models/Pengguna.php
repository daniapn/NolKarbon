<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // supaya bisa login
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
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
    
}
