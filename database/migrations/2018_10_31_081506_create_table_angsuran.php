<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAngsuran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pinjaman')->unsigned();
            $table->integer('angsuran_ke')->nullable();
            $table->integer('angsuran_bunga')->nullable();
            $table->integer('angsuran_pokok')->nullable();
            $table->integer('total_angsuran')->nullable();
            $table->integer('sisa_pinjaman')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('denda')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_pinjaman')
              ->references('id')->on('pinjaman')
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
        Schema::dropIfExists('angsuran');
    }
}
