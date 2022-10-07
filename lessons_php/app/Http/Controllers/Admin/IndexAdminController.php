<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, NewsCategory $newsCategory, News $news)
    {
        if ($request->isMethod('post')) {
            DB::table('news')->insert([
                'category_id' => $request->input('category'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'is_private' => isset($request->isPrivate)
            ]);
            $request->flash();
            return redirect()->route('news.category.message', [DB::getPdo()->lastInsertId()]);
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
