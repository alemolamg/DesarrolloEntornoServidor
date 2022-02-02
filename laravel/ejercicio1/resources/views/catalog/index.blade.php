<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Entro en el catalogo. Pinta en la película para ver más datos
                </div>

                <div class="flex">
                    <div class="w-1/4 px-4 bg-red-600">
                        <a href="{{route('show')}}" :active="request()->routeIs('show')">
                            <a href="./catalog/show/'Inglourius Basterds'" :active="request()->routeIs('show')">
                                <img src="https://picfiles.alphacoders.com/147/147078.jpg" class="mt-2"
                                     width="200px">
                            </a>
                        </a>
                    </div>

                    <div class="w-1/4 px-4 bg-green-600">
                        <a href="{{route('show')}}" :active="request()->routeIs('show')">
                            <a href="./catalog/show/'MesetaNorte'" :active="request()->routeIs('show')">
                                <img src="https://picfiles.alphacoders.com/147/147078.jpg" class="mt-2"
                                     width="200px">
                            </a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


