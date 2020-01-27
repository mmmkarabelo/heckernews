<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->bigIncrements('poll_id');
            $table->unsignedBigInteger('Pollable_id');
            $table->mediumText('Pollable_type');
            $table->integer('score');
            $table->string('text');
            $table->string('time');
            $table->string('title');
            $table->string('type');
            $table->enum('comment_kids',array('foo', 'bar'));
            $table->enum('poll_parts', array('foo', 'bar'));
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
        Schema::dropIfExists('polls');
    }
}
