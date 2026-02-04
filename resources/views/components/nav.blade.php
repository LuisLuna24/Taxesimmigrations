@php
    $pathname = '/' . request()->path();
    if ($pathname === '//') {
        $pathname = '/';
    }

    $currentLang = str_starts_with(request()->path(), 'en') ? 'en' : 'es';

    $t = [
        'home' => $currentLang === 'en' ? 'Home' : 'Inicio',
        'services' => $currentLang === 'en' ? 'Services' : 'Servicios',
        'values' => $currentLang === 'en' ? 'Values' : 'Valores',
        'policies' => $currentLang === 'en' ? 'Policies' : 'Políticas',
        'reviews' => $currentLang === 'en' ? 'Testimonials' : 'Testimonios',
        'contact' => $currentLang === 'en' ? 'Contact' : 'Contacto',
        'login' => $currentLang === 'en' ? 'Log In' : 'Iniciar Sesión',
        'register' => $currentLang === 'en' ? 'Sign Up' : 'Registrarse',
        'logout' => $currentLang === 'en' ? 'Log Out' : 'Cerrar Sesión',
        'dashboard' => $currentLang === 'en' ? 'Dashboard' : 'Panel',
    ];

    $routes = [
        ['name' => $t['home'], 'url' => $currentLang === 'en' ? '/en' : '/'],
        ['name' => $t['services'], 'url' => $currentLang === 'en' ? '/en/services' : '/services'],
        ['name' => $t['values'], 'url' => $currentLang === 'en' ? '/en/values' : '/values'],
        ['name' => $t['policies'], 'url' => $currentLang === 'en' ? '/en/policies' : '/policies'],
        ['name' => $t['reviews'], 'url' => $currentLang === 'en' ? '/en/reviews' : '/reviews'],
        ['name' => $t['contact'], 'url' => $currentLang === 'en' ? '/en/contact' : '/contact'],
    ];
@endphp

