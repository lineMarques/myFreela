<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @if (Auth::user()->typeUser == 'gerente')

                       @livewire('freela.freela-show')

                    @else

                        {{ __("Acompanhe as suas mérticas") }}

                        {{$i=4}}

                        <div class="gap-8 sm:grid sm:grid-cols-2 mb-5 mt-4">
                            <div>
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Pontualidade</dt>
                                    <dd class="flex items-center mb-3">
                                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width:{{$i}}%">
                                            </div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$i}}</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Comprometimento</dt>
                                    <dd class="flex items-center mb-3">
                                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{$i}}%">
                                            </div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$i}}</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Trabalho em equipe</dt>
                                    <dd class="flex items-center mb-3">
                                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{$i}}%">
                                            </div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$i}}</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Habilidade Técnica</dt>
                                    <dd class="flex items-center">
                                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{$i}}%">
                                            </div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$i}}</span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
