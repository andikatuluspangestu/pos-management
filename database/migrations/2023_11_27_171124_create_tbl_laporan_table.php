<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblLaporanTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_laporan', function (Blueprint $table) {
            $table->bigIncrements('id_laporan');
            $table->integer('id_user');
            $table->integer('id_produk');
            $table->integer('jumlah');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('kode_pembelian');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tbl_laporan');
    }
}
