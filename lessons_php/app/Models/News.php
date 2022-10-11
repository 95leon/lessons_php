<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    public $timestamps = false;
    protected $fillable = ['category_id','title', 'text', 'is_private'];
    use HasFactory;
	/**
	 * @return mixed
	 */
	function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return News
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
