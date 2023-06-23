<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'type',
		'connect',
		'lighting',
		'weight',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
