<section>
    <form action="{{ route('company.update') }}" method="post">
        @csrf
        @method('patch')

        <header class="mt-4">
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Atualize os dados da empresa.') }}
            </p>

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Dados da Empresa
            </h2>
        </header>

        <div class="space-x-4 grid grid-cols-2">

            <div class="mt-4">
                <x-input-label for="companyName" :value="__('Nome da Empresa')" />
                <x-text-input id="companyName" name="companyName" type="text" class="w-full block mt-0"
                    :value="old('companyName', $company->companyName)" required autofocus autocomplete="companyName" />
                <x-input-error :messages="$errors->get('companyName')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="cnpj" :value="__('CNPJ')" />
                <x-text-input id="cnpj" class="w-full block" type="text" name="cnpj"
                    :value="old('cnpj', $company->cnpj)" required autocomplete="cnpj" />
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>
        </div>

        <div class="space-x-4 grid grid-cols-2">
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email da Empresa')" />
                <x-text-input id="email" class="w-full block mt-1" type="text" name="email"
                    :value="old('email', $company->email)" required autocomplete="email"
                    placeholder="exemplo@exemplo.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="contact" :value="__('Telefone')" />
                <x-text-input id="contact" class="w-full block mt-1" type="text" name="contact"
                    :value="old('contact', $company->contact)" required autocomplete="contact"
                    placeholder="(99)999999999" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button class="mt-4">{{ __('Atualizar') }}</x-primary-button>

            @if (session('status') === 'company-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Informação atualizada.') }}</p>
            @endif
        </div>
    </form>
</section>