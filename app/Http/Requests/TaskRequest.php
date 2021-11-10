<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
      {
          return [
              'title' => ['required', 'string', 'max:50'],
              'types' => ['required']
          ];
      }
  
      protected function failedValidation(Validator $validator)
      {
          parent::failedValidation($validator); 
          throw new HttpResponseException(response()->json(['errors' => $validator->errors()->all()], 422));
      }

}
