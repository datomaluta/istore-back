<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\AllInOne;
use App\Models\Laptop;
use App\Models\PC;
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

		$laptop1 = Product::create(['label'=>'Asus Rogtrix i5-12000 500SSD', 'brand'=> 'asus', 'price' => 2000, 'image'=>'/thumbnails/mack.jpg', 'category_id'=>$laptopSubCategory->id, 'stock'=>100]);
		$laptop2 = Product::create(['label'=>'Apple Mackbook M1 i9-10500 266SSD', 'brand'=> 'acer', 'price' => 4000, 'image'=>'/thumbnails/lenovo.jpg', 'category_id'=>$laptopSubCategory->id, 'stock'=>40]);
		$pc1 = Product::create(['label'=> 'ULTRA PC Intel G6405 Asus PRIME H510M-K SSD 120GB 8GB', 'brand' => 'lenovo', 'price' => 3000, 'image'=>'/thumbnails/pc1.jpg', 'category_id'=>$pcSubCategory->id, 'stock'=>120]);
		$pc2 = Product::create(['label'=>'Dell Vostro 3710 Intel I3-12100 8GB 256GB SSD DVD-RW - 210-BCUE_5406', 'brand'=> 'Dell', 'price' => 5000, 'image'=>'/thumbnails/pc2.jpg', 'category_id'=>$pcSubCategory->id, 'stock'=>90]);
		$allInOne1 = Product::create(['label'=>'HP Pavilion 24 23.8" FHD AMD Ryzen 3 5300U 8GB 512GB SSD Win11 Home - 5D247EA', 'brand'=> 'samsung', 'price' => 7000, 'image'=>'/thumbnails/inone1.jpg', 'category_id'=>$allInOneSubCategory->id, 'stock'=>66]);
		$allInOne2 = Product::create(['label'=>'HP ProOne 240 G9 23.8" FHD Intel I3-1215U 8GB 256GB SSD - 6D447EA', 'brand'=> 'LG', 'price' => 8000, 'image'=>'/thumbnails/inone2.jpg', 'category_id'=>$allInOneSubCategory->id, 'stock'=>55]);

		$laptop1Deep = Laptop::create(['product_id'=> $laptop1->id, 'model'=>'rogtrix', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                     => '12', 'hdd'=>'12',
			'gpu'                                     => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		$laptop2Deep = Laptop::create(['product_id'=> $laptop2->id, 'model'=>'colemon', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                     => '12', 'hdd'=>'12',
			'gpu'                                     => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		// PC::create(['product_id'=>$pc1->id, 'cpu'=>'i7', 'ram'=>'14', 'ssd'=>'22', 'hdd'=>'22', 'gpu'=>'magardi', 'motherboard'=>'pl']);

		$pc1Deep = PC::create(['product_id'=>$pc1->id, 'cpu'=>'i5', 'ram'=>'12', 'ssd'=> '12', 'hdd'=>'12', 'gpu'=>'gtx 1080', 'motherboard'=>'atx']);

		$pc2Deep = PC::create(['product_id'=>$pc2->id, 'cpu'=>'i7', 'ram'=>'12', 'ssd'=> '12', 'hdd'=>'12', 'gpu'=>'gtx 1080', 'motherboard'=>'atx']);

		$allInOne1Deep = AllInOne::create(['product_id' => $allInOne1->id, 'model'=>'rogtrix', 'cpu'=>'i5', 'ram'=>'12',
			'ssd'                                          => '12', 'hdd'=>'12',
			'gpu'                                          => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);

		$allInOne2Deep = AllInOne::create(['product_id' => $allInOne2->id, 'model'=>'rogtrix', 'cpu'=>'i3', 'ram'=>'16',
			'ssd'                                          => '12', 'hdd'=>'12',
			'gpu'                                          => 'gtx', 'screen_size'=>'didi', 'resolution'=>'1920x1080']);
	}
}
