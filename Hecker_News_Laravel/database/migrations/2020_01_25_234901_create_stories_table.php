<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('story_id');
            $table->string('title');
            $table->mediumText('text');
            $table->integer('score')->default(0);
            $table->string('type')->nullable();
            $table->string('url')->nullable();
            $table->integer('descendants')->default(0);
            $table->enum('comment_kids',array('foo', 'bar'));
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
        Schema::dropIfExists('stories');
    }
}
