@props(['action', 'method', 'class' => null])
<form
    enctype="multipart/form-data"
    action="{{ $action }}"
    method="{{ $method }}"
    @if($class) class="{{ $class }}" @endif
>
    @csrf
    {{ $slot }}
</form>
