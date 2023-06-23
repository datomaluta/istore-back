<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'type',
		'language',
		'connect',
		'lighting',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
