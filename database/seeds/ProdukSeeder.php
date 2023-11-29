<?php

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
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

        foreach ($produks as $produk) {
            DB::table('tbl_produk')->insert([
                'category_id' => 1,
                'category_name' => 'Gorengan',
                'kode_produk' => 'P001',
                'nama_produk' => $produk,
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
