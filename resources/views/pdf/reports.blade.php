<x-layouts.simple-layout title="{{ $filename }}">
    <main class="bg-slate-700 min-h-screen">
        <x-tables.library-table
            :books="$books"
        />
    </main>
</x-layouts.simple-layout>
