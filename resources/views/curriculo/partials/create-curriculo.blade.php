<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Curriculo') }}
        </h2>
    </x-slot>

    <form action="{{ route('curriculo.store') }}" method="POST">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                    @livewire('curriculo.about-me')
                    @livewire('curriculo.experience')

 <input type="submit" value="teste">
            </div>

        </div>
    </form>

</x-app-layout>
