@props([
    'booksStates',
    'book',
    'authors',
    'libraries'
])

<div
    class="mt-5 max-w-sm mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-xl sm:p-6"
>
    <x-forms.components.form
        action="{{ route('books.update', $book->id) }}"
        method="POST"
    >
        <h1 class="text-3xl font-bold text-white text-center mb-4">Editar el libro {{ $book->title }}</h1>
        <x-forms.components.errors />
        <x-forms.components.input
            name="title"
            id="title"
            type="text"
            placeholder="Título"
            label="Título"
            required
            value="{{ old('title', $book->title) }}"
        />
        <x-forms.components.input
            name="cover"
            id="cover"
            type="file"
            label="Portada del libro"
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
            value="{{ old('publication_year', $book->publication_year) }}"
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
                    @if(old('state', $book->state) == $bookState->state) selected @endif
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
                    @if( old('author_id', $book->author_id) == $author->id) selected @endif
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
                    @if( old('location_id', $book->location->id) == $library->id) selected @endif
                >
                    {{ $library->library_name }}
                </option>
            @endforeach
        </x-forms.components.select-input>

        <x-buttons.primary-button>Editar libro</x-buttons.primary-button>
    </x-forms.components.form>
</div>
