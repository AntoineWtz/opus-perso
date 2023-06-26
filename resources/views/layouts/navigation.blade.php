<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="bg-yellow-300 overflow-hidden">
        <!-- Logo -->
        <div class="shrink-0 items-center px-4 py-2">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('asset/opus-logo.png') }}" alt="logo Opus" class="w-full h-auto">
            </a>
        </div>

        <div class="flex flex-col w-1/5 h-screen ">
            
            <div class="flex flex-col">

                <!-- Navigation Links -->
                <div class="flex flex-col px-4 py-2">
                    <a href="{{ route('dashboard') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('dashboard') ? 'text-blue-500' : '' }}">{{ __('Dashboard') }}</a>
                    <a href="{{ route('GestionEvenement.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionEvenement.index') ? 'text-blue-500' : '' }}">{{ __('Evenement') }}</a>
                    <a href="{{ route('GestionPublication.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionPublication.index') ? 'text-blue-500' : '' }}">{{ __('Publication') }}</a>
                    <a href="{{ route('GestionUser.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionUser.index') ? 'text-blue-500' : '' }}">{{ __('Utilisateur') }}</a>

                    <!-- Menu Burger -->
                    <hr class="m-2">
                    <div class="relative w-full">
                        <details class="menu-link mb-8">
                            <summary class="hover:opacity-75 cursor-pointer">Autre</summary>
                            <div class="flex flex-col whitespace-nowrap">
                            <a href="{{ route('GestionArtiste.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionArtiste.index') ? 'text-blue-500' : '' }}">{{ __('Artiste') }}</a>
                            <a href="{{ route('GestionGalerie.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionGalerie.index') ? 'text-blue-500' : '' }}">{{ __('Galeries') }}</a>
                            <a href="{{ route('GestionGenreMusicaux.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionGenreMusicaux.index') ? 'text-blue-500' : '' }}">{{ __('Genres Musicaux') }}</a>
                            <a href="{{ route('GestionInfoAffichage.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionInfoAffichage.index') ? 'text-blue-500' : '' }}">{{ __('Info Affichage') }}</a>
                            <a href="{{ route('GestionLieux.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionLieux.index') ? 'text-blue-500' : '' }}">{{ __('Lieux') }}</a>
                            <a href="{{ route('GestionMedia.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionMedia.index') ? 'text-blue-500' : '' }}">{{ __('Media') }}</a>
                            <a href="{{ route('GestionMotifContact.index') }}" class="m-1 hover:opacity-75 menu-link {{ request()->routeIs('GestionMotifContact.index') ? 'text-blue-500' : '' }}">{{ __('Motif Contact') }}</a>   
                            <a href="{{ route('GestionPageStatique.index') }}" class="m-1 hover:opacity-75 menu-link{{ request()->routeIs('GestionPageStatique.index') ? 'text-blue-500' : '' }}">{{ __('Page Statique') }}</a>
                            <a href="{{ route('GestionParametrageRS.index') }}" class="m-1 hover:opacity-75 menu-link{{ request()->routeIs('GestionParametrageRS.index') ? 'text-blue-500' : '' }}">{{ __('Parametrage RS') }}</a>
                            <a href="{{ route('GestionTypeEvenement.index') }}" class="m-1 hover:opacity-75 menu-link  {{ request()->routeIs('GestionTypeEvenement.index') ? 'text-blue-500' : '' }}">{{ __('Type Evenement') }}</a>
                            <a href="{{ route('GestionTypeMedia.index') }}" class="m-1 hover:opacity-75 menu-link  {{ request()->routeIs('GestionTypeMedia.index') ? 'text-blue-500' : '' }}">{{ __('Type Media') }}</a>
                            <a href="{{ route('GestionTypePublication.index') }}" class="m-1 hover:opacity-75 menu-link  {{ request()->routeIs('GestionTypePublication.index') ? 'text-blue-500' : '' }}">{{ __('Type Publication') }}</a>
                            </div>
                        </details>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="relative">
                    <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="ml-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 py-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">{{ __('Log Out') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3">
            <a href="{{ route('dashboard') }}" :class="{ 'text-blue-500': request()->routeIs('dashboard') }">{{ __('Dashboard') }}</a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="absolute bottom-0 left-0">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">{{ __('Log Out') }}</button>
                </form>
            </div>
        </div>
    </div>
</nav>