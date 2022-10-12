<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
	public $timestamps = false;
	protected $fillable = ['category_name'];
	use HasFactory;

	public function news()
	{
		return $this->hasMany(News::class, 'category_id');
	}

	/**
	 * @return mixed
	 */
	function getFillable()
	{
		return $this->fillable;
	}

	/**
	 * @param mixed $fillable 
	 * @return Category
	 */
	function setFillable($fillable): self
	{
		$this->fillable = $fillable;
		return $this;
	}
}
