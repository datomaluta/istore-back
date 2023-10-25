<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\AllInOne;
use App\Models\Laptop;
use App\Models\PC;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function createProduct(AddProductRequest $request)
	{
		$attributes = $request->validated();

		$path = $request->file('image')->store('images', 'public');

		$attributes['image'] = $path;

		// $product->save();

		$product = Product::create($attributes);

		$categoryId = $attributes['category_id'];

		$category = Category::find($categoryId);

		if ($category->name === 'pc') {
			$pc = new PC([
				'ram'         => $attributes['ram'],
				'cpu'         => $attributes['cpu'],
				'gpu'         => $attributes['gpu'],
				'ssd'         => $attributes['ssd'],
				'hdd'         => $attributes['hdd'],
				'motherboard' => $attributes['motherboard'],
				'product_id'  => $product->id,
				// Add other PC-specific attributes here
			]);
			$product->pc()->save($pc);
		}

		if ($category->name === 'laptop') {
			$laptop = new Laptop([
				'ram'               => $attributes['ram'],
				'cpu'               => $attributes['cpu'],
				'gpu'               => $attributes['gpu'],
				'ssd'               => $attributes['ssd'],
				'hdd'               => $attributes['hdd'],
				'model'             => $attributes['model'],
				'screen_size'       => $attributes['screen_size'],
				'resolution'        => $attributes['resolution'],
				'product_id'        => $product->id,
				// Add other PC-specific attributes here
			]);
			$product->laptop()->save($laptop);
		}

		return response()->json(['message'=>'product created successfully!']);
	}

	public function editProduct($id, UpdateProductRequest $request)
	{
		$attributes = $request->validated();

		$product = Product::find($id);

		if (!$product) {
			return response()->json(['Something went wrong'], 500);
		}

		if ($request->hasFile('image')) {
			$path = $request->file('image')->store('images', 'public');
			$attributes['image'] = $path;
		}

		$product->update($attributes);

		$category = $product->category;

		if (!$category) {
			return response()->json(['Something went wrong'], 500);
		}

		if ($category->name === 'pc') {
			PC::where('product_id', $product->id)->first()->update($attributes);
		}

		if ($category->name === 'laptop') {
			Laptop::where('product_id', $product->id)->first()->update($attributes);
		}

		if ($category->name === 'all_in_one') {
			AllInOne::where('product_id', $product->id)->first()->update($attributes);
		}

		return response()->json(['News edited Successfully'], 200);
	}

	public function deleteProduct($id)
	{
		$product = Product::find($id);
		if ($product) {
			$product->delete();
			return ['message'=>'Deleted Succesfully'];
		} else {
			return ['message'=>'Something went wrong with delete!'];
		}
	}

	public function getProduct($id)
	{
		$product = Product::find($id);
		if (!$product) {
			return response()->json(['message' => 'Product not found'], 404);
		}
		$category = Category::find($product->category_id);
		if (!$category) {
			return response()->json(['message' => 'Category not found'], 404);
		}
		$productData = Product::with($category->name)->find($id);

		if (!$productData) {
			return response()->json(['message' => 'Something went wrong, record not found!'], 404);
		}
		// $categoryName = $productData->category->name;
		// $productData['category_name'] = $categoryName;

		return response()->json($productData);
	}

	public function search(Request $request)
	{
		$query = $request->input('search_query');

		// Perform the search with pagination
		$results = Product::where(function ($queryBuilder) use ($query) {
			$queryBuilder->where('label', 'like', '%' . $query . '%')
						 ->orWhere('brand', 'like', '%' . $query . '%');
		})->paginate(6); // You can specify the number of results per page (e.g., 10)

		return response()->json($results);
	}
}
