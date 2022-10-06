<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i=0; $i < 60; $i++) { 
            $data[] = [
                'category_id' => rand(1, 5),
                'title' => $faker->sentence(3, 5),
                'text' => $faker->realText(100, 3),
                'is_private' => (boolean)rand(0, 1)
            ];
        }
        return $data;
    }
}
