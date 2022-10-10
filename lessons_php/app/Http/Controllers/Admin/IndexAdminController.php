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

    public function create(Request $request, News $news, Category $category)
    {
        if ($request->isMethod('post')) {
            if ($request->input('categoryName')) {
                $category->insert([
                    'category_name' => $request->input('categoryName')
                ]);
                return view('admin.create', ['categories' => $category->all()]);
            }
            $news->insert([
                'category_id' => $request->input('category'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'is_private' => isset($request->isPrivate)
            ]);
            $request->flash();
            return redirect()->route('news.category.message', [DB::getPdo()->lastInsertId()]);
        }
        return view('admin.create', ['categories' => $category->all()]);
    }

    public function saveNews()
    {
        $categories = Category::all();
        return view('admin.save', ['categories' => $categories]);
    }

    public function editNews()
    {
        return view('admin.edit', ['categories' => Category::all(), 'news' => News::paginate(6)]);
    }

    public function editCategory(Category $category, Request $request)
    {
        if ($request->isMethod('post')) {
            $category->update([
                'category_name' => $request->input('categoryName')
            ]);
        }
        return view('admin.category', ['category' => $category]);
    }

    public function editMessage(News $news, Request $request)
    {
        if ($request->isMethod('post')) {
            $is_private = $request->input('isPrivate');
            $news->update([
                'category_id' => $request->input('category'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'is_private' => isset($is_private)
            ]);
        }
        return view('admin.message', ['news' => $news, 'categories' => Category::all()]);
    }
}
