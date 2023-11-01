<x-app-layout>
    <section>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Convite') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class=" flex p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div>
                        <p class="mt-1 text-xl text-gray-600 dark:text-gray-400">
                            Olá <span class="font-semibold text-gray-800">{{Auth::user()->userName}}</span>, a empresa
                            <span class="font-semibold text-gray-800">{{$invite->freela->company->companyName}}</span>
                            está te
                            convidando
                            para um freela.
                        </p>

                        <h2 class="mt-10 text-xl text-gray-600 dark:text-gray-200 leading-tight">Informações da
                            Vaga</h2>
                    </div>
                </div>

                <div class=" flex p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="mt-4">

                        <x-input-label for="data" :value="__('Data do Freela')" />
                        <x-text-input id="data" class="block" type="date" name="data"
                            :value="old('data', $invite->freela->dataFreela)" disabled />


                        <x-input-label class="mt-4" for="horaInicio" :value="__('Hora que inicia o trabalho')" />
                        <p class="mt-1 text-xl text-gray-600 dark:text-gray-400">{{ $invite->freela->horaInicio}}</p>

                        <x-input-label class="mt-4" for="horaFinal" :value="__('Hora que termina o trabalho')" />
                        <p class="mt-1 text-xl text-gray-600 dark:text-gray-400">{{$invite->freela->horaFinal}}</p>

                        <x-input-label class="mt-4" for="endereco" :value="__('Local')" />
                        <p class="mt-1 text-xl text-gray-600 dark:text-gray-400">
                            {{$invite->freela->company->address->road}}, {{$invite->freela->company->address->number}},
                            {{$invite->freela->company->address->neighborhood}}
                        </p>

                        <x-input-label class="mt-4" for="valorFreela" :value="__('Valor')" />
                        <p class="mt-1 text-xl text-gray-600 dark:text-gray-400">{{$invite->freela->valorFreela}}</p>

                        <div class=" flex mt-4">
                            {{dump($invite->id)}}
                            <form action="{{route('invite.update',['id' =>$invite->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <x-primary-button>{{ __('Aceitar') }}</x-primary-button>
                            </form>

                            <form action="{{route('invite.destroy', $invite->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <x-secondary-button type="submit" class="ml-4">{{__('Recusar')}}</x-secundary-button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
