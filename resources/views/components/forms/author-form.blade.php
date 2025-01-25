<div
    class="mt-5 max-w-sm mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-xl sm:p-6 "
>
    <x-forms.components.form
        action="{{ route('authors.store') }}"
        method="POST"
        class="pb-5"
    >
        <x-forms.components.input
            name="name"
            id="name"
            type="text"
            placeholder="Nombre"
            label="Nombre"
            required
        />
        <x-forms.components.input
            name="nationality"
            id="nationality"
            type="text"
            placeholder="Nacionalidad"
            label="Nacionalidad"
            required
        />
        <x-forms.components.input
            name="date_of_birth"
            id="date_of_birth"
            type="date"
            placeholder="Fecha de nacimiento"
            label="Fecha de nacimiento"
            required
        />
        <x-forms.components.input
            name="biography"
            id="biography"
            type="text"
            placeholder="Biografía"
            label="Biografía"
            required
        />

        <x-buttons.primary-button>Añadir autor</x-buttons.primary-button>
    </x-forms.components.form>
</div>
