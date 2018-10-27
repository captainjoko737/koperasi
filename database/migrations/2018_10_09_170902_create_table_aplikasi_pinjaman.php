<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAplikasiPinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('aplikasi_pinjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('jumlah_diajukan')->nullable();
            $table->integer('jumlah_disetujui')->nullable();
            $table->integer('bulan_cicilan_diajukan')->nullable();
            $table->integer('bulan_cicilan_disetujui')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_user')
              ->references('id')->on('anggota')
              ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplikasi_pinjaman');
    }
}
