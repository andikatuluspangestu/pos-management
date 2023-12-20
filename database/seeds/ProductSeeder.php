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

        $kodeproduk = 1111; 
        foreach ($produks as $index => $produk) {

          // mengambil nama file gambar berdasarkan index yang sama
          $gambarproduk = $gambar[$index]; 

          DB::table('tbl_products')->insert([
             'category_id' => 1,
                'kode_produk' => $kodeproduk,
                'nama_produk' => $produk,
                'gambar' => $gambarproduk,
                'produk_description' => 'Bumbu Masak Umik varian yang khusus dibuat untuk memasak beragam masakan',
                'diskon' => 0.05,
                'harga_jual' => 8000,
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
          ]);
          $kodeproduk += 1;
        }

    }
}
