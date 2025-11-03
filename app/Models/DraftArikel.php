<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DraftArtikel extends Model
{
    protected $table = 'draft_artikels';
    protected $primaryKey = 'idDraft';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idDraft',
        'judul',
        'isi',
        'gambar',
        'tanggalDibuat',
        'tanggalUpdate',
        'status',
        'catatanRevisi',
        'idKontributor'
    ];

    public $timestamps = false;

    // Relasi: DraftArtikel dimiliki oleh 1 Kontributor
    public function kontributor()
    {
        return $this->belongsTo(Kontributor::class, 'idKontributor', 'idKontributor');
    }
}
