<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

    <div class="mt-4">
        <x-input-label for="aboutMe" :value="__('Fale sobre Você')" />
        <textarea
            class="w-full block font-medium text-sm text-gray-700 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            name="aboutMe" id="aboutMe">{{old('aboutMe')}}</textarea>
        <x-input-error :messages="$errors->get('aboutMe')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="skills" :value="__('Marque aqui de 3 a 5 qualificações.')" />
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
        <x-input-error :messages="$errors->get('skills')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="schooling" :value="__('Escolaridade')" />
        <x-select name="schooling" id="schooling">
            <option value="fi" {{old('schooling')==='fi' ? 'selected' : '' }}>Fundamental incompleto
            </option>
            <option value="fc" {{old('schooling')==='fc' ? 'selected' : '' }}>Fundamental completo
            </option>
            <option value="emi" {{old('schooling')==='emi' ? 'selected' : '' }}>Ensino Médio incompleto
            </option>
            <option value="emc" {{old('schooling')==='emc' ? 'selected' : '' }}>Ensino Médio Completo
            </option>
            <option value="sec" {{old('schooling')==='sec' ? 'selected' : '' }}>Superior em Curso
            </option>
            <option value="sc" {{old('schooling')==='sc' ? 'selected' : '' }}>Superior Completo</option>
        </x-select>
        <x-input-error :messages="$errors->get('schooling')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="institution" :value="__('Instituição de Ensino')" />

        <x-text-input id="institution" name="institution" class="block mt-1" type="text" autocomplete="institution"
            wire:model="query" />

        @if (empty($query))
            <span></span>
        @else
            @foreach ($institutions as $institution)
                <div class="bg-slate-100 rounded-t">
                    <span >{{$institution['nome_da_ies']}}</span><br>
                </div>

            @endforeach
        @endif

        <x-input-error :messages="$errors->get('institution')" class="mt-2" />
    </div>

</div>
