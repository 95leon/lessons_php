<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParseSaveRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(Category $category)
    {
        $xml = XmlParser::load('https://lenta.ru/rss');
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
        return view('admin.parse', ['parse' => $data,  'categories' => $category->all()]);
    }
}
