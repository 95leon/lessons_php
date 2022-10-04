<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $category = $_POST['category'];
        $news = new News;
        $exports = $news->getCategoryNews($category);
        $header[] = array_keys($exports[1]);
        $export = array_merge($header, $exports);
        return collect($export);
    }
}
