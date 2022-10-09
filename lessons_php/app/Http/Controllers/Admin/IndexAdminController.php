<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $news->insert([
                'category_id' => $request->input('category'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'is_private' => isset($request->isPrivate)
            ]);
            $request->flash();
            return redirect()->route('news.category.message', [DB::getPdo()->lastInsertId()]);
        }
        $categories = Category::all();
        return view('admin.create', ['categories' => $categories]);
    }

    public function saveNews()
    {
        $categories = Category::all();
        return view('admin.save', ['categories' => $categories]);
    }
}
