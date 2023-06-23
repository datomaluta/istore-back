<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Laptop;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// \App\Models\User::factory(10)->create();

		// \App\Models\User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);

		$computersCategory = Category::create(['name'=>'computers']);
		$pcSubCategory = Category::create(['name'=>'pc', 'parent_id'=>$computersCategory->id]);
		$laptopSubCategory = Category::create(['name'=>'laptop', 'parent_id'=>$computersCategory->id]);
		$allInOneSubCategory = Category::create(['name'=>'all_in_one', 'parent_id'=>$computersCategory->id]);

		$partsCategory = Category::create(['name'=>'parts']);
		Category::create(['name'=>'cpu', 'parent_id'=>$partsCategory->id]);
		Category::create(['name'=>'gpu', 'parent_id'=>$partsCategory->id]);
		Category::create(['name'=>'motherboard', 'parent_id'=>$partsCategory->id]);
		Category::create(['name'=>'ram', 'parent_id'=>$partsCategory->id]);

		$peripheralsCategory = Category::create(['name'=>'peripherals']);
		Category::create(['name'=>'keyboard', 'parent_id'=>$peripheralsCategory->id]);
		Category::create(['name'=>'mouse', 'parent_id'=>$peripheralsCategory->id]);
		Category::create(['name'=>'monitors', 'parent_id'=>$peripheralsCategory->id]);

		$laptop1 = Product::create(['brand'=> 'asus', 'price' => 2000, 'image'=>'/thumb/asd', 'category_id'=>$laptopSubCategory->id]);
		$laptop2 = Product::create(['brand'=> 'acer', 'price' => 4000, 'image'=>'/thumb/asd', 'category_id'=>$laptopSubCategory->id]);

		$laptop1Deep = Laptop::create(['product_id'=> $laptop1->id, 'model'=>'rogtrix', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                     => '12', 'hdd'=>'12',
			'gpu'                                     => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		$laptop2Deep = Laptop::create(['product_id'=> $laptop2->id, 'model'=>'colemon', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                     => '12', 'hdd'=>'12',
			'gpu'                                     => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);
	}
}
