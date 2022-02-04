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
                    Entro en el catalogo. Pinta en cada pelicula para ver más datos.
                </div>

                <div class="">
                    <div class="grid grid-cols-4 content-center">
                        @foreach($listaPeliculas as $key => $peli)
                            <div class="text-xl text-center flex justify-center ">
                                <a href="{{ url('/catalog/show/'. $key ) }}" :active="request()->routeIs('show')">
                                    <img src="{{$peli['poster']}}" class="mt-2 "
                                         style="max-height: 300px">
                                    <p>{{$peli['title']}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>


                <!-- <div class="w-1/4 px-4 bg-green-600">
                        <a href="{{route('show')}}" :active="request()->routeIs('show')">
                            <a href="./catalog/show/'MesetaNorte'" :active="request()->routeIs('show')">
                                <img src="https://picfiles.alphacoders.com/147/147078.jpg" class="mt-2"
                                     width="">
                            </a>
                        </a>
                    </div>
                    -->


                </div>

            </div>
        </div>
    </div>
</x-app-layout>


