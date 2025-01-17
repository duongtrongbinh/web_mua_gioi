<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|min:2",
            "weight"=> "required|numeric|min:0|max:3000",
            "height"=> "required|numeric|min:0|max:3000",
            "content"=>"required",
            "length"=> "required|numeric|min:0|max:3000",
            "quantity"=> "required|numeric|min:1|max:1000000",
            "price"=> "required|numeric|min:10000|max:1000000",
            "status"=>"required",
            "width"=> "required|numeric|min:0|max:3000",
            "category_id"=>"required",
            "filepath"=>"required"
        ];
    }
}
