<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'model',
		'cpu',
		'ram',
		'ssd',
		'hdd',
		'gpu',
		'screen_size',
		'resolution',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
