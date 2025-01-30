<x-layouts.layout title="Añadir nuevo autor | Biblioteca">
    <main class="bg-slate-700 px-10 py-20 min-h-screen">
        <x-forms.create-book-form
            :booksStates="$bookStates"
            :authors="$authors"
            :libraries="$libraries"
        />
    </main>
</x-layouts.layout>
