<x-layouts.layout title="Autores | Biblioteca">
        <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
            <x-tables.author-table
                :authors="$authors"
                name="{{ $name ?? ''}}"
                nationality="{{ $nationality ?? ''}}"
            />
        </main>
</x-layouts.layout>
