<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Informações do Freelancer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class=" flex p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">

                    <img class="w-20 h-20 mb-3 text-gray-400 rounded-full" src="{{ url("storage/{$company->image->image}") }}">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __($company->companyName) }}
                    </h2>
                    <label for="">Falar com: {{$user->name}}</label><br>

                    {{$company->contact}} <br>
                    {{$company->email}} <br><br><br>

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Endereço') }}
                    </h2>
                    <label class="font-semibold">Rua: </label>
                    {{$company->road}} <br>

                    <label class="font-semibold">numero: </label>
                    {{$company->number}}
                    <br>

                    <label class="font-semibold">Bairro: </label>
                    {{$company->neighborhood}}
                    <br><br><br>

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Informações do Freela') }}
                    </h2>

                    <label class="font-semibold">Cargo: </label>
                    {{$freela->cargo}} <br>
                    <label class="font-semibold">Dia: </label>
                    {{$freela->dataFreela}} <br>
                    <label class="font-semibold">Inicia: </label>
                    {{$freela->horaInicio}} <br>
                    <label class="font-semibold">Encerra: </label>
                    {{$freela->horaFinal}} <br>
                    <label class="font-semibold">Valor: </label>
                    {{$freela->valorFreela}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
