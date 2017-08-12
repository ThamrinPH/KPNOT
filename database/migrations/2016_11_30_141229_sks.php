<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sks', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('saksi');
            $table->text('keterangan');
            $table->timestamps();
            
            $table->integer('klien_id')->unsigned();
            $table->foreign('klien_id')->references('id')->on('kliens');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('kliens');
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sks');
    }
}
