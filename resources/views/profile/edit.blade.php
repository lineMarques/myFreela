<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="flex p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                
                    @livewire('image')
                            

                <div class="p-6 ml-10n max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <header class="mt-4">

                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Cadastre suas qualificações, experiências e áreas de interesse.') }}
                    </p>
                </header>

                @if ($user->personalData)
                <h2 class="text-lg font-medium text-red-900 dark:text-gray-100">
                    Você já cadastrou seu currículo.
                </h2>

                @else
                <a href="{{ route('curriculo.create')}}">
                    <x-primary-button class="mt-4">Cadastrar</x-primary-button>
                </a>
                @endif

            </div>




            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>