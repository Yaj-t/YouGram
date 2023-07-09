<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function storeTags(Video $video, $selectedTags)
    {
        $tags = new Tag();
        $tags->video_id = $video->id;

        foreach ($selectedTags as $tag => $value) {
            if ($value) {
                $tags->$tag = true;
            }
        }

        $tags->save();
    }
}
