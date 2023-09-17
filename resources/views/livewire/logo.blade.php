<div>
    @php
    $user = Auth::user();
    if ($user->company) {
         $company = $user->company->where('user_id', Auth::id())->first();
    }
    @endphp



    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800  sm:rounded-lg">

        <form action="{{ route('company.update') }}"


            @if(!empty($company->image->image))

            wire:submit.prevent='updateLogo'

            @else(!empty($user->image->image))
            wire:submit.prevent='storageLogo'

            @endif

            >
            @method('patch')
            @csrf

            @if (empty($company->image->image))


            <div class="flex items-center justify-center w-full">
                <label for="logo"
                    class="flex flex-col items-center justify-center w-40 h-40 rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700  dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        @if (!empty($logo))

                        <img class="w-40 h-40 mb-3 text-gray-400 rounded-full" src="{{$logo->temporaryUrl()}}" alt="">

                        @else

                        <img class="w-40 h-40 mb-3 text-gray-400 rounded-full" src="/assets/img/no-logo.jpg">

                        @endif

                    </div>
                    <input id="logo" name="logo" type="file" class="hidden" wire:model='logo' />
                </label>
            </div>

            @else
            <div class="flex items-center justify-center w-full">
                <label for="logo"
                    class="flex flex-col items-center justify-center w-48 h-48 rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700  dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">


                        @if (!empty($logo))

                        <img class="w-48 h-48 mb-3 text-gray-400 rounded-full border border-gray-300 border-dashed"
                            src="{{$logo->temporaryUrl()}}" alt="">

                        @else

                        <img class="w-48 h-48 mb-3 text-gray-400 rounded-full" src="{{ url("storage/{$company->image->image}") }}">

                        @endif


                    </div>
                    <input id="logo" name="logo" type="file" class="hidden" wire:model='logo' />
                </label>
            </div>
            @endif

            <div class="flex items-center gap-4">

                @if (empty($company->image->image))
                <x-primary-button class="m-4" wire:submit.prevent='storageLogo'>{{ __('Incluir Logo') }}
                </x-primary-button>

                @else
                <x-primary-button class="m-4" wire:submit.prevent='storageLogo'>{{ __('Trocar Logo') }}
                </x-primary-button>

                @endif

            </div>

            @if (session('status') === 'logo-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Informação atualizada.') }}</p>
            @endif

        </form>


    </div>


</div>
