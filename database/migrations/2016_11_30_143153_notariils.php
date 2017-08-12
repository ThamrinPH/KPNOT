<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notariils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notariils', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('no_akta');
            $table->string('nama_akta');
            $table->text('keterangan');
            $table->datetime('waktu');
            
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
        Schema::drop('notarills');
    }
}
