<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(Request $request, $id_source)
    {
        if ($request->isMethod('post')) {
            $validate = $request->validate([
                'parse_link' => 'required|active_url'
            ]);
            $xml = XmlParser::load($validate['parse_link']);
        } else {
            if ((int) $id_source === 1) {
                $xml = XmlParser::load('https://lenta.ru/rss');
            } elseif ((int) $id_source === 2) {
                $xml = XmlParser::load('https://news.rambler.ru/rss/world/');
            } elseif ((int) $id_source === 3) {
                $xml = XmlParser::load('https://news.mail.ru/rss/');
            }
        }

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
        return view('admin.parse', ['parse' => $data]);
    }
}
