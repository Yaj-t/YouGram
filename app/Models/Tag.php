<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function video(): BelongsToMany
    {
        return $this->belongsToMany(Video::class);
    }
}
