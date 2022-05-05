<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Videos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->Integer('video_id');
            $table->string('type');
            $table->string('title');
            $table->string('description');
            $table->string('url');
            $table->string('thumbnail_url');
            $table->tinyInteger('viewable');
            $table->string('duration');
            $table->Integer('view_count');
            $table->dateTime('published_at');
            $table->tinyInteger('active')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
