<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <header class="mt-4">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Dados Pessoais
        </h2>
    </header>


    <div class="grid grid-cols-3 ">


        <div class="mt-4 col-span-2">
            <x-input-label for="name" :value="__('Nome Completo')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required
                autofocus autocomplete="name" />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

    </div>

    <div class="mt-4">
        <x-input-label for="cpf" :value="__('CPF')" />
        <x-text-input id="cpf" class="block mt-1" type="text" name="cpf" :value="old('cpf')" required
            autocomplete="cpf" />
        <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="age" :value="__('Idade')" />
        <x-text-input id="age" class="block mt-1" type="text" name="age" :value="old('age')" required
            autocomplete="age" />
        <x-input-error :messages="$errors->get('age')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="sexo" :value="__('Sexo')" />

        <input
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            id="sexo" name="sexo" type="radio" @checked(old('sexo')=='feminino' ) value="feminino" />
        <label for="sexo">Feminino</label>
        <br>
        <input
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            id="sexo" name="sexo" type="radio" @checked(old('sexo')=='masculino' ) value="masculino" />
        <label for="sexo" name="sexo">Masculino</label>
        <br>
        <input
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            id="sexo" name="sexo" type="radio" @checked(old('sexo')=='naoDefinido' ) value="naoDefinido" />
        <label for="sexo" name="sexo">Não Definido</label>
        <br>
        <input
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            id="sexo" name="sexo" type="radio" @checked(old('sexo')=='naoPreencher' ) value="naoPreencher" />
        <label for="sexo" name="sexo">Não quero preencher</label>
        <x-input-error :messages="$errors->get('sexo')" checked class="mt-2" />

    </div>

   {{--  <div class="mt-4">
        <x-input-label for="pcd" :value="__('Possui Deficiência?')" />
        <input
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            id="pcd" name="pcd" type="radio" value="sim" @checked(old('pcd')=='sim' ) />
        <label for="pcd">Sim</label>
        <br>
        <input
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            id="pcd" name="pcd" type="radio" value="nao" @checked(old('pcd')=='nao' ) />
        <label for="pcd" name="pcd">Não</label>
        <x-input-error :messages="$errors->get('pcd')" class="mt-2" />
    </div> --}}

</div>
