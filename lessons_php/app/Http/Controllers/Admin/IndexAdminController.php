<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function addNews()
    {
        return view('admin.add_news');
    }
}
