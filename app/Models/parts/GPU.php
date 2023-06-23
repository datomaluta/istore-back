<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPU extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'manufacturer',
		'model',
		'memory',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
