<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $fillable = [
		'label',
		'brand',
		'price',
		'image',
		'stock',
		'category_id',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function laptop()
	{
		return $this->hasOne(Laptop::class);
	}

	public function pc()
	{
		return $this->hasOne(PC::class);
	}

	public function all_in_one()
	{
		return $this->hasOne(AllInOne::class);
	}
}
