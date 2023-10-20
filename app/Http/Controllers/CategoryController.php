<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
	public function getProductsFromCategory($category)
	{
		$category = Category::where('name', $category)->first();

		if ($category) {
			$perPage = 4;

			if ($category->parent_id) {
				$paginatedProducts = $category->products()->orderBy('created_at', 'desc')->paginate($perPage);
				return response()->json($paginatedProducts, 200);
			} else {
				$subcategories = $category->subcategories;

				$products = $subcategories->pluck('products')->collapse()->sortByDesc('created_at')->values()->all(); // Convert to array

				$currentPage = LengthAwarePaginator::resolveCurrentPage();
				$paginatedItems = array_slice($products, ($currentPage - 1) * $perPage, $perPage); // Use array_slice
				$paginatedProducts = new LengthAwarePaginator(
					$paginatedItems,
					count($products),
					$perPage,
					$currentPage,
					['path' => LengthAwarePaginator::resolveCurrentPath()]
				);

				return response()->json($paginatedProducts, 200);
			}
		} else {
			return response()->json(['message' => 'Category not found'], 404);
		}
	}

	public function getAllCategories()
	{
		$categories = Category::whereNotNull('parent_id')->get();
		if ($categories) {
			return response()->json($categories, 200);
		}
		return response()->json(['message' => 'Categories not found'], 404);
	}

	public function getCategory($id)
	{
		$category = Category::find($id);

		if (!$category) {
			return response()->json(['message' => 'category not found'], 404);
		}

		return response()->json($category);
	}
}
