<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::middleware('auth:sanctum')->group(
	function () {
		Route::get('/userinfo', [UserController::class, 'getUserInfo']);
		Route::get('/logout', [UserController::class, 'logout']);
	}
);

Route::middleware((['auth:sanctum', 'admin']))->group((function () {
	Route::get('/test', [TestController::class, 'test']);
}));

Route::get('/{category}/allproducts', [CategoryController::class, 'getProductsFromCategory']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/categories', [CategoryController::class, 'getAllCategories']);
Route::post('/product', [ProductController::class, 'createProduct']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);
Route::get('/categories/{id}', [CategoryController::class, 'getCategory']);
Route::put('/product/{id}', [ProductController::class, 'editProduct']);
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct']);
