<div
    class="mt-5 max-w-sm mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-xl sm:p-6 "
>
    <x-forms.components.form
        action="{{ route('books.store') }}"
        method="POST"
    >
        <h1 class="text-3xl font-bold text-white text-center mb-4">Añadir nuevo libro</h1>
        <x-forms.components.errors />
        <x-forms.components.input
            name="title"
            id="title"
            type="text"
            placeholder="Título"
            label="Título"
            required
            value="{{ old('title') }}"
        />
        <x-forms.components.input
            name="isbn"
            id="isbn"
            type="text"
            placeholder="ISBN"
            label="ISBN"
            required
            value="{{ old('isbn') }}"
        />
        <x-forms.components.input
            name="cover"
            id="cover"
            type="file"
            placeholder="Portada del libro"
            label="Portada del libro"
            required
            accept="image/jpeg,image/png,image/jpg,image/webp"
            value="{{ old('cover') }}"
        />
        <x-forms.components.input
            name="publication_year"
            id="publication_year"
            type="number"
            placeholder="Año de publicación"
            label="Año de publicación"
            required
            min="1900"
            max="{{ date('Y') }}"
            value="{{ old('biography') }}"
        />
        <x-forms.components.select-input
            name="state"
            id="state"
            label="Estado"
            required
            value="{{ old('state') }}"
        >
            <option value="disponible">Disponible</option>
            <option value="prestado">Prestado</option>
            <option value="extraviado">Extraviado</option>
        </x-forms.components.select-input>

        <x-buttons.primary-button>Añadir autor</x-buttons.primary-button>
    </x-forms.components.form>
</div>