<nav x-data="{
    mobileMenuIsOpen: false,
    langMenuOpen: false,
    userMenuOpen: false,
    switchLanguage(targetLang) {
        const currentPath = window.location.pathname;
        if (targetLang === 'en' && !currentPath.startsWith('/en')) {
            window.location.href = '/en' + (currentPath === '/' ? '' : currentPath);
        } else if (targetLang === 'es' && currentPath.startsWith('/en')) {
            const newPath = currentPath.replace('/en', '') || '/';
            window.location.href = newPath;
        }
    }
}" x-on:click.away="mobileMenuIsOpen = false; langMenuOpen = false; userMenuOpen = false"
    class="sticky top-0 z-50 w-full border-b border-gray-100 bg-white/80 backdrop-blur-xl">

    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ $currentLang === 'en' ? '/en' : '/' }}" class="group relative z-50">
                    <img src="{{ asset('img/Locho M.webp') }}" alt="logo"
                        class="h-10 transition-transform duration-300 group-hover:scale-105" />
                </a>
            </div>

            <div class="hidden xl:flex items-center justify-center flex-1">
                <ul class="flex items-center gap-1">
                    @foreach ($routes as $item)
                        @php
                            $isActive =
                                $item['url'] === '/' || $item['url'] === '/en'
                                    ? $pathname === $item['url']
                                    : str_starts_with($pathname, $item['url']);
                        @endphp
                        <li>
                            <a href="{{ $item['url'] }}" @class([
                                'px-4 py-2 text-[13px] uppercase tracking-wider font-semibold transition-all duration-300 rounded-full',
                                'text-rojo-800 bg-primary-800/5' => $isActive,
                                'text-neutral-500 hover:text-primary-800 hover:bg-gray-50' => !$isActive,
                            ])>
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="hidden xl:flex items-center justify-end gap-3 flex-shrink-0">

                <div class="relative">
                    <button @click="langMenuOpen = !langMenuOpen"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-bold text-neutral-700 hover:bg-gray-50 transition-colors">
                        <span>{{ strtoupper($currentLang) }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="size-3" :class="langMenuOpen ? 'rotate-180' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </button>
                    <div x-cloak x-show="langMenuOpen"
                        class="absolute right-0 mt-2 w-32 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                        <button @click="switchLanguage('es')"
                            class="w-full text-left px-4 py-2 text-sm hover:bg-gray-50">Español</button>
                        <button @click="switchLanguage('en')"
                            class="w-full text-left px-4 py-2 text-sm hover:bg-gray-50">English</button>
                    </div>
                </div>

                @if (Auth::check())
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold px-3 py-1 bg-gray-100 rounded-full text-neutral-600">
                            @if (in_array(Auth::user()->role_id, [1, 2]))
                                {{ $currentLang === 'en' ? 'Staff' : 'Empleado' }}
                            @else
                                {{ $currentLang === 'en' ? 'Client' : 'Cliente' }}
                            @endif
                        </span>

                        <div class="relative">
                            <button @click="userMenuOpen = !userMenuOpen"
                                class="flex items-center gap-2 p-1 pr-3 rounded-full bg-primary-800/5 hover:bg-primary-800/10 transition-colors">
                                <div
                                    class="size-8 rounded-full bg-primary-800 text-white flex items-center justify-center text-xs">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-bold text-primary-800">{{ Auth::user()->name }}</span>
                            </button>

                            <div x-cloak x-show="userMenuOpen"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                                @if (in_array(Auth::user()->type_user_id, [1, 2]))
                                    {{-- Solo para Empleados/Admin --}}
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-neutral-700 hover:bg-gray-50">
                                        {{ $t['dashboard'] }}
                                    </a>
                                @elseif (Auth::user()->type_user_id == 3)
                                    {{-- Solo para Clientes --}}
                                    <a href="{{ route('client.appointments.index') }}"
                                        class="block px-4 py-2 text-sm text-neutral-700 hover:bg-gray-50">
                                        {{ __('my appointments') }}
                                    </a>
                                @endif
                                <hr class="my-1 border-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">{{ $t['logout'] }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!--a href="{{ route('login') }}"
                        class="text-sm font-bold text-neutral-600 hover:text-primary-800 px-3">{{ $t['login'] }}</-a>
                    <a-- href="{{ route('register') }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-primary-800 rounded-full hover:bg-primary-900 transition-all shadow-md active:scale-95">
                        {{ $t['register'] }}
                    </a-->
                @endif
            </div>

            <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen"
                class="xl:hidden p-2.5 rounded-xl bg-gray-50 text-neutral-600">
                <svg x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-cloak x-show="mobileMenuIsOpen" x-transition class="xl:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-6 space-y-2">
            @foreach ($routes as $item)
                <a href="{{ $item['url'] }}"
                    class="block px-4 py-3 rounded-xl text-base font-semibold text-neutral-600 hover:bg-gray-50">
                    {{ $item['name'] }}
                </a>
            @endforeach

            <div class="pt-4 mt-4 border-t border-gray-100 flex flex-col gap-3">
                @if (Auth::check())
                    <div class="px-4 py-2 bg-gray-50 rounded-lg">
                        <p class="text-xs text-neutral-500">
                            {{ in_array(Auth::user()->type_user_id, [1, 2]) ? 'Admin' : 'Client' }}</p>
                        <p class="font-bold text-primary-800">{{ Auth::user()->name }}</p>
                    </div>
                    <a href="{{ route('admin.dashboard') }}"
                        class="w-full py-3 bg-primary-800 text-white rounded-xl text-center font-bold">{{ $t['dashboard'] }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full py-3 text-red-600 font-bold">{{ $t['logout'] }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="w-full py-3 text-center font-bold text-neutral-600 border border-gray-200 rounded-xl">{{ $t['login'] }}</a>
                    <a href="{{ route('register') }}"
                        class="w-full py-3 bg-primary-800 text-white rounded-xl text-center font-bold">{{ $t['register'] }}</a>
                @endif
            </div>
        </div>
    </div>
</nav>
