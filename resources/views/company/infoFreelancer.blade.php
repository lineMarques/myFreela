<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Informações do Freelancer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class=" flex p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                     <img class="w-20 h-20 mb-3 text-gray-400 rounded-full m-3" src="/assets/img/no-photo.png"
                    alt="{{$freelancer->userName}}">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __($freelancer->name) }}
                    </h2>
                        {{$freelancer->contact}} <br>
                        {{$freelancer->experiences->jobTitle}} <br><br><br>

                        <label class="font-semibold">O que {{$freelancer->userName}} diz sobre ele: </label>
                        {{$freelancer->aboutMe->aboutMe}} <br><br><br>

                        <label class="font-semibold">Trabalhou na empresa: </label>
                        {{$freelancer->experiences->company}} <br>

                        <label class="font-semibold">Grau de experiência: </label>
                        {{$freelancer->experiences->xp}} <br>

                        <label class="font-semibold">Atribuições: </label>
                        {{$freelancer->experiences->assignments}} <br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
