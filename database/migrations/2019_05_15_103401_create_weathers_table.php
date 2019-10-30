<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('high_temp')->default(0);
            $table->integer('low_temp')->default(0);
            $table->integer('humidity')->default(0);
            $table->integer('cloud_cover')->default(0);
            $table->integer('dew_point')->default(0);
            $table->integer('uv_index')->default(0);
            $table->integer('ice')->default(0);
            $table->integer('wet_bulb')->default(0);
            $table->integer('ceiling')->default(0);
            $table->integer('snow')->default(0);
            $table->integer('rain')->default(0);
            $table->integer('visibility')->default(0);
            $table->integer('wind')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('location_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            /*  General error: 1005 Can't create table `samnas_blog`.`#sql-36ac_36` (errno: 150 "Foreign key constraint is incorrectly formed") 
(SQL: alter table `weathers` add constraint `weathers_user_id_foreign` foreign key (`user_id`) references `users` (`id `)) */

            $table->timestamps();
        });
    }
    /*  */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
