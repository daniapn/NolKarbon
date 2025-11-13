<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmissionQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'text',
        'author',
        'is_active',
    ];

    // relasi ke template
    public function template()
    {
        return $this->belongsTo(EmissionTemplate::class, 'template_id');
    }
}
