<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'tag_video');
    }
}
