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

            @foreach ($user->aboutMe->skills as $skill)
                <div class="my-5">
                    {{$skill}};
                </div>
            @endforeach
            <x-input-label for="aboutMe" :value="__('Atualize aqui suas skills')" />

            <div>
                <x-checkbox id="skills" name="skills[]" type="checkbox" value="Pontualidade" />
        <label for="skills">Pontualidade</label>

        <x-checkbox id="skills" name="skills[]" type="checkbox" value="Comunicação eficaz" />
        <label for="skills" name="skills[]">Comunicação eficaz</label>

        <x-checkbox id="skills" name="skills[]" type="checkbox" value="Organização" />
        <label for="skills" name="skills[]" value="test">Organização</label>

        <x-checkbox id="skills" name="skills[]" type="checkbox" value="Trabalho em equipe" />
        <label for="skills" name="skills[]" value="test">Trabalho em equipe</label>

        <x-checkbox id="skills" name="skills[]" type="checkbox" value="Habilidades de gestão" />
        <label for="skills" name="skills[]" value="test">Habilidades de gestão</label>
            </div>

            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">Atualizar</x-primary-button>
    </form>
</section>
