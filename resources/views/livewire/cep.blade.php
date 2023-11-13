<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

    <header class="mt-4">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Endereço
        </h2>
    </header>

    <div class="space-x-4 grid grid-cols-4">
        <div class="mt-4">
            <x-input-label for="cep" :value="__('Cep')" />
            <x-text-input id="cep" name="cep" wire:model.lazy='cep' class="w-full block mt-0" type="text" required
                autocomplete="cep" />
            @if(session()->has('message'))
            <div class='text-red-500 mt-2"'>
                {{session('message')}}
                <span class="text-red-500 mt-2">{{session(' message')}}</span>
            </div>
            @endif
            @error('cep')
            <span class="text-red-500 mt-2">{{$message}}</span>
            @enderror
        </div>
        <div class="mt-4">
            <x-input-label for="number" :value="__('Numero')" />
            <x-text-input id="number" name="number" class="w-full block mt-1" type="text" :value="old('number')"
                required autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>
    </div>

    <div class="space-x-4 grid grid-cols-4">
        <div class="mt-4">
            <x-input-label for="road" :value="__('Rua')" />
            <x-text-input id="road" name="road" wire:model='road' class="w-full block mt-1" type="text" required
                autocomplete="road" desactivateTab readonly />
            @error('road')
            <span class="text-red-500 mt-2">{{$message}}</span>
            @enderror
        </div>
        <div class="mt-4">
            <x-input-label for="neighborhood" :value="__('Bairro')" />
            <x-text-input id="neighborhood" name="neighborhood" wire:model='neighborhood' class="w-full block mt-1"
                type="text" required autocomplete="neighborhood" readonly />
            @error('neighborhood')
            <span class="text-red-500 mt-2">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="space-x-4 grid grid-cols-4">

        <div class="mt-4">
            <x-input-label for="city" :value="__('Cidade')" />
            <x-text-input id="city" name="city" wire:model='city' class="w-full block mt-1" type="text" required
                autocomplete="city" readonly />
            @error('city')
            <span class="text-red-500 mt-2">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-4">
            <x-input-label for="state" :value="__('Estado')" />
            <x-text-input id="state" name="state" wire:model='state' class="w-full block mt-1" type="text" required
                autocomplete="state" readonly />
            @error('state')
            <span class="text-red-500 mt-2">{{$message}}</span>
            @enderror
        </div>
    </div>
  

</div>
