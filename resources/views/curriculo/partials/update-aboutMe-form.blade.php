<section>

    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Atualize suas habilidades.') }}
        </p>
    </header>

    <form action="{{ route('curriculo.update') }}" method="post">
        @csrf
        @method('patch')

        <div class="mt-4">
            <x-input-label for="aboutMe" :value="__('Fale sobre Você')" />
            <textarea
                class="w-full block font-medium text-sm text-gray-700 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                name="aboutMe" id="aboutMe">{{$user->aboutMe->aboutMe}}</textarea>
                <x-input-error :messages="$errors->get('aboutMe')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="aboutMe" :value="__('Marque aqui de 3  a 5 qualificações.')" />
            <x-checkbox id="skills" name="skills[]" type="checkbox" value="1"/>
            <label for="skills">skills</label>

            <x-checkbox id="skills" name="skills[]" type="checkbox" value="2"/>
            <label for="skills" name="skills[]">skills2</label>

            <x-checkbox id="skills" name="skills[]" type="checkbox" value="3"/>
            <label for="skills" name="skills[]" value="test">skills3</label>

            <x-checkbox id="skills" name="skills[]" type="checkbox" value="4"/>
            <label for="skills" name="skills[]" value="test">skills4</label>

            <x-checkbox id="skills" name="skills[]" type="checkbox" value="5"/>
            <label for="skills" name="skills[]" value="test">skills5</label>
            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">Atualizar</x-primary-button>
    </form>
</section>
