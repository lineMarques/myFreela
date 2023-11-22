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
    @if ($freelas)
    <x-slot name='invites'>
       $freela->id
    </x-slot>
    @else
    <x-slot name='freelas'>
        b
    </x-slot>
    @endif
    <x-slot name='linhas'>
    </x-slot>
</x-table>



{{--  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
        @foreach ($invites as $invite)
        <tbody>

            <tr
                class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$invite->freela->company->companyName}}
                </th>
                <td class="px-6 py-4">
                    {{$invite->freela->dataFreela}}
                </td>
                <td class="px-6 py-4">
                    {{$invite->freela->horaInicio}}
                </td>
                <td class="px-6 py-4">
                    {{$invite->freela->horaFinal}}
                </td>
                <td class="px-6 py-4">
                    {{$invite->freela->cargo}}
                </td>
                <td class="px-6 py-4">

                    {{$invite->freela->valorFreela}}

                </td>
                <td class="px-6 py-4">
                    @if($invite->confirmacao == true)
                    Aceita
                    @else
                    Pendente
                    @endif
                </td>
                <td class="px-6 py-4">

                </td>
                <td>
                    <a href="{{route('invite.show', $invite->id)}}">
                        <x-primary-button>{{'Ver Vaga'}}</x-primary-button>
                    </a>
                </td>

            </tr>
        </tbody>
        @endforeach
    </table>
</div> --}}
{{-- {{$invites->links()}} --}}
