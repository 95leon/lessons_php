<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        DB::table('news')->insert($this->getData());

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    private function getData()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i=0; $i < 100; $i++) { 
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
