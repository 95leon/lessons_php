<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourcesRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(
        Resources $resources,
        Request $request
    ) {
        $data = [];
        $parse_link = "";
        if ($request->isMethod('post')) {
            $validate = $request->validate([
                'parse_link' => 'required|url'
            ]);
            $xml = XmlParser::load($validate['parse_link']);
            $data = $xml->parse([
                'title' => [
                    'uses' => 'channel.title'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[guid,author,title,link,description,pubDate,category]'
                ]
            ]);
            $parse_link = $validate['parse_link'];
        }
        return view('admin.parse', [
            'parse' => $data,
            'resources' => $resources->all(),
            'parse_link' => $parse_link
        ]);
    }

    public function addSource(
        Resources $resources,
        ResourcesRequest $request
    ) {
        if ($request->isMethod('post')) {
            $request = $request->validated();
            $double_url = $resources->firstWhere('resource_url', $request['resource_url']);
            if (!(bool) $double_url) {
                $resources->fill($request);
                $resources->save();
            }
        }
        return redirect()->route('admin.parse');
    }

    public function loadParseNews(
        Request $request,
        News $news,
        Category $category
    ) {
        $validate = $request->validate([
            'parse_link' => 'required|url'
        ]);
        $xml = XmlParser::load($validate['parse_link']);
        $data = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,description,category]'
            ]
        ]);
        foreach ($data['news'] as $key) {

            $double_news = $news->firstWhere('title', $key['title']);

            if ((bool) $double_news) {
                continue;
            }

            $double_category = $category->firstWhere('category_name', [$key['category']]);

            if (!(bool) $double_category) {
                $category->create([
                    'category_name' => $key['category']
                ]);
                $key['category_id'] = DB::getPdo()->lastInsertId();
            } else {
                $key['category_id'] = $double_category->id;
            }

            $news->create([
                'title' => (string) $key['title'],
                'text' => (string) $key['description'],
                'category_id' => (int) $key['category_id'],
                'is_private' => false
            ]);
        }
        return redirect()->back();
    }
}
