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
                                <th class="px-6 py-4">{{$invite->company->companyName}}</th>
                                <td class="px-6 py-4">{{$invite->freela->dataFreela}}</td>
                                <td class="px-6 py-4">{{$invite->freela->horaInicio}}</td>
                                <td class="px-6 py-4">{{$invite->freela->horaFinal}}</td>
                                <td class="px-6 py-4">{{$invite->freela->cargo}}</td>
                                <td class="px-6 py-4">{{$invite->freela->valorFreela}}</td>
                                <td class="px-6 py-4">{{$invite->confirmacao}}</td>
                                <td class="px-6 py-4">
                                    @if ($invite->confirmacao == 'Pendente')
                                    <a href="{{route('invite.show', $invite->id)}}">
                                        <x-primary-button>{{'Ver Vaga'}}</x-primary-button>
                                    </a>
                                </td>
                                @endif

                                @if ($invite->confirmacao == 'Confirmada')
                                <td class="px-6 py-4">
                                    <a href="{{route('info.company')}}" class="font-medium text-blue-600 dark:text-blue-500
                                        hover:underline">
                                        <p>Entre em contato com a empresa</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{route('encerrar.close')}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="freela" value="{{$invite->company_id}}">
                                        <input type="hidden" name="invite" value="{{$invite->id}}">
                                        <x-danger-button>{{'Encerrar'}}</x-danger-button>
                                    </form>
                                </td>

                                @else

                                @endif
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

                                @if ($freela->status == 'Vaga Preenchida')
                                    {{$freela->status}}

                                <td class="px-6 py-4">
                                    <a href="{{route('info.show')}}" class="font-medium text-blue-600 dark:text-blue-500
                                        hover:underline">
                                        <p>Informações Freelancer</p>
                                    </a>
                                </td>
                                @endif

                                @if ($freela->status == 'Encerrada')
                                {{$freela->status}}
                                @endif

                                @if ($freela->status == 'Não preenchida')
                                {{$freela->status}}
                                <td class="px-6 py-4">
                                    <form action="{{route('freela.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="freela" value="{{$freela->id}}">
                                        <input type="hidden" name="cargo" value="{{$freela->cargo}}">
                                        <x-primary-button>{{__('Enviar')}}</x-primary-button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href={{route("freela.edit", $freela->id)}}
                                        class="font-medium text-blue-600 dark:text-blue-500
                                        hover:underline">Edit</a>
                                </td>
                                @endif


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
