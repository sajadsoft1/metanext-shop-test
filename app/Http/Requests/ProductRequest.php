<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'integer|required',
            'brand_id'    => 'integer|required',
            'title'       => 'required|string',
            'body'        => 'required|string',
            'price'       => 'required|numeric',
        ];
    }
}
