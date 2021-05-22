<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/asian-863318_1920.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full sm:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Mis cursos al día</h1>
                <p class="text-white text-lg mt-2 m">Aquí encontrarás las soluciones más eficientes para su empresa y a los mejores precios</p>

                <div class="pt-2 relative mx-auto text-gray-600 my-4">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="Escribe algún tema de tu interés ..."
                    >

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r absolute right-0 top-0 mt-2"
                        type="submit"
                    >
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/elephants-6254556_640.jpg') }}" alt="Cursos y productos">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y productos</h1>
                </header>

                <p class="text-sm text-gray-500">Encuentra una gran varieda de cursos y proyectos en Laravel, totalmente gratis</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/flower-6223380_640.jpg') }}" alt="Manual de Laravel">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manual de Laravel</h1>
                </header>

                <p class="text-sm text-gray-500">Hemos traducido la documentación oficial para ayudaterte en tu proceso de aprendizaje</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/norway-4973935_640.jpg') }}" alt="Blog">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog</h1>
                </header>

                <p class="text-sm text-gray-500">Artículos de programación y desarrollo web, para potenciar tu aprendizaje.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/puffin-5759684_640.jpg') }}" alt="Desarrollo web">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
                </header>

                <p class="text-sm text-gray-500">Si se te hace difícil aprender a programar, contáctanos y nosotros desarrollamos tu sitio web.</p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>

        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de cursos
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-700">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>

        <x-courses-list :courses="$courses" />
    </section>
</x-app-layout>
