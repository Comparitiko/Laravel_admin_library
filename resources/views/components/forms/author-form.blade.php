<div
    class="mt-5 max-w-sm mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-xl sm:p-6 "
>
    <x-forms.components.form
        action="{{ route('authors.store') }}"
        method="POST"
    >
        <h1 class="text-3xl font-bold text-white text-center mb-4">Añadir nuevo autor</h1>
        <x-forms.components.errors />
        <x-forms.components.input
            name="name"
            id="name"
            type="text"
            placeholder="Nombre"
            label="Nombre"
            required
            value="{{ old('name') }}"
        />
        <x-forms.components.input
            name="nationality"
            id="nationality"
            type="text"
            placeholder="Nacionalidad"
            label="Nacionalidad"
            required
            value="{{ old('nationality') }}"
        />
        <x-forms.components.input
            name="date_of_birth"
            id="date_of_birth"
            type="date"
            placeholder="Fecha de nacimiento"
            label="Fecha de nacimiento"
            required
            min="1900-01-01"
            max="{{ date('Y-m-d') }}"
            value="{{ old('date_of_birth') }}"
        />
        <x-forms.components.input
            name="biography"
            id="biography"
            type="text"
            placeholder="Biografía"
            label="Biografía"
            required
            value="{{ old('biography') }}"
        />
        <x-forms.components.input
            name="dewey_code"
            id="dewey_code"
            type="text"
            placeholder="Código Dewey"
            label="Código Dewey"
            required
            value="{{ old('dewey_code') }}"
        />

        <x-buttons.primary-button>Añadir autor</x-buttons.primary-button>
    </x-forms.components.form>
</div>
