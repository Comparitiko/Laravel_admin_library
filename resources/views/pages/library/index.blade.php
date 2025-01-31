<x-layouts.layout title="Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <x-tables.library-table
            :books="$books"
            :author="$author ?? ''"
            :title="$title ?? ''"
            :state="$state ?? ''"
            :location="$location ?? ''"
        />
    </main>
</x-layouts.layout>
