<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;

class IndexNewsController extends Controller
{
    public function index(News $news)
    {
        $news = $news->getNews();
        return view('news.index')->with('news', $news);
    }

    public function newsCategory($categoryId, News $news, NewsCategory $newsCategory)
    {
        $news = $news->getCategoryNews($categoryId);
        $categories = $newsCategory->getCategories();
        $categoryName = $newsCategory->getCategoryNameById($categoryId);
        return view('news.news_category')->with('news', $news)->with('categoryName', $categoryName)->with('newsCategory', $categories);
    }

    public function newsItem($id, News $news)
    {
        $news = $news->getNewsById($id);
        return view('news.news_item')->with('news', $news);
    }
}
