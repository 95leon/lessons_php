<?php

namespace App\Models;

class NewsCategory
{
    private static $news_category = [
        [
            'id' => 1,
            'name_category' => 'Культура'
        ],
        [
            'id' => 2,
            'name_category' => 'Спорт'
        ],
        [
            'id' => 3,
            'name_category' => 'Наука'
        ],
        [
            'id' => 4,
            'name_category' => 'Политика'
        ],
        [
            'id' => 5,
            'name_category' => 'Путешествия'
        ],

    ];

    public static function getCategories(): array
    {
        return self::$news_category;
    }
}
