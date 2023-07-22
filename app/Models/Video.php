<?php

namespace App\Models;

use App\Models\Storage; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    protected $fillable = [
        'user_id', 
        'videos_title', 
        'videos_description', 
        'video_path', 
        'thumbnail_path',
        'views',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_video');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }   
}
