<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @if (Auth::user()->typeUser == 'gerente')
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome da Empresa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Data do Freela
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Inicio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Final
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cargo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>

                            @foreach ($freelas as $freela)
                            <tbody>

                                <tr
                                    class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{Auth::user()->company->companyName}}
                                    </th>
                                    <td class="px-6 py-4">
                                        <input class="border-none bg-transparent" type="date" disabled
                                            value="{{$freela->dataFreela}}">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$freela->horaInicio}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$freela->horaFinal}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$freela->cargo}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$freela->valorFreela}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @livewire('toggle-freela',[
                                        'freela' => $freela,
                                        'status' => 'status'
                                        ])

                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href={{route("freela.edit", $freela->id)}}
                                            class="font-medium text-blue-600 dark:text-blue-500
                                            hover:underline">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    {{ $freelas->links()}}


                    <div class="mt-4">
                        <a href={{route('freela.create')}}>
                            <x-primary-button>{{'Abrir Freela'}}</x-primary-button>
                        </a>
                    </div>


                    @else


                    {{ __("Acompanhe as suas mérticas") }}

                    {{$i=4}}

                    <div class="flex items-center mb-5 mt-4">
                        <p
                            class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1.5 rounded dark:bg-blue-200 dark:text-blue-800">
                            8.7</p>
                        <p class="ml-2 font-medium text-gray-900 dark:text-white">Excellent</p>
                        <span class="w-1 h-1 mx-2 bg-gray-900 rounded-full dark:bg-gray-500"></span>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">376 reviews</p>
                        <a href="#"
                            class="ml-auto text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read
                            all reviews</a>
                    </div>
                    <div class="gap-8 sm:grid sm:grid-cols-2">
                        <div>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Staff</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width:{{$i}}%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$i}}</span>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Comfort</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: 89%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Free WiFi</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: 88%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Facilities</dt>
                                <dd class="flex items-center">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: 54%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">5.4</span>
                                </dd>
                            </dl>
                        </div>
                        <div>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Value for money</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: 89%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Cleanliness</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: 70%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">7.0</span>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Location</dt>
                                <dd class="flex items-center">
                                    <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                        <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: 89%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>

                                </dd>
                            </dl>
                        </div>
                    </div>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
