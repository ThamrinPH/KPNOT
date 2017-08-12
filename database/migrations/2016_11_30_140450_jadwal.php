<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->datetime('waktu');
            $table->datetime('selesai');
            $table->text('keterangan');      
            $table->timestamps();
            $table->integer('klien_id')->unsigned();
         $table->foreign('klien_id')->references('id')->on('kliens');
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jadwals');
    }
}
