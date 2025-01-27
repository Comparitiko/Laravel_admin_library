<x-layouts.layout title="Libros de {{ $location->library_name }} | Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <x-tables.location-books-table
            :books="$books"
            :location="$location"
        />
    </main>
</x-layouts.layout>
