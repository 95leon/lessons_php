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
    public function index(News $news, NewsCategory $newsCategory)
    {
        $news_category = $newsCategory->getCategories();
        $news = $news->getNews();
        return view('news.index')->with('news', $news)->with('news_category', $news_category);
    }

    public function newsCategory($category_id, News $new, NewsCategory $newsCategory)
    {
        $news = $new->getCategoryNews($category_id);
        $news_category = $newsCategory->getCategories();
        $categoryName = $newsCategory->getCategoryNameById($category_id);
        return view('news.news_category')->with('news', $news)->with('categoryName', $categoryName)->with('news_category', $news_category);
    }

    public function newsItem($id, News $news)
    {
        $news = $news->getNewsById($id);
        return view('news.news_item')->with('news', $news);
    }
}
