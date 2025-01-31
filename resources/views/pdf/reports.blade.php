<x-layouts.simple-layout title="{{ $filename }}">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <x-tables.library-table
            :books="$books"
        />
    </main>
</x-layouts.simple-layout>
