<?php

namespace App\Http\Requests\Products;


use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

  class ProductCreateRequest extends FormRequest
  {
      /**
       * Get the validation rules that apply to the request.
       *
       * @return array<string, ValidationRule|array|string>
       */
      public function rules(): array
      {
          return [
              'name' => 'required|string|min:1|max:225|unique:products',
              'category_id' => 'required|integer|exists:categories,id',
              'brand_id' => 'nullable|integer|exists:brands,id',
              'price' => 'required|numeric|min:0',
              'sale' => 'nullable|numeric|min:0',
              'description' => 'nullable|string',

          ];
      }

      public function failedValidation(Validator $validator)
      {
          throw new HttpResponseException(response()->json($validator->errors(), 422));
      }
  }

?>
