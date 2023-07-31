<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header class="mt-4">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Cadastre as informações da empresa
            </h2>
        </header>

        <div class="space-x-4 grid grid-cols-2">

            <div class="mt-4">
                <x-input-label for="companyName" :value="__('Nome da Empresa')" />
                <x-text-input id="companyName" name="companyName" type="text" class="w-full block mt-0"
                    :value="old('companyName')" required autofocus autocomplete="companyName" />
                <x-input-error :messages="$errors->get('companyName')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="cnpj" :value="__('CNPJ')" />
                <x-text-input id="cnpj" class="w-1/2 block mt-0" type="text" name="cnpj" :value="old('cnpj')" required
                    autocomplete="cnpj" />
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>
        </div>

        <div class="space-x-4 grid grid-cols-4">
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email da Empresa')" />
                <x-text-input id="email" class="w-full block mt-1" type="text" name="email"
                    :value="old('email')" required autocomplete="email"
                    placeholder="exemplo@exemplo.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="contact" :value="__('Telefone')" />
                <x-text-input id="contact" class="w-full block mt-1" type="text" name="contact"
                    :value="old('contact')" required autocomplete="contact" placeholder="(99)999999999" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>
        </div>
</div>