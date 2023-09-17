<section>
    <div>
        <form action="{{ route('curriculo.update') }}" method="post">
            @csrf
            @method('patch')

            <div class="mt-4">
                <x-input-label for="jobTitle" :value="__('Cargo')" />
                <x-select name="jobTitle" id="jobTitle">
                    <option value="semXP">Não tenho nenhuma experiência</option>
                    <option value="auxCozinha">Auxiliar de Cozinha</option>
                    <option value="chapeiro">Chapeiro</option>
                    <option value="cozinheiro">Cozinheiro</option>
                    <option value="lavacao">Lavação</option>
                    <option value="sushiman">Sushiman</option>
                    <option value="pizzaiolo">pizzaiolo</option>
                </x-select>
                <x-input-error :messages="$errors->get('jobTitle')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company" :value="__('Empresa')" />
                <x-text-input id="company" class="w-full block mt-1" type="text" name="company" :value="old('company')"
                    required autocomplete="company" />
                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="companyEmail" :value="__('Email da Empresa')" />
                <x-text-input id="companyEmail" class="w-full block mt-1" type="text" name="companyEmail"
                    :value="old('companyEmail')" required autocomplete="companyEmail" />
                <x-input-error :messages="$errors->get('companyEmail')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="companyContact" :value="__('Telefone')" />
                <x-text-input id="companyContact" class="w-full block mt-1" type="text" name="companyContact"
                    :value="old('companyContact')" required autocomplete="companyContact" />
                <x-input-error :messages="$errors->get('companyContact')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="xp" :value="__('Tempo de Experiência')" />
                <x-select name="xp" id="xp">
                    <option value="semXP">Meu primeiro emprego =)</option>
                    <option value="iniciante">menos de 1 ano</option>
                    <option value="experiente">1 ano a 2 anos</option>
                    <option value="expert">mais de 2 anos</option>
                </x-select>
                <x-input-error :messages="$errors->get('xp')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="assignments" :value="__('Fale sobre suas tarefas e atribuições')" />
                <textarea
                    class="w-full block font-medium text-sm text-gray-700 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    name="assignments" id="assignments"></textarea>
                <x-input-error :messages="$errors->get('assignments')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">Atualizar</x-primary-button>
        </form>
    </div>
</section>
