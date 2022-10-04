<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Vtiful\Kernel\Excel;


class NewsCategory
{
    // private array $news_category = [
    //     1 => [
    //         'id' => 1,
    //         'name_category' => 'Культура'
    //     ],
    //     2 => [
    //         'id' => 2,
    //         'name_category' => 'Спорт'
    //     ],
    //     3 => [
    //         'id' => 3,
    //         'name_category' => 'Наука'
    //     ],
    //     4 => [
    //         'id' => 4,
    //         'name_category' => 'Политика'
    //     ],
    //     5 => [
    //         'id' => 5,
    //         'name_category' => 'Путешествия'
    //     ],

    // ];

    public function getCategories(): array
    {
        return json_decode(Storage::disk('local')->get('categories.json'), true);
    }

    public function getCategoryNameById(int $id): ?string
    {
        $categories = $this->getCategories();
        if (array_key_exists($id, $categories)) {
            return $categories[$id]['name_category'];
        } else {
            return null;
        }        
    }
}
