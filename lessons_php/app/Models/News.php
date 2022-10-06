<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use stdClass;

class News
{
    public function getNews()
    {
        return DB::table('news')->get();
    }

    public function getCategoryNews($categoryId)
    {
        return DB::table('news')->where('category_id', '=', $categoryId)->get();
    }

    public function getNewsById($id): ?stdClass
    {
        return DB::table('news')->find($id);
    }
}
