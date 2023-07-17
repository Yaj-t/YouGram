<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         // Create default tags
         $defaultTags = [
            'php',
            'cplusplus',
            'mysql',
            'swift',
            'csharp',
            'others',
        ];

        foreach ($defaultTags as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }

    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
