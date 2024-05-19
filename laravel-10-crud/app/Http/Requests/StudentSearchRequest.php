<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentSearchRequest extends FormRequest
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
            'dni' => 'required|numeric|integer|min:1|digits_between:1,8'
        ];
    }

    public function messages(): array
    {
        return [
            'dni.required' => 'Debe ingresar un número para iniciar la búsqueda.',
            'dni.numeric' => 'Debe ser numérico.',
            'dni.integer' => 'Debe ser un número entero.',
            'dni.min' => 'Debe ser mayor o igual a 1.',
            'dni.digits_between' => 'Debe tener entre 1 y 8 dígitos.'
        ];
    }
}
