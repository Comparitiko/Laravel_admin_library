@props(['locations'])

<div class="p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 ">
    <!-- Card header -->
    <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-2">
            <h3 class="mb-4 text-xl font-bold text-white ">Localizaciones</h3>
            <x-anchor-buttons.primary-button
                url="{{ route('locations.create') }}"
            >
                Crear nueva localización
            </x-anchor-buttons.primary-button>
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
                            <x-tables.components.th>Nombre de la localización</x-tables.components.th>
                            <x-tables.components.th>Dirección</x-tables.components.th>
                            <x-tables.components.th>Numero de estantería</x-tables.components.th>
                            <x-tables.components.th>Acciones</x-tables.components.th>
                        </x-tables.components.tr>
                        </thead>
                        <tbody class="bg-gray-800">
                        @foreach ($locations as $location)
                            <x-tables.components.tr :row_number="$loop->iteration">
                                <x-tables.components.td :row_number="$loop->iteration">{{ $location->library_name}}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $location->address }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration">{{ $location->shelf_number
                                }}</x-tables.components.td>
                                <x-tables.components.td :row_number="$loop->iteration" class="flex gap-3 text-right">
                                    <x-anchor-buttons.primary-button
                                        url="{{ route('locations.show_books', ['location' => $location->id]) }}"
                                    >
                                        Ver libros
                                    </x-anchor-buttons.primary-button>
                                    <x-anchor-buttons.danger-button
                                        url="{{ route('locations.destroy', ['location' => $location->id]) }}"
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
                href="{{ $locations->previousPageUrl() }}"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm
                hover:bg-gray-700 {{ $locations->currentPage() === 1 ? 'disabled' : '' }}"
            >
                <x-icons.left-arrow />
                Anterior
            </a>
        </div>
        <p class="text-white">Página <span class="text-red-400">{{ $locations->currentPage() }}</span> de {{
        $locations->lastPage() }}</p>
        <div class="flex-shrink-0">
            <a
                href="{{ $locations->nextPageUrl() }}"
                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm
                hover:bg-gray-700 {{ $locations->lastPage() === $locations->currentPage() ? 'disabled' : '' }}"
            >
                Siguiente
                <x-icons.right-arrow />
            </a>
        </div>
    </div>
</div>
