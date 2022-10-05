<?php

namespace App\Exports;

use App\Models\News;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    private array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        $news = new News;
        $exports = $news->getCategoryNews($this->request['category']);
        $header[] = array_keys($exports[1]);
        $export = array_merge($header, $exports);
        return collect($export);
    }
}
