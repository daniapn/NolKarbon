<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_type',
        'description',
        'subject_type',
        'subject_id',
        'performed_by',
        'occurred_at',
        'metadata',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
        'metadata' => 'array',
    ];

    // 🔥 FIX: relasi ke tabel penggunas
    public function user(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'idPengguna');
    }

    // 🔥 FIX: relasi performed_by → penggunas
    public function performedBy(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'performed_by', 'idPengguna');
    }

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }
}
