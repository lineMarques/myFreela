<section>
    <header class="mt-4">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Dados Pessoais
        </h2>
    </header>

    @if (empty($user->image->image))
    <img class="w-20 h-20 mb-3 text-gray-400 rounded-full m-3" src="/assets/img/no-photo.png"
        alt="{{$user->userName}}">
    @else
    <img class="w-20 h-20 mb-3 text-gray-400 rounded-full m-3" src="{{ url("storage/{$user->image->image}") }}"
    alt="{{$user->userName}}">
    @endif

    <div class="mt-4">
        <x-input-label for="name" :value="__('Nome Completo')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
            :value="old('name', $user->personalData->name)" required autofocus autocomplete="name" disabled />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="cpf" :value="__('CPF')" />
        <x-text-input id="cpf" class="block mt-1" type="text" name="cpf" :value="old('cpf',$user->personalData->cpf)"
            required autocomplete="cpf" disabled />
        <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="age" :value="__('Idade')" />
        <x-text-input id="age" class="block mt-1" type="text" name="age" :value="old('age', $user->personalData->age)"
            required autocomplete="age" />
        <x-input-error :messages="$errors->get('age')" class="mt-2" />
    </div>


</section>
