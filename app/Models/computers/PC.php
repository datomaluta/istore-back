<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'cpu',
		'ram',
		'ssd',
		'hdd',
		'gpu',
		'motherboard',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
