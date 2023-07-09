<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['videos_title', 'videos_description', 'videos_tags', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
