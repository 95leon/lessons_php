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
            if ($request->input('category_name')) {
                $category->fill($request->all());
                $category->save();
                return view('admin.create', ['categories' => $category->all()]);
            }
            if (!$request['is_private']) {
                $request['is_private'] = 0;
            } else {
                $request['is_private'] = 1;
            }

            $news->fill($request->all());
            $news->save();
            $request->flash();
            return redirect()->route(
                'news.category.message',
                [DB::getPdo()->lastInsertId()]
            );
        }
        return view(
            'admin.create',
            ['categories' => $category->all()]
        );
    }

    public function saveNews()
    {
        $categories = Category::all();
        return view(
            'admin.save',
            ['categories' => $categories]
        );
    }

    public function editNews($categoryId)
    {
        $news = Category::findOrFail($categoryId)
            ->news()
            ->paginate(6);
        $categories = Category::all();
        $categoryName = $categories->where('id', $categoryId)
            ->pluck('category_name')
            ->get(0);
        return view(
            'admin.edit',
            [
                'categories' => $categories,
                'news' => $news
            ]
        )->with('categoryName', $categoryName);
    }

    public function editCategory(Category $category, Request $request)
    {
        if ($request->isMethod('post')) {
            $category->fill($request->all());
            $category->save();
        }
        return view(
            'admin.category',
            ['category' => $category]
        );
    }

    public function editMessage(News $news, Request $request)
    {
        if ($request->isMethod('post')) {
            if (!$request['is_private']) {
                $request['is_private'] = 0;
            } else {
                $request['is_private'] = 1;
            }
            $news->fill($request->all());
            $news->save();
        }
        return view(
            'admin.message',
            [
                'news' => $news,
                'categories' => Category::all()
            ]
        );
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->input('id'));
        if ($category) {
            $category->delete();
        }
        return redirect()->route('admin.edit', 1);
    }

    public function deleteMessage(Request $request)
    {
        $news = News::find($request->input('id'));
        if ($news) {
            $news->delete();
        }
        return redirect()->route('admin.edit', 1);
    }
}
