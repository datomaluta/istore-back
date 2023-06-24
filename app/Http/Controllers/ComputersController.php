<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
	public function getAllComputers(Request $req, $category)
	{
		$category = Category::where('name', $category)->first();
		// this category has three subcategories and i need $category->subcategories->products for all of them

		if ($category) {
			$subcategories = $category->subcategories;

			$products = $subcategories->pluck('products')->collapse();

			// Convert the products collection to an array
			$productsArray = $products->toArray();

			return response()->json($productsArray, 200);
		} else {
			return response()->json(['message' => 'Category not found'], 404);
		}
		return $category;
	}
}
