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

                    <x-table>
                        <x-slot name='colunas'>
                            <x-th>Nome da Empresa</x-th>
                            <x-th>Data</x-th>
                            <x-th>Hora Inicial</x-th>
                            <x-th>Hora Final</x-th>
                            <x-th>Cargo</x-th>
                            <x-th>Valor</x-th>
                            <x-th>Status</x-th>
                        </x-slot>
                        @if(Auth::user()->typeUser !== 'gerente')
                        @foreach ($invites as $invite)
                        @endforeach

                        <x-slot name='invites'>
                            <x-slot name='linhas'>
                                <x-slot name='thRow' scope=row>{{$invite->company->companyName}}</x-slot>
                                <x-td>{{$invite->freela->dataFreela}}</x-td>
                                <x-td>{{$invite->freela->horaInicio}}</x-td>
                                <x-td>{{$invite->freela->horaFinal}}</x-td>
                                <x-td>{{$invite->freela->cargo}}</x-td>
                                <x-td>{{$invite->freela->valorFreela}}</x-td>
                                <x-td>
                                    @if ($invite->confirmacao == null)
                                    Pendente
                                    @else
                                    Confirmada
                                    @endif
                                </x-td>
                                <x-td>
                                    <a href="{{route('invite.show', $invite->id)}}">
                                        <x-primary-button>{{'Ver Vaga'}}</x-primary-button>
                                    </a>
                                </x-td>
                            </x-slot>


                        </x-slot>
                        @else
                        @foreach ($freelas as $freela)

                        @endforeach
                        <x-slot name='free'>
                            <x-slot name='linhas'>
                                <x-slot name='thRow' scope=row>{{$freela->company->companyName}}</x-slot>
                                <x-td>{{$freela->dataFreela}}</x-td>
                                <x-td>{{$freela->horaInicio}}</x-td>
                                <x-td>{{$freela->horaFinal}}</x-td>
                                <x-td>{{$freela->cargo}}</x-td>
                                <x-td>{{$freela->valorFreela}}</x-td>
                                <x-td>
                                    @livewire('toggle-freela',[
                                    'freela' => $freela,
                                    'status' => 'status'
                                    ])
                                </x-td>
                                <x-td>
                                    <form action="{{route('freela.search')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="freela" value="{{$freela->id}}">
                                        <input type="hidden" name="cargo" value="{{$freela->cargo}}">
                                        <x-primary-button>{{'Enviar Convites'}}</x-primary-button>
                                    </form>
                                </x-td>
                                <x-td>
                                    <a href={{route("freela.edit", $freela->id)}}
                                        class="font-medium text-blue-600 dark:text-blue-500
                                        hover:underline">Edit</a>
                                </x-td>
                            </x-slot>


                        </x-slot>
                        @endif

                    </x-table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
