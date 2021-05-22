<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/cursos/code-5113374_1920.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full sm:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español</h1>
                <p class="text-white text-lg mt-2 m">Si estás buscando potenciar tus conocimeintos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso.</p>

                <div class="pt-2 relative mx-auto text-gray-600 my-4">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="Escribe algún curso de tu interés ..."
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

    <livewire:course-index />
</x-app-layout>
