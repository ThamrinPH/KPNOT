<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ppats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppats', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->text('keterangan');
            $table->datetime('waktu');
            $table->integer('ht');
            $table->datetime('waktu_ssp');
            $table->string('ssp');
            $table->datetime('waktu_bphtb');
            $table->string('bphtb');
            
            $table->integer('properti_id')->unsigned();
            $table->foreign('properti_id')->references('id')->on('propertis');
            
            $table->integer('sk_id')->unsigned();
            $table->foreign('sk_id')->references('id')->on('sks');
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
        Schema::drop('ppats');
    }
}
