<?php

namespace App\Exports;

use App\Models\News;
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
        $exports = json_decode(json_encode($news->getCategoryNews($this->request['category'])));
        $header = array_keys((array) array_shift($exports));
        return collect($exports)->prepend($header);
    }
}
