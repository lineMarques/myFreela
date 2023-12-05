<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Avaliações') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3">Nome</th>
                                <th scope="col" class="px-6 py-3">Função</th>
                                <th scope="col" class="px-6 py-3">Dia</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                            </tr>
                        </thead>


                        @foreach ($freelancers as $key => $freelancer)
                        <tbody>
                            <tr
                                class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <th class="px-6 py-4">
                                    @if(empty($freelancer[0][0]->image->image))
                                    <img class="w-14 h-14 mb-3 text-gray-400 rounded-full" src="/assets/img/no-photo.png">
                                    @else
                                    <img class="w-14 h-14 mb-3 text-gray-400 rounded-full" src="{{ url("storage/{$freelancer[0][0]->image->image}") }}">
                                    @endif
                                </th>
                                <td class="px-6 py-4">{{$freelancer[0][0]->name}}</td>
                                <td class="px-6 py-4">{{$freelancer[1][0]->cargo}}</td>
                                <td class="px-6 py-4">{{$freelancer[1][0]->dataFreela}}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $invite = $invites->where('freela_id',$freelancer[1][0]->id)->first();

                                    @endphp

                                    @if ($invite->confirmacao  == 'Encerrada')

                                    <a  class="font-medium text-blue-600 dark:text-blue-500
                                    hover:underline" href="{{route('stars.edit', $invite->id)}}">
                                        Avaliar
                                    </a>

                                    @else

                                    {{'A vaga ainda não foi encerrada'}}

                                    @endif

                                </td>

                            </tr>
                        </tbody>

                        @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
