@props(['books'])

<div class="p-4">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-2">
            <h3 class="mb-4 text-xl font-bold text-white text-center">Todos los libros de la Biblioteca</h3>
        </div>
    </div>
    <!-- Table -->
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="border-collapse">
                        <thead class="bg-gray-700">
                        <tr class="border border-gray-700">
                            <th class="border py-2 px-4">#</th>
                            <th class="border py-2 px-4">Título</th>
                            <th class="border py-2 px-4">Isbn</th>
                            <th class="border py-2 px-4">Estado</th>
                            <th class="border py-2 px-4">Autor</th>
                            <th class="border py-2 px-4">Localización</th>
                        </tr>
                        </thead>
                        <tbody class="border border-gray-700">
                        @foreach ($books as $book)
                            <tr class="border">
                                <td class="border py-2 px-4 text-center font-bold">{{ $loop->iteration }}</td>
                                <td class="border py-2 px-4">{{$book->title }}</td>
                                <td class="border py-2 px-4">{{ $book->isbn }}</td>
                                <td class="border capitalize py-2 px-4">{{ $book->state }}</td>
                                <td class="border py-2 px-4">{{ $book->author->name }}</td>
                                <td class="border py-2 px-4">{{ $book->location->library_name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
