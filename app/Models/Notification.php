<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // Nama tabel di database
    protected $table = 'notifications';

    // Laravel secara default sudah anggap kolom 'id' sebagai primary key
    protected $primaryKey = 'id';

    // Kalau tidak ada kolom 'updated_at', kita matikan timestamps
    public $timestamps = false;

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'judul',
        'status',
        'catatan',
        'created_at',
    ];

    // Casting tipe data agar sesuai dengan di database
    protected $casts = [
        'id' => 'integer',
        'judul' => 'string',
        'status' => 'string',
        'catatan' => 'string',
        'created_at' => 'datetime',
    ];
}
