<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontributor extends Model
{
    protected $table = 'kontributors';
    protected $primaryKey = 'idKontributor';
    public $incrementing = false; // PK bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'idKontributor',
        'nama',
        'email',
        'password',
        'tanggalDaftar'
    ];

    public $timestamps = false; // karna tabel tidak punya created_at & updated_at

    // Relasi: Kontributor punya banyak DraftArtikel
    public function draftArtikels()
    {
        return $this->hasMany(DraftArtikel::class, 'idKontributor', 'idKontributor');
    }
}
