<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Klien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kliens', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('no_ktp');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten'); 
            $table->string('provinsi');
            $table->integer('kodepos');
            $table->string('warga_negara');
            $table->string('status_pernikahan');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('telpon'); 
            $table->string('handphone');
            $table->string('npwp');        
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
        Schema::drop('kliens');
    }
}
