<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'library_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'shelf_number' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'library_name.required' => 'El nombre de la biblioteca es obligatorio',
            'library_name.string' => 'El nombre de la biblioteca debe ser una cadena',
            'library_name.max' => 'El nombre de la biblioteca debe tener menos de :max caracteres',
            'address.required' => 'La dirección es obligatoria',
            'address.string' => 'La dirección debe ser una cadena',
            'address.max' => 'La dirección debe tener menos de :max caracteres',
            'shelf_number.required' => 'El número de estantería es obligatorio',
            'shelf_number.integer' => 'El número de estantería debe ser un número entero',
            'shelf_number.min' => 'El número de estantería debe ser mayor o igual que :min',
        ];
    }
}
