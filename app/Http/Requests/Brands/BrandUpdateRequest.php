<?php

namespace App\Http\Requests\Brands;


use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

  class BrandUpdateRequest extends FormRequest
  {
      /**
       * Get the validation rules that apply to the request.
       *
       * @return array<string, ValidationRule|array|string>
       */
      public function rules(): array
      {
          return [
              'name' => 'required|string|min:1|max:225|unique:brands'.$this->brand->id,
              'description' => 'nullable|string',

          ];
      }

      public function failedValidation(Validator $validator)
      {
          throw new HttpResponseException(response()->json($validator->errors(), 422));
      }
  }

?>
