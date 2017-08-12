<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Warmerkens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warmerkens', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->datetime('waktu');
            $table->string('sifat_surat');
            $table->text('keterangan');
            
            $table->timestamps();
            
            $table->integer('sk_id')->unsigned();
            $table->foreign('sk_id')->references('id')->on('sks');
         
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
