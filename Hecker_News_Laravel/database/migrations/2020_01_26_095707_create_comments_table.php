<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->unsignedBigInteger('commentable_id');
            $table->mediumText('commentable_type');
            $table->mediumText('text');
            $table->string('type');
            $table->string('comment_by');
            $table->string('title');
            $table->boolean('approved');
            $table->enum('comment_kids',array('foo', 'bar'));
            $table->enum('comment_parent', array('foo', 'bar'));
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
        Schema::dropIfExists('comments');
    }
}
