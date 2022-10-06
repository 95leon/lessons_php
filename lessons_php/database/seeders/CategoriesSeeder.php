<?php

namespace Database\Seeders;

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
            ['category_name' => 'Культура'],
            ['category_name' => 'Наука'],
            ['category_name' => 'Спорт'],
            ['category_name' => 'Политика'],
            ['category_name' => 'Путешествия']
        ];
        foreach ($categories as $key) {
            DB::table('categories')->insert($key);
        }
    }
}
