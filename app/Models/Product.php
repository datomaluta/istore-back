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

	public function cpu()
	{
		return $this->hasOne(CPU::class);
	}

	public function gpu()
	{
		return $this->hasOne(GPU::class);
	}

	public function motherboard()
	{
		return $this->hasOne(MotherBoard::class);
	}

	public function ram()
	{
		return $this->hasOne(RAM::class);
	}

	public function keyboard()
	{
		return $this->hasOne(Keyboard::class);
	}

	public function mouse()
	{
		return $this->hasOne(Mouse::class);
	}

	public function monitor()
	{
		return $this->hasOne(Monitor::class);
	}
}
