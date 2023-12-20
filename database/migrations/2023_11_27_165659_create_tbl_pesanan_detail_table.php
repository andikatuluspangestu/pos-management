<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPesananDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesanan_detail', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan_detail');
            $table->integer('id_user');
            $table->integer('id_produk');
            $table->integer('jumlah');
            $table->integer('bayar');
            $table->integer('kembali');
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
        Schema::dropIfExists('tbl_pesanan_detail');
    }
}
