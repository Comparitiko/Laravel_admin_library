@props(['url'])

<a
    href="{{ $url  }}"
    class="anchor-button text-white bg-red-500 hover:bg-red-600"
>
    {{ $slot }}
</a>
