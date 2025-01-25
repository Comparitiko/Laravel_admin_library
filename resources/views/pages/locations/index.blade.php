<x-layouts.layout title="Localizaciones | Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <x-tables.location-table
            :locations="$locations"
        />
    </main>
</x-layouts.layout>
