<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UpdateStudentRequest extends FormRequest
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
            'dni' => 'required|numeric|integer|min:1|digits_between:1,8|unique:students,dni,'.$this->student->id,
            'firstname' => 'required|alpha|string|max:250',
            'lastname' => 'required|alpha|string|max:250',
            'birthdate' => 'required|date|before:'.Carbon::now()->subYears(18)
        ];
    }

    public function messages(): array
    {
        return [
            'dni.required', 'firstname.required', 'lastname.required', 'birthdate.required' => 'Este campo es obligatorio.',
            'dni.numeric' => 'Este campo debe ser numérico.',
            'dni.integer' => 'Este campo debe ser un número entero.',
            'dni.min' => 'Este campo debe ser mayor o igual a 1.',
            'dni.digits_between' => 'Este campo debe tener entre 1 y 8 dígitos.',
            'firstname.alpha', 'firstname.string', 'lastname.alpha', 'lastname.string' => 'Este campo solo puede contener letras.',
            'firstname.max', 'lastname.max' => 'Este campo tiene un límite máximo de 250 caracteres.',
            'birthdate.date' => 'Este campo debe ser una fecha válida.',
            'birthdate.before' => 'El alumno debe ser mayor de edad.'
        ];
    }
}