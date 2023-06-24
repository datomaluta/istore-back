<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
	public function getProductsFromCategory($category)
	{
		$category = Category::where('name', $category)->first();

		if ($category) {
			if ($category->parent_id) {
				return response()->json($category->products, 200);
			} else {
				$subcategories = $category->subcategories;

				$products = $subcategories->pluck('products')->collapse();

				$productsArray = $products->toArray();

				return response()->json($productsArray, 200);
			}
		} else {
			return response()->json(['message' => 'Category not found'], 404);
		}
	}
}
