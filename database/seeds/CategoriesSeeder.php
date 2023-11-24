<?php

use Illuminate\Database\Seeder;

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
            'Gorengan',
            'Makanan Berat',
            'Sayur',
            'Sambal',
            'Snack',
        ];

        foreach ($categories as $category) {
            DB::table('tbl_categories')->insert([
                'category_name' => $category,
                'category_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
