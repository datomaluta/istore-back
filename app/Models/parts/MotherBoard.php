<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherBoard extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'model',
		'socket',
		'chipset',
		'memory_slots',
		'dimensions',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
