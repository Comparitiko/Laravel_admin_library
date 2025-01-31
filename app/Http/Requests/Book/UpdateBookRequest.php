<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => ['string', 'max:255'],
            'cover' => ['mimes:jpg,png,jpeg,webp'],
            'publication_year' => ['integer', 'min:1900', 'max:'.date('Y')],
            'state' => ['in:disponible,prestado,extraviado'],
            'author_id' => ['integer', 'exists:authors,id'],
            'location_id' => ['integer', 'exists:locations,id'],
        ];
    }

    public function messages() {
        return [
            'isbn.unique' => 'El ISBN ya existe',
            'title.max' => 'El título debe tener menos de :max caracteres',
            'cover.mimes' => 'El archivo debe ser de tipo :values',
            'publication_year.integer' => 'La fecha de publicación debe ser un número entero',
            'publication_year.min' => 'La fecha de publicación debe ser mayor o igual a :min',
            'state.in' => 'El estado debe ser :values',
            'author_id.exists' => 'El autor no existe',
            'location_id.exists' => 'La ubicación no existe',
        ];
    }
}
