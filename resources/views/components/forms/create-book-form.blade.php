@props([
    'booksStates',
    'authors',
    'libraries'
])

<div
    class="mt-5 max-w-sm mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-xl sm:p-6"
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
            label="Portada del libro"
            required
            accept="image/*"
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
            value="{{ old('publication_year') }}"
        />
        <x-forms.components.select-input
            name="state"
            id="state"
            label="Estado"
        >
            <option>Seleccionar estado</option>
            @foreach ($booksStates as $bookState)
                <option
                    value="{{ $bookState->state }}"
                    class="capitalize"
                    @if(old('state') == $bookState->state) selected @endif
                >
                    {{ $bookState->state }}
                </option>
            @endforeach
        </x-forms.components.select-input>

        <x-forms.components.select-input
            name="author_id"
            id="author_id"
            label="Autor"
        >
            <option>Seleccionar autor</option>
            @foreach ($authors as $author)
                <option
                    value="{{ $author->id }}"
                    @if( old('author_id') == $author->id) selected @endif
                >
                    {{ $author->name }}
                </option>
            @endforeach
        </x-forms.components.select-input>

        <x-forms.components.select-input
            name="location_id"
            id="location_id"
            label="Localización"
        >
            <option>Seleccionar localización</option>
            @foreach ($libraries as $library)
                <option
                    value="{{ $library->id }}"
                    @if( old('location_id') == $library->id) selected @endif
                >
                    {{ $library->library_name }}
                </option>
            @endforeach
        </x-forms.components.select-input>

        <x-buttons.primary-button>Añadir libro</x-buttons.primary-button>
    </x-forms.components.form>
</div>
