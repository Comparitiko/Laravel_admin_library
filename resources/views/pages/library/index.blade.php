<x-layouts.layout title="Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen">
        <a href="{{ route('report') }}" class="m-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4
        rounded">Generar Reporte</a>
        <x-tables.library-table
            :books="$books"
        />
    </main>
</x-layouts.layout>
