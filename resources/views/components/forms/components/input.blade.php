@props([
    'name',
    'id',
    'type',
    'label',
    'value' => '',
    'placeholder' => '',
])

<div class="mb-5">
    <label
        for="{{ $id }}"
        class="block mb-2 text-sm font-medium text-white"
    >
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        class="border text-white text-sm rounded-lg focus:ring-blue-500
        focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        {{ $attributes->merge() }}
    />
</div>
