<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar Vaga') }}
        </h2>
    </x-slot>

    <form action="{{route('freela.store')}}" wire:submit='save()' method="post">
        @csrf

        <div class="sm:flex-col py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800  sm:rounded-lg">

                    <header class="mt-4">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Cadastre as informações da vaga
                        </h2>
                    </header>

                    <div class="mt-4">
                        <x-input-label for=dataFreela :value="__('Qual o dia do Freela?')" />
                        <x-text-input id="dataFreela" class="w-full block mt-0" type="date" name="dataFreela"
                            :value="old('dataFreela')" min="{{date('Y-m-d')}}" required autocomplete="dataFreela"/>
                        <x-input-error :messages="$errors->get('dataFreela')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="horaInicio" :value="__('Que horas o inicia o trabalho?')" />
                        <x-text-input id="horaInicio" class="w-full block mt-0" type="time" name="horaInicio"
                            :value="old('horaInicio')" required autocomplete="horaInicio"   />
                        <x-input-error :messages="$errors->get('horaInicio')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="horaFinal" :value="__('Que horas o termina o trabalho?')" />
                        <x-text-input id="horaFinal" class="w-full block mt-0" type="time" name="horaFinal"
                            :value="old('horaFinal')" required autocomplete="horaFinal" />
                        <x-input-error :messages="$errors->get('horaFinal')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="cargo" :value="__('Para qual cargo você está contratando?')" />
                        <x-select name="cargo" id="cargo">
                            <option value="auxCozinha" {{old('jobTitle')==='auxCozinha' ? 'selected' : '' }}>Auxiliar de
                                Cozinha</option>
                            <option value="chapeiro" {{old('jobTitle')==='chapeiro' ? 'selected' : '' }}>Chapeiro
                            </option>
                            <option value="cozinheiro" {{old('jobTitle')==='cozinheiro' ? 'selected' : '' }}>Cozinheiro
                            </option>
                            <option value="lavacao" {{old('jobTitle')==='lavacao' ? 'selected' : '' }}>Lavação</option>
                            <option value="sushiman" {{old('jobTitle')==='sushiman' ? 'selected' : '' }}>Sushiman
                            </option>
                            <option value="pizzaiolo" {{old('jobTitle')==='pizzaiolo' ? 'selected' : '' }}>pizzaiolo
                            </option>
                        </x-select>
                        <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="observacao" :value="__('Alguma Observação?')" />
                        <textarea
                            class="w-full block font-medium text-sm text-gray-700 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            name="observacao" id="observacao" placeholder="EX: Disponibilizamos uniforme."></textarea>
                        <x-input-error :messages="$errors->get('observacao')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="valorFreela" :value="__('Qual o valor do freela?')" />
                        <x-text-input id="valorFreela" class="w-full block mt-1" type="text" name="valorFreela"
                            :value="old('valorFreela')" required autocomplete="valorFreela" />
                        <x-input-error :messages="$errors->get('valorFreela')" class="mt-2" />
                    </div>

                    <a href="http://"></a>
                    <x-primary-button class="mt-4">Cadastrar Freela</x-primary-button>

                    @if (session('status') === 'hora-inicio')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Informação atualizada.') }}</p>
                    @endif

                </div>

            </div>
        </div>
    </form>


</x-app-layout>
