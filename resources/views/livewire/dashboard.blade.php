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
                    {{ __("You're logged in!") }} <br><br><br><br><br>

                    @if ($user->typeUSer == "trabalhar")

                    @else

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

                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->company->freelas as $freela)


                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->company->companyName}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$freela->dataFreela}}
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
                                        {{$freela->valor}}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href={{route("freela.edit", $freela->id)}}
                                            class="font-medium text-blue-600 dark:text-blue-500
                                            hover:underline">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                    </div>
                    @endif

                    <a href={{route('freela.create')}}>
                        <x-primary-button>{{'Abrir Freela'}}</x-primary-button>
                    </a>

                </div>

            </div>
        </div>
    </div>


</x-app-layout>
