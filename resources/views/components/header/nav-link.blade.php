@props(['active' => false, 'url'])

<a
    class="
    hover:underline hover:text-gray-100
    {{
        $active
            ? 'text-gray-50 font-medium'
            : 'text-gray-300'
    }}
    "
    href="{{ $url }}"
>
    {{ $slot }}
</a>
