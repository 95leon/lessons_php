<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParseSaveRequest;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\MessageRequest;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class IndexAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.index', ['user' => $user]);
    }

    public function create(Category $category, Request $request)
    {
        return view(
            'admin.create',
            [
                'categories' => $category->all(),
                'parse' => $request->input()
            ]
        );
    }

    public function createNews(
        CreateRequest $request,
        News $news,
        Category $category,
    ) {
        if ($request->isMethod('post')) {
            $request = $request->validated();
            if ($request['category_id'] == 0) {
                $category->fill($request);
                $category->save();
                $request['category_id'] = $category->id;
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
                $news->id
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
