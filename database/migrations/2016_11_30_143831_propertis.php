<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Propertis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertis', function (Blueprint $table) {

            $table->increments('id')->index();
            $table->integer('nomor_hm');
            $table->string('nib');
            $table->datetime('waktu_su');
            $table->integer('nomor_ssp');
            $table->decimal('luastanah');
            $table->decimal('luasbangunan');
            $table->text('letak');
            $table->string('nop');
            $table->string('njop');
            $table->string('pemeganghak');
            $table->string('jenis');
            
            
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
        Schema::drop('propertis');
    }
}
