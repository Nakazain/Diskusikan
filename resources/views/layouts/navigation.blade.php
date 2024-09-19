<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 w-full lg:px-8 fixed dark:bg-gray-800 z-50 backdrop-blur" >
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                @guest
                    <a href="/" class="text-white">
                        <img src="/img/logo.png" width="50px">
                    </a>
                    @else
                    <div class="shrink-0 flex items-center">
                        <a href="{{ App\Models\User::find(Auth::id())->usertype == "admin" ? route('admin.dashboard') : route('dashboard') }}" class="text-white">
                            <img src="/img/logo.png" width="50px">
                        </a>
                    </div>
                    @endguest
                </div>

                <!-- Navigation Links -->
                @guest
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="/" :active="request()->routeIs('welcome')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="/diskusi" :active="request()->routeIs('diskusi','postingan')">
                        {{ __('Diskusi') }}
                    </x-nav-link>
                </div>
            @else
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                <x-nav-link href="/" :active="request()->routeIs('welcome')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route(App\Models\User::find(Auth::id())->usertype == 'admin' ? 'admin.dashboard' : 'dashboard')" :active="request()->routeIs('admin.dashboard','dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                {{-- Navbar Admin --}}
                @if (App\Models\User::find(Auth::id())->usertype == 'admin')
                <x-nav-link href="/admin/diskusi" :active="request()->routeIs('admin.diskusi')">
                    {{ __('Kelola Diskusi') }}
                </x-nav-link>
                <x-nav-link href="/admin/pengguna" :active="request()->routeIs('admin.pengguna')">
                    {{ __('Pengguna') }}
                </x-nav-link>
                <x-nav-link href="/admin/masalah" :active="request()->routeIs('admin.masalah')">
                    {{ __('Masalah Pengguna') }}
                </x-nav-link>
                @endif

                {{-- Navbar Pengguna --}}
                @if (Auth::user()->usertype == 'user')
                <x-nav-link href="/diskusi" :active="request()->routeIs('diskusi','postingan')">
                    {{ __('Diskusi') }}
                </x-nav-link>
                <x-nav-link href="/masalah" :active="request()->routeIs('masalah','masalah')">
                    {{ __('Ada masalah') }}
                </x-nav-link>
                @endif
            </div>
            @endguest
        </div>
            
            <!-- Settings Dropdown -->
            @guest
                <div class="flex items-center space-x-4 ml-auto justify-end">
                    <x-nav-link href="/login" :active="request()->routeIs('login')">
                        Log In
                    </x-nav-link>
                    <x-nav-link href="/register" :active="request()->routeIs('register')">
                        Register
                    </x-nav-link>
                
            @else
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                                
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endguest
        </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @guest
        
        @else
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route(Auth::user()->usertype == 'admin' ? 'admin.dashboard' : 'dashboard')" :active="request()->routeIs('admin.dashboard','dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            {{-- Admin Navbar Reponsif --}}
            @if (Auth::user()->usertype == 'admin')
            <x-responsive-nav-link href="/admin/diskusi" :active="request()->routeIs('diskusi')">
                {{ __('Diskusi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/admin/diskusi" :active="request()->routeIs('diskusi')">
                {{ __('Pengguna') }}
            </x-responsive-nav-link>

            @endif

            {{-- Pengguna Navbar Reponsif --}}
            @if (Auth::user()->usertype == 'user')
            <x-responsive-nav-link href="/diskusi" :active="request()->routeIs('diskusi','postingan')">
                {{ __('Diskusi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/diskusi" :active="request()->routeIs('masalah')">
                {{ __('Ada Masalah') }}
            </x-responsive-nav-link>

            @endif
        </div>
        
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endguest
    </div>
</nav>
