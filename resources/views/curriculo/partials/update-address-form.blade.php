<section>
    <form action="{{ route('curriculo.update') }}" method="post">
        @csrf
        @method('patch')

        <header class="mt-4">
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Atualize seu endereço.') }}
            </p>

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Endereço
            </h2>
        </header>


        <div class="mt-4">
            <x-input-label for="cep" :value="__('Cep')" />
            <x-text-input id="cep" class="w-1/4 block mt-0" type="text" name="cep" :value="old('cep', $user->cep)" required
                autocomplete="cep" />
            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
        </div>

        <div class="space-x-4 grid grid-cols-2">
            <div class="mt-4">
                <x-input-label for="road" :value="__('Rua')" />
                <x-text-input id="road" class="w-full block mt-1" type="text" name="road" :value="old('road', $user->road)"
                    required autocomplete="road" />
                <x-input-error :messages="$errors->get('road')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="number" :value="__('Numero')" />
                <x-text-input id="number" class="w-auto block mt-1" type="text" name="number " :value="old('number', $user->number)"
                    required autocomplete="number" />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>
        </div>

        <div class="space-x-4 grid grid-cols-2">
            <div class="mt-4">
                <x-input-label for="neighborhood" :value="__('Bairro')" />
                <x-text-input id="neighborhood" class="w-full block mt-1" type="text" name="neighborhood"
                    :value="old('neighborhood', $user->neighborhood)" required autocomplete="neighborhood" />
                <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="city" :value="__('Cidade')" />
                <x-text-input id="city" class="w-auto block mt-1" type="text" name="city" :value="old('city', $user ->city)"
                    required autocomplete="city" />
                <x-input-error :messages="$errors->get('cidacityde')" class="mt-2" />
            </div>
        </div>
        <x-primary-button class="mt-4">Atualizar</x-primary-button>
    </form>
</section>
