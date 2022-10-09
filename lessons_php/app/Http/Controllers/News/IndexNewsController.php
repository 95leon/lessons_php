<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class IndexNewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['news' => News::all()]);
    }

    public function newsCategory($categoryId, News $news, Category $categories)
    {
        $news = News::all();
        $categories = Category::all();
        $categoryName = $categories->where('id', $categoryId)->pluck('category_name')->get(0);
        return view('news.news_category', ['news' => $news, 'category' => $categories])->with('categoryName', $categoryName);
    }

    public function newsItem(News $news)
    {
        return view('news.news_item', ['news' => $news]);
    }
}
