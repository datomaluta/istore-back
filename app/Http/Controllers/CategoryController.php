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
			$perPage = 3;

			if ($category->parent_id) {
				$paginatedProducts = $category->products()->paginate($perPage);
				return response()->json($paginatedProducts, 200);
			} else {
				$subcategories = $category->subcategories;

				$products = $subcategories->pluck('products')->collapse()->all(); // Convert to array

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
}
