<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JadwalsSks extends Migration
{
    public function up()
    {
        Schema::create('jadwals_sks', function (Blueprint $table) {
            $table->integer('jadwal_id')->unsigned()->nullable();
            $table->foreign('jadwal_id')->references('id')
                  ->on('jadwals');

            $table->integer('sk_id')->unsigned()->nullable();
            $table->foreign('sk_id')->references('id')
                  ->on('sks');
            $table->text('hasil');
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
        Schema::drop('warmerkens');
    }
}
