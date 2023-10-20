<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'brand'                         => 'sometimes|required',
			'price'                         => 'sometimes|required',
			'image'                         => 'sometimes|required',
			'label'                         => 'sometimes|required',
			'stock'                         => 'sometimes|required',
			'category_id'                   => 'sometimes|required',
			'cpu'                           => 'sometimes|required',
			'ram'                           => 'sometimes|required',
			'ssd'                           => 'sometimes|required',
			'hdd'                           => 'sometimes|required',
			'gpu'                           => 'sometimes|required',
			'motherboard'                   => 'sometimes|required',
			'model'                         => 'sometimes|required',
			'screen_size'                   => 'sometimes|required',
			'resolution'                    => 'sometimes|required',
		];
	}
}
