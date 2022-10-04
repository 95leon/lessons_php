<?php

namespace App\Exports;

use App\Models\News;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $news = new News;
        $exports = $news->getCategoryNews($_POST['category']);
        $header[] = array_keys($exports[1]);
        $export = array_merge($header, $exports);
        return collect($export);
    }
}
