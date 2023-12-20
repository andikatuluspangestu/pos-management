<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produks = [
            'Rawon',
            'Sambal Goreng',
            'Nasi Goreng',
            'Sayur Sop',
            'Opor',
            'Gule',
        ];

        $gambar = [
           'rawon.jpeg',
           'sambalgoreng.jpeg', 
           'nasgor.jpeg',
           'sop.jpeg',
           'opor.jpeg',
           'gulai.jpeg',
        ];

        $produk_description = [
           'Bumbu Masak Umik varian rawon yang khusus dibuat untuk memasak beragam masakan',
           'Bumbu Masak Umik varian sambal goreng yang khusus dibuat untuk memasak beragam masakan',
           'Bumbu Masak Umik varian nasi goreng yang khusus dibuat untuk memasak beragam masakan',
           'Bumbu Masak Umik varian sayur sop yang khusus dibuat untuk memasak beragam masakan',
           'Bumbu Masak Umik varian opor yang khusus dibuat untuk memasak beragam masakan',
           'Bumbu Masak Umik varian gulai yang khusus dibuat untuk memasak beragam masakan',
        ];

        $diskon = [
           10,
           5, 
           10,
           5,
           10,
           5, 
        ];

        $harga_jual = [
           8000,
           9000, 
           10000,
           8000,
           9000,
           10000, 
        ];

        $stok = [
           10,
           11, 
           12,
           10,
           11,
           12, 
        ];

        $kodeproduk = 1111; 
        foreach ($produks as $index => $produk) {

          // mengambil nama file gambar berdasarkan index yang sama
          $gambarproduk                 = $gambar[$index]; 
          $produk_descriptionproduk     = $produk_description[$index]; 
          $diskonproduk                 = $diskon[$index];
          $harga_jualproduk             = $harga_jual[$index];
          $stokproduk                   = $stok[$index];

          DB::table('tbl_products')->insert([
            'category_id'           => 1,
            'kode_produk'           => $kodeproduk,
            'nama_produk'           => $produk,
            'gambar'                => $gambarproduk,
            'produk_description'    => $produk_descriptionproduk,
            'diskon'                => $diskonproduk,
            'harga_jual'            => $harga_jualproduk,
            'stok'                  => $stokproduk,
            'created_at'            => now(),
            'updated_at'            => now(),
          ]);
          $kodeproduk += 1;
        }

    }
}
