@if ($errors->any())
    @foreach ($errors->all() as $error)
        <small
            class="text-red-500 text-xs font-bold tracking-wide mb-1"
        >
            {{ $error }}
        </small>
    @endforeach
@endif
