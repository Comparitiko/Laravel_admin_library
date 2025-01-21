<header class="absolute top-0 w-full bg-slate-800 shadow-2xl p-2">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid h-fit sm:flex sm:items-center sm:justify-between sm:h-8">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/">
                    <img src="{{ asset('library.webp') }}" alt="Logo de la biblioteca"
                         class="h-8 w-auto rounded-2xl shadow-2xl">
                </a>
            </div>

            <!-- Navigation Bar -->
            <nav>
                <div class="grid mt-2 place-items-center gap-3 sm:flex sm:gap-6 sm:mt-0">
                    <x-header.nav-link :active="request()->is('/')" url="/">Biblioteca</x-header.nav-link>
                    <x-header.nav-link :active="request()->is('authors')" url="/authors">Autores</x-header.nav-link>
                    <x-header.nav-link :active="request()->is('locations')" url="/locations">Localizaciones</x-header.nav-link>
                    <x-header.nav-link :active="request()->is('books')" url="/books">Libros</x-header.nav-link>
                </div>
            </nav>
        </div>
    </div>
</header>
