@props([
    'name',
    'id',
    'label',
])

<div class="mb-5">
    <label
        for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-white capitalize"
    >
        {{ $label }}
    </label>

    <select
        name="{{ $name }}"
        id="{{ $id }}"
        class="border text-white text-sm rounded-lg focus:ring-blue-500
        focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light capitalize"
        {{ $attributes->merge() }}
    >
        {{ $slot }}
    </select>
</div>

