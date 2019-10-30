<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       # if (Schema::hasTable('comments')) {
            Schema::create('likes', function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('status');

                $table->integer('comment_id')->unsigned();

                $table->foreign('comment_id')->references('id')->on('comments');
                $table->timestamps();
            });
       # }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
