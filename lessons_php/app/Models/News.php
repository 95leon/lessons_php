<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'category_id','title', 'text', 'is_private'];
    use HasFactory;
}
