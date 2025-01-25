<div
    class="mt-5 max-w-sm mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-xl sm:p-6 "
>
    <x-forms.components.form
        action="{{ route('locations.store') }}"
        method="POST"
    >
        <h1 class="text-2xl font-bold text-white text-center mb-4">Añadir nueva localización</h1>
        <x-forms.components.errors />
        <x-forms.components.input
            name="library_name"
            id="library_name"
            type="text"
            placeholder="Nombre de la biblioteca"
            label="Nombre de la biblioteca"
            required
            value="{{ old('library_name') }}"
        />
        <x-forms.components.input
            name="address"
            id="address"
            type="text"
            placeholder="Dirección"
            label="Dirección"
            required
            value="{{ old('address') }}"
        />
        <x-forms.components.input
            name="shelf_number"
            id="shelf_number"
            type="number"
            placeholder="Número de estantería"
            label="Número de estantería"
            required
            value="{{ old('shelf_number')}}"
        />

        <x-buttons.primary-button>Añadir localización</x-buttons.primary-button>
    </x-forms.components.form>
</div>
