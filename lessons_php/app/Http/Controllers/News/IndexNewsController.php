<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexNewsController extends Controller
{
    public function index()
    {
        $news_category = NewsCategory::getCategories();
        $news = News::getNews();
        return view('news.index')->with('news', $news)->with('news_category', $news_category);
    }

    public function newsCategory($category_id)
    {
        $news = News::getCategoryNews($category_id);
        return view('news.news_category')->with('news', $news);
    }

    public function newsItem($id)
    {
        $news = News::getNewsById($id);
        return view('news.news_item')->with('news', $news);
    }
}
