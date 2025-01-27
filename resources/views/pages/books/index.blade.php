<x-layouts.layout title="Libros | Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <x-tables.book-table
            :books="$books"
            author="{{ $author ?? ''}}"
            title="{{ $title ?? ''}}"
            isbn="{{$isbn ?? ''}}"
        />
    </main>
</x-layouts.layout>
