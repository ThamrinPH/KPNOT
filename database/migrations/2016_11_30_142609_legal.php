<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Legal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legals', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->datetime('waktu');
            $table->string('sifat_surat');
            $table->text('keterangan');
            
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
        Schema::drop('legals');
    }
}
