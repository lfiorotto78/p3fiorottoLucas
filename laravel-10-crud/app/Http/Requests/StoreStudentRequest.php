<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => 'required|integer|max:99999999|unique:students,dni',
            'firstname' => 'required|string|max:250',
            'lastname' => 'required|string|max:250',
            'birthdate' => 'required|date'
        ];
    }
}