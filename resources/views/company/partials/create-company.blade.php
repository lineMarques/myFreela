<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Empresa') }}
        </h2>
    </x-slot>

    <form action="{{ route('company.store') }}" method="post">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                @livewire('company')
                @livewire('cep')

                <x-primary-button class="mt-4">Cadastrar Empresa</x-primary-button>
            </div>
        </div>
    </form>


</x-app-layout>
