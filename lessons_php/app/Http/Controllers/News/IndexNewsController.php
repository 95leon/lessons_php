<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class IndexNewsController extends Controller
{
    public function index()
    {
        $news = News::getNews();
        return view('news.index')->with('news', $news);
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
