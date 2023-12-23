<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Bumbu Umik',
            'Penyedap Rasa',
            'Saus',
            'Sambal',
            'Kecap',
            'Lemak',
        ];

        $category_description = [
            'Prdouk dengan kategori Bumbu Umik',
            'Prdouk dengan kategori Penyedap Rasa',
            'Prdouk dengan kategori Saus',
            'Prdouk dengan kategori Sambal',
            'Prdouk dengan kategori Kecap',
            'Prdouk dengan kategori Lemak',
        ];

        foreach ($categories as $index => $category) {

          // mengambil nama file gambar berdasarkan index yang sama
          $category_descriptioncategory = $category_description[$index];

          DB::table('tbl_categories')->insert([
            'category_name'         => $category,
            'category_description'  => $category_descriptioncategory,
            'created_at'            => now(),
            'updated_at'            => now(),
          ]);
        }
    }
}
