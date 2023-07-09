<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'php',
        'cplusplus',
        'mysql',
        'swift',
        'csharp',
        'others',
    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
