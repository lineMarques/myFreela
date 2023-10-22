<x-app-layout>
    <section>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Avaliação') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class=" flex p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form action="{{route('stars.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <p class="mt-1 text-2xl text-gray-600 dark:text-gray-400">
                                Nos ajude a escolher os melhores freelas para você. Como {{$inviteUser}} se saiu?
                            </p>

                            <div class="mt-5">
                                <p class="text-lg text-gray-600 dark:text-gray-400">Qual avaliação do seu freela?</p>
                                @livewire('star-rating')
                            </div>

                            <input type="text" value="{{$inviteUser->user}}"hidden>
                            <a href="{{route('dashboard')}}">
                                <x-primary-button class="mt-4">{{ __('Enviar') }}</x-primary-button>
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
