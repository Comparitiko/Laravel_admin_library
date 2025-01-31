@props(['books'])

<div class="p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 ">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-2">
            <h3 class="mb-4 text-xl font-bold text-white ">Biblioteca</h3>
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
                        </x-tables.components.tr>
                        </thead>
                        <tbody class="bg-gray-800">
                        @foreach ($books as $book)
                            <x-tables.components.tr :row_number="$loop->iteration">
                                <x-tables.components.td :row_number="$loop->iteration"><a href="{{route('books.show', [
                                    'book' => $book->id
                                    ])
                                }}">{{$book->title
                                }}</a></x-tables.components.td>
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
                            </x-tables.components.tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
