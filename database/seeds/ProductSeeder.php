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
        $image = [
            'rawon.jpeg',
            'sambalgoreng.jpeg',
            'nasgor.jpeg',
            'sop.jpeg',
            'opor.jpeg',
            'gulai.jpeg',
        ];
        $kodeproduk = 0;
        $categories = 1;
        foreach ($produks as $produk) {
            DB::table('tbl_products')->insert([
                'category_id' => $categories++,
                'kode_produk' => $kodeproduk,
                'nama_produk' => $produk,
                'gambar' => $image[$kodeproduk++],
                'produk_description' => 'Bumbu Masak Umik varian yang khusus dibuat untuk memasak beragam masakan',
                'diskon' => 0.05,
                'harga_jual' => 8000,
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
