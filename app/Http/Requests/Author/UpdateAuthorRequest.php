<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'biography' => ['required', 'string', 'max:255'],
            'dewey_code' => ['required', 'string', 'regex:/^[0-9]{3}$/'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener menos de :max caracteres',
            'nationality.required' => 'La nacionalidad es obligatoria',
            'nationality.max' => 'La nacionalidad debe tener menos de :max caracteres',
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria',
            'biography.required' => 'La biografía es obligatoria',
            'biography.max' => 'La biografía debe tener menos de :max caracteres',
            'dewey_code.required' => 'El código Dewey es obligatorio',
            'dewey_code.regex' => 'El código Dewey debe tener 3 dígitos y ser numéricos',
            'dewey_code.unique' => 'El código Dewey ya existe',
        ];
    }
}
