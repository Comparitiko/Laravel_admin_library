<x-layouts.layout title="Libros | Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <x-tables.author-table
            :books="$books"
            name="{{ isset($name) ? $name : ''}}"
            nationality="{{ isset($nationality) ? $nationality : ''}}"
        />
    </main>
</x-layouts.layout>
