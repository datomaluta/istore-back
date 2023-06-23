<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'type',
		'screen_size',
		'resolution',
		'herz',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
