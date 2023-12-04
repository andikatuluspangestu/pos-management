<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesanan', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('id_user');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->tinyInteger('diskon')->default(0);
            $table->integer('bayar')->default(0);
            $table->integer('diterima')->default(0);
            $table->integer('kembali')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl__pesanan');
    }
}
