<section>
    <div class="flex">
        <form action="{{route('freela.update', $freela->id)}}" method="POST">
            @csrf
            @method('patch')


            <div class="flex py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800  sm:rounded-lg">
                        <header class="mt-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Atualize as informações da vaga
                            </h2>
                        </header>

                        <div class="mt-4">
                            <x-input-label for="dataFreela" :value="__('Qual é o dia do Freela?')" />

                            <x-text-input id="dataFreela" class="w-full block mt-0" type="date" name="dataFreela"
                                value="{{ $freela->dataFreela}}" required autocomplete="dataFreela" />
                            <x-input-error :messages="$errors->get('dataFreela')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="horaInicio" :value="__('Que horas o inicia o trabalho?')" />
                            <x-text-input id="horaInicio" class="w-full block mt-0" type="time" name="horaInicio"
                                value="{{$freela->horaInicio}}" required autocomplete="horaInicio" />
                            <x-input-error :messages="$errors->get('horaInicio')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="horaFinal" :value="__('Que horas o termina o trabalho?')" />
                            <x-text-input id="horaFinal" class="w-full block mt-0" type="time" name="horaFinal"
                                value="{{$freela->horaFinal}}" required autocomplete="horaFinal" />
                            <x-input-error :messages="$errors->get('horaFinal')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="cargo" :value="__('Que horas o termina o trabalho?')" />
                            <x-text-input id="cargo" class="w-full block mt-0" type="text" name="cargo"
                                value="{{$freela->cargo}}" required autocomplete="cargo" disabled />
                            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="observacao" :value="__('Alguma Observação?')" />
                            <textarea
                                class="w-full block font-medium text-sm text-gray-700 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                name="observacao" id="observacao"
                                placeholder="EX: Disponibilizamos uniforme.">{{$freela->observacao}}</textarea>
                            <x-input-error :messages="$errors->get('observacao')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="valorFreela" :value="__('Qual o valor do freela?')" />
                            <x-text-input id="valorFreela" class="w-full block mt-1" type="text" name="valorFreela"
                                value="{{$freela->valorFreela}}" required autocomplete="valorFreela" />
                            <x-input-error :messages="$errors->get('valorFreela')" class="mt-2" />
                        </div>

                        <div class="mt-4 flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

                            @if (session('status') === 'freelaUpdated')
                            <p x-data="{ show: true }" x-show="show" x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Informação atualizada.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
