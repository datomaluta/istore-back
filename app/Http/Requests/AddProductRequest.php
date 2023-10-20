<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
	// export const generalArray = [
	//     { name: "brand", label: "Brand", type: "text" },
	//     { name: "price", label: "Price", type: "number" },
	//     { name: "image", label: "Image", type: "file" },
	//     { name: "label", label: "Label", type: "text" },
	//     { name: "category_id", label: "Category", type: "select" },
	//   ];

	//   export const pcArray = [
	//     { name: "cpu", label: "CPU", type: "text" },
	//     { name: "ram", label: "RAM", type: "number" },
	//     { name: "ssd", label: "SSD", type: "number" },
	//     { name: "hdd", label: "HDD", type: "number" },
	//     { name: "gpu", label: "GPU", type: "text" },
	//     { name: "motherboard", label: "Motherboard", type: "text" },
	//   ];

	public function rules(): array
	{
		return [
			'brand'                         => 'required',
			'price'                         => 'required',
			'image'                         => 'required',
			'label'                         => 'required',
			'stock'                         => 'required',
			'category_id'                   => 'required',
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
