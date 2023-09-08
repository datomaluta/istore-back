<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function register(UserRegisterRequest $request)
	{
		$attributes = $request->validated();
		$attributes['password'] = bcrypt($attributes['password']);

		try {
			$user = User::create($attributes);
		} catch (\Exception $e) {
			return response()->json(['message' => 'Something went wrong with user register'], 500);
		}

		auth()->login($user);
		return response()->json([
			'message' => 'User Registered Successfully',
			'user'    => $user,
		]);
	}

	public function login(LoginRequest $request)
	{
		$attributes = $request->validated();

		if (!auth()->attempt($attributes)) {
			return response()->json(['message'=>'Invalid credentials!'], 401);
		}

		session()->regenerate();
		return response()->json(['message'=>'User loged in Succesfully!']);
	}

	public function getUserInfo()
	{
		// Check if the user is authenticated
		if (Auth::check()) {
			// User is authenticated, get the user information
			$user = Auth::user();
			return response()->json($user);
		} else {
			// User is not authenticated, you can redirect to the login page or handle it as needed
			return  response()->json(['message'=>'Something went wrong!']);
		}
	}

	public function logout()
	{
		session()->invalidate();
		return response(['message'=>'Logged out']);
	}
}
