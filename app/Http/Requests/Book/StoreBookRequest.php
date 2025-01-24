<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'unique:books,isbn'],
            'cover' => ['required', 'mimes:jpg,png,jpeg,webp'],
            'publication_year' => ['required', 'integer', 'min:1900', 'max:'. date('Y')],
            'state' => ['required', 'in:disponible,prestado,extraviado'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'location_id' => ['required', 'integer', 'exists:locations,id'],
        ];
    }

    public function messages() {
        return [
            'title.required' => 'El título es obligatorio',
            'title.max' => 'El título debe tener menos de :max caracteres',
            'isbn.required' => 'El ISBN es obligatorio',
            'isbn.unique' => 'El ISBN ya existe',
            'cover.required' => 'El archivo es obligatorio',
            'cover.mimes' => 'El archivo debe ser de tipo :values',
            'publication_year.required' => 'La fecha de publicación es obligatoria',
            'publication_year.integer' => 'La fecha de publicación debe ser un número entero',
            'publication_year.min' => 'La fecha de publicación debe ser mayor o igual a :min',
            'publication_year.max' => 'La fecha de publicación debe ser menor o igual a :max',
            'state.required' => 'El estado es obligatorio',
            'state.in' => 'El estado debe ser :values',
            'author_id.required' => 'El autor es obligatorio',
            'author_id.exists' => 'El autor no existe',
            'location_id.required' => 'La ubicación es obligatoria',
            'location_id.exists' => 'La ubicación no existe',
        ];
    }
}
