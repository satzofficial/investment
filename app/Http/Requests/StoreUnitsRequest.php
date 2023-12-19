<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        // try {
        Validator::extend('valid_name', function ($attribute, $value, $parameters, $validator) {
            // Define your custom validation logic for the name field
            // Return true if the name is valid, otherwise return false
            // Example: Check if the name contains only letters and spaces
            return preg_match('/^[a-zA-Z\s]+$/', $value);
        });

        Validator::extend('valid_symbol', function ($attribute, $value, $parameters, $validator) {
            // Define your custom validation logic for the symbol field
            // Return true if the symbol is valid, otherwise return false
            // Example: Check if the symbol contains only letters and is uppercase
            return preg_match('/^[a-zA-Z\s]+$/', $value);
        });

        return [
            'name' => 'required|valid_name',
            'symbol' => 'required|valid_symbol',
        ];
        // } catch (\Exception $e) {
        //     return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        // }

        // return [];
    }

    public function messages()
    {
        return [
            'name.valid_name' => 'The :attribute must contain only letters.',
            'symbol.valid_symbol' => 'The :attribute must contain only letters and spaces.',
        ];
    }
}