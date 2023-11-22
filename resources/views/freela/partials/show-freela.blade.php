<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="sm:table-auto text-sm text-left text-gray-500 dark:text-gray-400">
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

            @foreach ($freelas as $freela)

            <tbody>

                <tr
                    class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{Auth::user()->company->companyName}}
                    </th>
                    <td class="px-6 py-4">
                        <input class="border-none bg-transparent" type="date" disabled value="{{$freela->dataFreela}}">
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
                    <td>
                        <form action="{{route('freela.search')}}" method="post">
                            @csrf
                            <input type="hidden" name="freela" value="{{$freela->id}}">
                            <input type="hidden" name="cargo" value="{{$freela->cargo}}">
                            <x-primary-button>{{'Enviar Convites'}}</x-primary-button>
                        </form>
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

        {{-- aqui teria que disparar o convite para o funcionario, ate que alguem aceite --}}
        <a href={{route('freela.create')}}>
            <x-primary-button>{{'Abrir Freela'}}</x-primary-button>
        </a>
    </div>

</section>