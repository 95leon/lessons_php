<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'category_name'];
    use HasFactory;
	/**
	 * @return mixed
	 */
	function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return Category
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
