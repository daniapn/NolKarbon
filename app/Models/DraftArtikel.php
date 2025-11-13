<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DraftArtikel extends Model
{
    protected $table = 'draft_artikels';
    protected $primaryKey = 'idDraft';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = [
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

    public function kontributor()
    {
        return $this->belongsTo(Kontributor::class, 'idKontributor', 'idKontributor');
    }
}
