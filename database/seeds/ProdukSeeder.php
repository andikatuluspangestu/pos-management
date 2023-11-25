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
                'category_name' => $category,
                'category_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
