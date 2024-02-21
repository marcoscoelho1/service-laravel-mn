<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address.street' => 'required',
            'address.number' => 'required',
            'address.zip_code' => 'required',
            'address.id_city' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'address.street.required' => 'The street field is required.',
            'address.number.required' => 'The number field is required.',
            'address.zip_code.required' => 'The zip_code field is required',
            'address.id_city.required' => 'The id_city field is required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(['errors' => $validator->errors()], 400));
    }
}
