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

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nome da Empresa</th>
                                <th scope="col" class="px-6 py-3">Data</th>
                                <th scope="col" class="px-6 py-3">Hora Inicial</th>
                                <th scope="col" class="px-6 py-3">Hora Final</th>
                                <th scope="col" class="px-6 py-3">Cargo</th>
                                <th scope="col" class="px-6 py-3">Valor</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                            </tr>
                        </thead>


                        @if(Auth::user()->typeUser !== 'gerente')
                        @foreach ($invites as $invite)

                        <tbody>
                            <tr
                                class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <th scope='row'>{{$invite->company->companyName}}</th>
                                <td class="px-6 py-4">{{$invite->freela->dataFreela}}</td>
                                <td class="px-6 py-4">{{$invite->freela->horaInicio}}</td>
                                <td class="px-6 py-4">{{$invite->freela->horaFinal}}</td>
                                <td class="px-6 py-4">{{$invite->freela->valorFreela}}</td>
                                <td class="px-6 py-4">
                                    @if ($invite->confirmacao == null)
                                    Pendente
                                    @else
                                    Confirmada
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('invite.show', $invite->id)}}">
                                        <x-primary-button>{{'Ver Vaga'}}</x-primary-button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach

                        @else

                        @foreach ($freelas as $freela)

                        <tbody>
                            <tr
                                class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <th scope=row
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$freela->company->companyName}}</th>
                                <td class="px-6 py-4">{{$freela->dataFreela}}</td>
                                <td class="px-6 py-4">{{$freela->horaInicio}}</td>
                                <td class="px-6 py-4">{{$freela->horaFinal}}</td>
                                <td class="px-6 py-4">{{$freela->cargo}}</td>
                                <td class="px-6 py-4">{{$freela->valorFreela}}</td>
                                <td class="px-6 py-4">
                                    @if ($freela->status == true)
                                        {{'Vaga preenchida'}}

                                    @else
                                       {{'Não preenchida'}}
                                       
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{route('freela.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="freela" value="{{$freela->id}}">
                                        <input type="hidden" name="cargo" value="{{$freela->cargo}}">
                                        <x-primary-button>{{'Enviar Convites'}}</x-primary-button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href={{route("freela.edit", $freela->id)}}
                                        class="font-medium text-blue-600 dark:text-blue-500
                                        hover:underline">Edit</a>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach

                    </table>
                    <a href="{{route('freela.create')}}">
                        <x-primary-button class="mt-4">{{__('Cadastrar novos Freelas')}}</x-primary-button>
                    </a>

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
