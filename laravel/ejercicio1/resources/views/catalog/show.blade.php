<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $miPeli['title']}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2">

                    <div class="flex justify-start align-middle bg-red-300">
                        <img src="{{$miPeli['poster']}}" class="mt-2"
                             width="380px">
                    </div>

                    <div class=" justify-center ">
                        <h2 class="text-4xl font-bold">{{$miPeli['title']}}</h2>
                        <div class="flex justify-between">
                            <h3 class="text-3xl font-bold">Año: {{$miPeli['year']}}</h3> <br>
                            <h3 class="text-3xl">Director: {{$miPeli['director']}}</h3>
                        </div>
                        <p class="">
                        <h3 class="font-bold text-xl">Resumen: </h3> {{$miPeli['synopsis']}}
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


