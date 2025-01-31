<x-layouts.simple-layout title="{{ $filename }}">
    <main class="bg-slate-700 min-h-screen">
        <x-tables.pdf-library-table
            :books="$books"
        />
    </main>
</x-layouts.simple-layout>
