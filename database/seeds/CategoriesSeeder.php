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
        DB::table('tbl_categories')->insert([
            'category_name' => 'Masakan Padang',
            'updated_at' => now(),
            'created_at' => now()
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Masakan Jawa',
            'updated_at' => now(),
            'created_at' => now()
        ]);
    }
}
