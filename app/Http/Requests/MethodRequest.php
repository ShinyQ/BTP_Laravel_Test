<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MethodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string'],
            'is_default' => [''],
            'description' => ['required_if:is_default,1']
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, Response::json([
            'code' => 400,
            'error' => $validator->errors()->all()
        ]));
    }
}
