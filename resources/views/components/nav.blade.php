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
        'reviews' => $currentLang === 'en' ? 'Reviews' : 'Reseñas',
        'contact' => $currentLang === 'en' ? 'Contact' : 'Contacto',
    ];

    $routes = [
        ['name' => $t['home'], 'url' => $currentLang === 'en' ? '/en' : '/'],
        ['name' => $t['services'], 'url' => $currentLang === 'en' ? '/en/services' : '/services'],
        ['name' => $t['values'], 'url' => $currentLang === 'en' ? '/en/values' : '/values'],
        ['name' => $t['policies'], 'url' => $currentLang === 'en' ? '/en/policies' : '/policies'],
        ['name' => $t['reviews'], 'url' => $currentLang === 'en' ? '/en/reviews' : '/reviews'],

    ];
@endphp

<nav x-data="{
    mobileMenuIsOpen: false,
    langMenuOpen: false,
    switchLanguage(targetLang) {
        const currentPath = window.location.pathname;
        if (targetLang === 'en' && !currentPath.startsWith('/en')) {
            window.location.href = '/en' + (currentPath === '/' ? '' : currentPath);
        } else if (targetLang === 'es' && currentPath.startsWith('/en')) {
            const newPath = currentPath.replace('/en', '') || '/';
            window.location.href = newPath;
        }
    }
}" x-on:click.away="mobileMenuIsOpen = false; langMenuOpen = false"
    class="sticky top-0 z-50 w-full border-b border-gray-100 bg-white/80 backdrop-blur-xl">

    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ $currentLang === 'en' ? '/en' : '/' }}" class="group relative z-50">
                    <img src="{{ asset('img/locho M.webp') }}" alt="logo"
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

            <div class="hidden xl:flex items-center justify-end gap-4 flex-shrink-0">
                <div class="relative">
                    <button @click="langMenuOpen = !langMenuOpen"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-bold text-neutral-700 hover:bg-gray-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-neutral-400" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="2" y1="12" x2="22" y2="12" />
                            <path
                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                        </svg>
                        <span>{{ strtoupper($currentLang) }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="size-3 transition-transform"
                            :class="langMenuOpen ? 'rotate-180' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </button>

                    <div x-cloak x-show="langMenuOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        class="absolute right-0 mt-2 w-40 origin-top-right bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50">
                        <button @click="switchLanguage('es'); langMenuOpen = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center justify-between hover:bg-primary-800/5 {{ $currentLang === 'es' ? 'text-primary-800 font-bold' : 'text-neutral-600' }}">
                            Español @if ($currentLang === 'es')
                                <span class="text-xs">●</span>
                            @endif
                        </button>
                        <button @click="switchLanguage('en'); langMenuOpen = false"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center justify-between hover:bg-primary-800/5 {{ $currentLang === 'en' ? 'text-primary-800 font-bold' : 'text-neutral-600' }}">
                            English @if ($currentLang === 'en')
                                <span class="text-xs">●</span>
                            @endif
                        </button>
                    </div>
                </div>

                <a href="{{ $currentLang === 'en' ? '/en/contact' : '/contact' }}"
                    class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white bg-primary-800 rounded-full hover:bg-primary-900 transition-all shadow-md shadow-primary-800/20 active:scale-95">
                    {{ $t['contact'] }}
                </a>

                @if (Auth::check())
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex p-2 text-primary-800 hover:bg-primary-800/10 rounded-full transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        </svg>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                @endif
            </div>

            <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen"
                class="xl:hidden p-2.5 rounded-xl bg-gray-50 text-neutral-600 hover:text-primary-800 transition-all">
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

    <div x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
        class="xl:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-6 space-y-2">
            @foreach ($routes as $item)
                <a href="{{ $item['url'] }}"
                    class="block px-4 py-3 rounded-xl text-base font-semibold transition-colors {{ $isActive ? 'bg-primary-800/10 text-primary-800' : 'text-neutral-600 hover:bg-gray-50' }}">
                    {{ $item['name'] }}
                </a>
            @endforeach
            <div class="pt-4 mt-4 border-t border-gray-100 flex flex-col gap-3">
                <div class="flex gap-2 p-1 bg-gray-100 rounded-lg">
                    <button @click="switchLanguage('es')"
                        class="flex-1 py-2 rounded-md text-sm font-bold transition-all {{ $currentLang === 'es' ? 'bg-white shadow-sm text-primary-800' : 'text-neutral-500' }}">ES</button>
                    <button @click="switchLanguage('en')"
                        class="flex-1 py-2 rounded-md text-sm font-bold transition-all {{ $currentLang === 'en' ? 'bg-white shadow-sm text-primary-800' : 'text-neutral-500' }}">EN</button>
                </div>
                <a href="{{ $currentLang === 'en' ? '/en/contact' : '/contact' }}"
                    class="w-full py-4 bg-primary-800 text-white rounded-xl text-center font-bold shadow-lg shadow-primary-800/20">
                    {{ $t['contact'] }}
                </a>
                @if (Auth::check())
                    <a href="{{ route('admin.dashboard') }}"
                        class="w-full py-4 bg-primary-800 text-white rounded-xl text-center font-bold shadow-lg shadow-primary-800/20">
                        {{ __('Dashboard') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
