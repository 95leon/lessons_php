<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class NewsCategory
{
    public function getCategories()
    {
        return DB::table('categories')->get();
    }

    public function getCategoryNameById(int $id): string
    {
        return DB::table('categories')->find($id)->category_name;
    }
}
