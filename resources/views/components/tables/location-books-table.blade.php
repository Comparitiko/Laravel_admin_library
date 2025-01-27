@props(['location', 'books'])

<div class="p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 ">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-2">
            <h3 class="mb-4 text-xl font-bold text-white ">Libros en {{ $location->library_name }}</h3>
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
                            <x-tables.components.th>Acciones</x-tables.components.th>
                        </x-tables.components.tr>
                        </thead>
                        <tbody class="bg-gray-800">
                        @foreach ($books as $book)
                            <x-tables.components.tr :row_number="$loop->iteration">
                                <x-tables.components.td :row_number="$loop->iteration">
                                    <a
                                        class="cursor-pointer text-blue-500 hover:text-blue-100 hover:underline"
                                        href={{route('books.show', ['book' => $book])}}
                                    >
                                        {{ $book->title }}
                                    </a>
                                </x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->isbn
                                }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->publication_year
                                }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->state }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $book->author->name
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
