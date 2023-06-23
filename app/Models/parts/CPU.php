<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_id',
		'name',
        'generation',
        'herz',
        'core',
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
