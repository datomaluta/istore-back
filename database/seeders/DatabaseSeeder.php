<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Computers\AllInOne;
use App\Models\Computers\Laptop;
use App\Models\Computers\PC;
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

		$laptop1 = Product::create(['brand'=> 'asus', 'price' => 2000, 'image'=>'/thumbnails/mack.jpg', 'category_id'=>$laptopSubCategory->id]);
		$laptop2 = Product::create(['brand'=> 'acer', 'price' => 4000, 'image'=>'/thumbnails/lenovo.jpg', 'category_id'=>$laptopSubCategory->id]);
		$pc1 = Product::create(['brand'=> 'lenovo', 'price' => 3000, 'image'=>'/thumbnails/pc1.jpg', 'category_id'=>$pcSubCategory->id]);
		$pc2 = Product::create(['brand'=> 'vento', 'price' => 5000, 'image'=>'/thumbnails/pc2.jpg', 'category_id'=>$pcSubCategory->id]);
		$allInOne1 = Product::create(['brand'=> 'samsung', 'price' => 7000, 'image'=>'/thumbnails/inone1.jpg', 'category_id'=>$allInOneSubCategory->id]);
		$allInOne2 = Product::create(['brand'=> 'LG', 'price' => 8000, 'image'=>'/thumbnails/inone2.jpg', 'category_id'=>$allInOneSubCategory->id]);

		$laptop1Deep = Laptop::create(['product_id'=> $laptop1->id, 'model'=>'rogtrix', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                     => '12', 'hdd'=>'12',
			'gpu'                                     => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		$laptop2Deep = Laptop::create(['product_id'=> $laptop2->id, 'model'=>'colemon', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                     => '12', 'hdd'=>'12',
			'gpu'                                     => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		// PC::create(['product_id'=>$pc1->id, 'cpu'=>'i7', 'ram'=>'14', 'ssd'=>'22', 'hdd'=>'22', 'gpu'=>'magardi', 'motherboard'=>'pl']);

		$pc1Deep = PC::create(['product_id'=>$pc1->id, 'cpu'=>'i5', 'ram'=>'12', 'ssd'=> '12', 'hdd'=>'12', 'gpu'=>'gtx 1080', 'motherboard'=>'atx']);

		$pc2Deep = PC::create(['product_id'=>$pc2->id, 'cpu'=>'i7', 'ram'=>'12', 'ssd'=> '12', 'hdd'=>'12', 'gpu'=>'gtx 1080', 'motherboard'=>'atx']);

		$allInOne1Deep = AllInOne::create(['product_id' => $allInOne1->id, 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                          => '12', 'hdd'=>'12',
			'gpu'                                          => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		$allInOne2Deep = AllInOne::create(['product_id' => $allInOne2->id, 'cpu'=>'i3', 'ram'=>'16',
			'ssd'                                          => '12', 'hdd'=>'12',
			'gpu'                                          => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);
	}
}
