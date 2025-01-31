<x-layouts.layout title="{{ $book->title }} | Biblioteca">
    <main class="bg-slate-700 px-10 py-52 sm:py-20 min-h-screen flex justify-center items-center">
        <div class="bg-slate-200 shadow-xl rounded-lg overflow-hidden max-w-4xl mx-auto">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <img
                        class="h-96 w-full object-cover md:w-48"
                        src="/{{ $book->cover }}"
                    alt="Portada del libro {{$book->title}}"
                    width={192}
                    height={384}
                    />
                </div>
                <div class="p-8">
                    <div class="capitalize tracking-wide text-xl text-indigo-500 font-semibold">
                        Localización: {{ $book->location->library_name }}
                    </div>
                    <h1 class="mt-2 text-3xl leading-8 font-bold tracking-tight text-gray-900">Autor/a: {{
                    $book->author->name
                    }}</h1>
                    <div class="mt-2 flex items-center">
                        <span class="ml-2 text-gray-600">ISBN: {{ $book->isbn }}</span>
                    </div>
                    <p class="mt-4 text-xl font-bold text-gray-900">
                        Año de publicación: {{ $book->publication_year }}
                    </p>
                    <p class="mt-2 text-gray-600">Estado actual: <span class="capitalize">{{ $book->state }}</span></p>
                    <div class="mt-6">
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.layout>
