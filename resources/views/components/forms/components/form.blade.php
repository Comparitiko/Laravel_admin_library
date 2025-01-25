@props(['action', 'method', 'class' => null])
<form
    action="{{ $action }}"
    method="{{ $method }}"
    @if($class) class="{{ $class }}" @endif
>
    @csrf
    {{ $slot }}
</form>
