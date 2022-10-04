<?php

namespace App\Http\Controllers;

use App\Exports\NewsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportNews()
    {
        return Excel::download(new NewsExport, 'news.xlsx');
    }
}
