@props(['authors'])

<div class="p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 ">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-2">
            <h3 class="mb-4 text-xl font-bold text-white ">Autores</h3>
            <x-anchor-buttons.primary-button
                url="{{ route('authors.create') }}"
            >
                Crear nuevo autor
            </x-anchor-buttons.primary-button>
        </div>
        <div class="items-center sm:flex">
            <x-forms.components.form
                action="{{ route('authors.store') }}"
                method="POST"
                class="flex items-center space-x-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.user />
                    </div>
                    <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input" placeholder="Nombre">
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.flag />
                    </div>
                    <input name="nationality" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input" placeholder="Nacionalidad">
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
                            <x-tables.components.th>Nombre</x-tables.components.th>
                            <x-tables.components.th>Nacionalidad</x-tables.components.th>
                            <x-tables.components.th>Fecha de nacimiento</x-tables.components.th>
                            <x-tables.components.th>Biografía</x-tables.components.th>
                            <x-tables.components.th>Código Dewey</x-tables.components.th>
                            <x-tables.components.th>Acciones</x-tables.components.th>
                        </x-tables.components.tr>
                        </thead>
                        <tbody class="bg-gray-800">
                        @foreach ($authors as $author)
                            <x-tables.components.tr :row_number="$loop->iteration">
                                <x-tables.components.td :row_number="$loop->iteration">{{ $author->name }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $author->nationality }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $author->date_of_birth }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $author->biography }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $author->dewey_code }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration" class="flex gap-3 text-right">
                                    <x-anchor-buttons.primary-button
                                        url="{{ route('authors.edit', ['author' => $author->id]) }}"
                                    >
                                        Editar
                                    </x-anchor-buttons.primary-button>
                                    <x-anchor-buttons.danger-button
                                        url="{{ route('authors.destroy', ['author' => $author->id]) }}"
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
                href="{{ $authors->previousPageUrl() }}"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm
                hover:bg-gray-700 {{ $authors->currentPage() === 1 ? 'disabled' : '' }}"
            >
                <x-icons.left-arrow />
                Anterior
            </a>
        </div>
        <p class="text-white">Página <span class="text-red-400">{{ $authors->currentPage() }}</span> de {{ $authors->lastPage() }}</p>
        <div class="flex-shrink-0">
            <a
                href="{{ $authors->nextPageUrl() }}"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm
                hover:bg-gray-700 {{ $authors->lastPage() === $authors->currentPage() ? 'disabled' : '' }}"
            >
                Siguiente
                <x-icons.right-arrow />
            </a>
        </div>
    </div>
</div>
