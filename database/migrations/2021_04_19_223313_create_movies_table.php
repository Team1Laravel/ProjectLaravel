<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            // $table->string('cover');
            $table->integer('genre_id')->nullable();
            $table->integer('director_id')->nullable();
            $table->integer('writer_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('desc')->nullable();
            $table->string('keyword')->nullable();
            $table->string('video_link')->nullable();
            // $table->integer('star');
            $table->integer('premiere')->nullable();
            $table->integer('quality')->nullable();
            $table->integer('age_limit')->nullable();
            $table->string('country')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('movies');
    }
}
