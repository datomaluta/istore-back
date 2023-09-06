<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email'   => 'required|exists:users,email|email',
			'password'=> 'required',
		];
	}

	protected function failedValidation(Validator $validator)
	{
		throw new HttpResponseException(response()->json([
			'message' => 'Validation failed',
			'errors'  => $validator->errors(),
		], 422));
	}
}
