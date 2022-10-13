<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\MessageRequest;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(
        CreateRequest $request,
        News $news,
        Category $category,
    ) {
        if ($request->isMethod('post')) {
            $request = $request->validated();
            if (isset($request['category_name'])) {
                $category->fill($request);
                $category->save();
                return view('admin.create', ['categories' => $category->all()])->with('success', __('messages.admin.category_created'));
            }
            if (isset($request['is_private'])) {
                $request['is_private'] = 1;
            } else {
                $request['is_private'] = 0;
            }
            $news->fill($request);
            $news->save();
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

    public function editCategory(
        Category $category,
        CategoryRequest $request
    ) {
        if ($request->isMethod('post')) {
            $request = $request->validated();
            $category->fill($request);
            $category->save();
        }
        return view(
            'admin.category',
            ['category' => $category]
        );
    }

    public function editMessage(
        News $news,
        MessageRequest $request
    ) {
        if ($request->isMethod('post')) {
            $request = $request->validated();
            if (isset($request['is_private'])) {
                $request['is_private'] = 1;
            } else {
                $request['is_private'] = 0;
            }
            $news->fill($request);
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
