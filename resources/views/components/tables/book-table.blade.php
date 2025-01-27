@props(['books', 'author' => '', 'title' => '', 'isbn' => ''])

<div class="p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 ">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-2">
            <h3 class="mb-4 text-xl font-bold text-white ">Libros</h3>
            <x-anchor-buttons.primary-button
                url="{{ route('books.create') }}"
            >
                Añadir nuevo libro
            </x-anchor-buttons.primary-button>
        </div>
        <div class="items-center sm:flex">
            <x-forms.components.form
                action="{{ route('books.search') }}"
                method="GET"
                class="flex flex-wrap gap-2 items-center space-x-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.user />
                    </div>
                    <input name="author" type="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input" placeholder="Autor"
                           value="{{ $author }}">
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.book />
                    </div>
                    <input name="title" type="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input"
                           placeholder="Título" value="{{ $title }}">
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.tag />
                    </div>
                    <input name="isbn" type="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input"
                           placeholder="ISBN" value="{{ $isbn }}">
                </div>
                <div>
                    <button class="button bg-blue-500 hover:bg-blue-600 text-white" name="search">Buscar</button>
                </div>
            </x-forms.components.form>
        </div>
    </div>
    <!-- Table -->
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-600">
                        <thead class="bg-gray-700">
                        <x-tables.components.tr>
                            <x-tables.components.th>Título</x-tables.components.th>
                            <x-tables.components.th>Isbn</x-tables.components.th>
                            <x-tables.components.th>Año de publicación</x-tables.components.th>
                            <x-tables.components.th>Estado</x-tables.components.th>
                            <x-tables.components.th>Autor</x-tables.components.th>
                            <x-tables.components.th>Localización</x-tables.components.th>
                            <x-tables.components.th>Acciones</x-tables.components.th>
                        </x-tables.components.tr>
                        </thead>
                        <tbody class="bg-gray-800">
                        @foreach ($books as $book)
                            <x-tables.components.tr :row_number="$loop->iteration">
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->title }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->isbn
                                }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->publication_year
                                }}</x-tables.components.td>
                                <x-tables.components.td
                                    class="capitalize"
                                    :row_number="$loop->iteration">{{ $book->state }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->author->name
                                }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->location->library_name
                                }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration" class="flex gap-3 text-right">
                                    <x-anchor-buttons.primary-button
                                        url="{{ route('books.edit', ['book' => $book->id]) }}"
                                    >
                                        Editar
                                    </x-anchor-buttons.primary-button>
                                    <x-anchor-buttons.danger-button
                                        url="{{ route('books.destroy', ['book' => $book->id]) }}"
                                    >
                                        Eliminar
                                    </x-anchor-buttons.danger-button>
                                </x-tables.components.td>
                            </x-tables.components.tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Footer -->
    <div class="flex items-center justify-between pt-3 sm:pt-6">
        <div>
            <a
                href="{{ $books->previousPageUrl() }}"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm
                hover:bg-gray-700 {{ $books->currentPage() === 1 ? 'disabled' : '' }}"
            >
                <x-icons.left-arrow />
                Anterior
            </a>
        </div>
        <p class="text-white">Página <span class="text-red-400">{{ $books->currentPage() }}</span> de {{
        $books->lastPage() }}</p>
        <div class="flex-shrink-0">
            <a
                href="{{ $books->nextPageUrl() }}"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm
                hover:bg-gray-700 {{ $books->lastPage() === $books->currentPage() ? 'disabled' : '' }}"
            >
                Siguiente
                <x-icons.right-arrow />
            </a>
        </div>
    </div>
</div>
