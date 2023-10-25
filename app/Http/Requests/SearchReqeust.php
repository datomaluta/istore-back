<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchReqeust extends FormRequest
{
	public function rules(): array
	{
		return [
			'search_query' => '',
		];
	}
}
