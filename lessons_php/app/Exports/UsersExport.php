<?php

namespace App\Exports;

use App\Models\News;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $news = new News;
        $export = $news->getCategoryNews($_POST['category']);
        return collect($export);
    }
}
