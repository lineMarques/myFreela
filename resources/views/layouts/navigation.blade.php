@php
$stars = avgUser();
@endphp
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if ( Auth::user()->typeUser == 'gerente')
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                    @else
                    <a href="{{ url('dashboard/freelancer') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                    @endif

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">


                    @if ( Auth::user()->typeUser == 'gerente')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('company.edit')" :active="request()->routeIs('company.edit')">
                        @if (!empty($user->company))
                        {{ __('Cadastrar Empresa') }}
                        @else
                        {{ __('Empresa') }}
                        @endif
                    </x-nav-link>

                    <x-nav-link :href="route('stars.show')" :active="request()->routeIs('stars.show')">
                        {{ __('Avaliações') }}
                    </x-nav-link>


                    <x-nav-link :href="route('curriculo.edit')" :active="request()->routeIs('curriculo.edit')">
                        {{ __('Meu Currículo') }}

                    </x-nav-link>

                    @else

                    <x-nav-link :href="route('dashboard.freelancer')"
                        :active="request()->routeIs('dashboard.freelancer')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('curriculo.edit')" :active="request()->routeIs('curriculo.edit')">
                        {{ __('Meu Currículo') }}
                    </x-nav-link>
                    @endif


                </div>
            </div>

            <div class="mt-4">
                <div>{{'Avaliações'}} {{round($stars->avg, 2)}}</div>

                <div class=" mt-8 stars flex flex-row-reverse justify-end">

                    <input class="hidden peer" type="radio"  value="5" disabled {{ ($stars->avg == 5)? "checked" : "" }}>
                    <label for="star1" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

                    <input class="hidden peer" type="radio" value="4" disabled {{ ($stars->avg < 5 ) && ($stars->avg >= 4 )? "checked" : "" }}>
                    <label for="star2" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

                    <input class="hidden peer" type="radio"   value="3" disabled {{ ($stars->avg < 4 ) && ($stars->avg >= 3 )? "checked" : "" }}>
                    <label for="star3" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

                    <input class="hidden peer" type="radio"   value="2" disabled {{ ($stars->avg < 3 ) && ($stars->avg >= 2 )? "checked" : "" }}>
                    <label for="star4" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

                    <input class="hidden peer" type="radio"  value="1" disabled {{ ($stars->avg < 2 ) && ($stars->avg >= 1 )? "checked" : "" }}>
                    <label for="star5" class="fas fa-star text-lg text-gray-300 peer-checked:text-yellow-500"></label>

                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @php
                $user = Auth::user();
                @endphp

                @if (empty($user->image->image))
                <img class="w-12 h-12 mb-3 text-gray-400 rounded-full m-3" src="/assets/img/no-photo.png"
                    alt="{{$user->userName}}">
                @else
                <img class="w-12 h-12 mb-3 text-gray-400 rounded-full m-3" src="{{ url("storage/{$user->image->image}")
                }}"
                alt="{{$user->userName}}">
                @endif


                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ $user->userName }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if ( Auth::user()->typeUser == 'gerente')
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @else
            <x-responsive-nav-link :href="route('dashboard.freelancer')"
                :active="request()->routeIs('dashboard.freelancer')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->userName }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('company.edit')" :active="request()->routeIs('company.edit')">

                    @if (empty($user->company))
                    {{ __('Cadastrar Empresa') }}
                    @else
                    {{ __('Empresa') }}
                    @endif

                    <x-responsive-nav-link :href="route('curriculo.edit')"
                        :active="request()->routeIs('curriculo.edit')">
                        {{ __('Meu Currículo') }}
                    </x-responsive-nav-link>

                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
