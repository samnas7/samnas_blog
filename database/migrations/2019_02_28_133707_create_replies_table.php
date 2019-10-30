<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # if (Schema::hasTable('comments')) {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Anonymous');
            $table->string('email')->default('Anonymous');
            $table->longText('message');
            $table->smallInteger('status')->default(false);

            $table->integer('comment_id')->unsigned();

            #$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');;
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
        Schema::dropIfExists('replies');
    }
}
