<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllInOne extends Model
{
	use HasFactory;

	protected $table = 'all_in_one';

	protected $fillable = [
		'product_id',
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
