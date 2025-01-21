@props(['url'])

<a
    href="{{ $url  }}"
    class="anchor-button text-white bg-blue-500 hover:bg-blue-600"
>
    {{ $slot }}
</a>
