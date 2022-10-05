<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, NewsCategory $newsCategory, News $news)
    {
        if ($request->isMethod('post')) {
            $getNews = $news->getNews();
            $createNews = [
                'id' => array_key_last($getNews) + 1,
                'category_id' => $request->input('category'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'isPrivate' => isset($request->isPrivate)
            ];
            $getNews[] = $createNews;
            Storage::disk('local')->put('news.json', json_encode($getNews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $request->flash();
            return redirect()->route('news.category.message', [$createNews['id']]);
        }
        $categories = $newsCategory->getCategories();
        return view('admin.create')->with('categories', $categories);
    }

    public function saveNews(NewsCategory $newsCategory)
    {
        $categories = $newsCategory->getCategories();
        return view('admin.save')->with('categories', $categories);
    }
}
