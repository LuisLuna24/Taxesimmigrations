@php
    $links = [
        [
            'header' => 'Principal',
        ],
        [
            'name' => 'Dashboard',
            'icon' => 'svg/dashboard.svg',
            'route' => 'admin.dashboard',
            'active' => 'admin.dashboard',
        ],
        [
            'name' => 'Citas',
            'icon' => 'svg/calendar-clock.svg',
            'route' => 'admin.appointments.index',
            'active' => 'admin.appointments.*',
            'permission' => 'admin.appointments.index',
        ],
        [
            'name' => 'Comentarios',
            'icon' => 'svg/message-2.svg',
            'route' => 'admin.comments.index',
            'active' => 'admin.comments.index',
            'permission' => 'admin.comments.index',
        ],
        [
            'name' => 'Servicios',
            'icon' => 'svg/report.svg',
            'route' => 'admin.services.index',
            'active' => 'admin.services.*',
            'permission' => 'admin.services.index',
        ],
        /*[
            'header' => 'Configuracion',
        ],*/
        [
            'name' => 'Usuarios',
            'icon' => 'svg/users.svg',
            'active' => ['admin.users.*', 'admin.clients.*', 'admin.employees.*'],
            'permissions' => ['admin.users.index', 'admin.clients.index', 'admin.employees.index'],
            'submenu' => [
                [
                    'name' => 'Usuarios',
                    'icon' => 'svg/users.svg',
                    'route' => 'admin.users.index',
                    'active' => 'admin.users.*',
                    'permission' => 'admin.users.index',
                ],
                [
                    'name' => 'Clientes',
                    'icon' => 'svg/user.svg',
                    'route' => 'admin.clients.index',
                    'active' => 'admin.clients.*',
                    'permission' => 'admin.clients.index',
                ],
                [
                    'name' => 'Empleados',
                    'icon' => 'svg/user.svg',
                    'route' => 'admin.employees.index',
                    'active' => 'admin.employees.*',
                    'permission' => 'admin.employees.index',
                ],
            ],
        ],
        [
            'name' => 'Seguridad',
            'icon' => 'svg/shield-check.svg',
            'active' => ['admin.roles.*', 'admin.permissions.*'],
            'permissions' => ['admin.roles.index', 'admin.permissions.index'],
            'submenu' => [
                [
                    'name' => 'Roles',
                    'icon' => 'svg/user-shield.svg',
                    'route' => 'admin.roles.index',
                    'active' => 'admin.roles.*',
                    'permission' => 'admin.roles.index',
                ],
                [
                    'name' => 'Permisos',
                    'icon' => 'svg/shield.svg',
                    'route' => 'admin.permissions.index',
                    'active' => 'admin.permissions.*',
                    'permission' => 'admin.permissions.index',
                ],
            ],
        ],
    ];
@endphp

@props([
    'title' => config('app.name'),
    'breadcrumbs' => [],
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="darkModeControl" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    @stack('css')
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    <div x-data="{ sidebarIsOpen: false }" class="relative flex min-h-screen">

        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-gray-900/60 backdrop-blur-sm md:hidden"
            x-on:click="sidebarIsOpen = false" x-transition:enter="transition opacity-ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"></div>

        <aside x-cloak
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 transition-transform duration-300 transform md:translate-x-0 md:static md:inset-0"
            :class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-full'">

            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center h-16 border-b border-gray-100 dark:border-gray-800">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-blue-600 dark:text-blue-400">
                        <x-application-mark />
                    </a>
                </div>

                <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">
                    @foreach ($links as $link)
                        @php
                            // Lógica de visibilidad del link/sección
                            $canSeeLink = true;
                            if (isset($link['permissions'])) {
                                $canSeeLink = auth()->user()->canAny($link['permissions']);
                            } elseif (isset($link['permission'])) {
                                $canSeeLink = auth()->user()->can($link['permission']);
                            }
                        @endphp

                        @if($canSeeLink)
                            @isset($link['header'])
                                <div class="pt-4 pb-1 pl-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                    {{ $link['header'] }}
                                </div>
                            @else
                                @isset($link['submenu'])
                                    <div x-data="{ isExpanded: {{ request()->routeIs($link['active']) ? 'true' : 'false' }} }" class="space-y-1">
                                        <button @click="isExpanded = !isExpanded"
                                            class="flex items-center justify-between w-full px-3 py-2 text-sm font-medium transition-colors rounded-lg group hover:bg-gray-100 dark:hover:bg-gray-800"
                                            :class="isExpanded ? 'text-blue-600 dark:text-blue-400 bg-blue-50/50 dark:bg-blue-900/10' : 'text-gray-600 dark:text-gray-400'">

                                            <div class="flex items-center gap-3">
                                                <span class="w-5 h-5 flex items-center justify-center">
                                                    @if (isset($link['icon']) && file_exists(public_path($link['icon'])))
                                                        {!! file_get_contents(public_path($link['icon'])) !!}
                                                    @else
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                                    @endif
                                                </span>
                                                <span>{{ $link['name'] }}</span>
                                            </div>
                                            <svg class="w-4 h-4 transition-transform duration-200" :class="isExpanded ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>

                                        <div x-show="isExpanded" x-collapse x-cloak class="pl-10 space-y-1">
                                            @foreach ($link['submenu'] as $item)
                                                @can($item['permission'])
                                                    <a href="{{ route($item['route']) }}"
                                                        class="flex items-center gap-3 px-3 py-2 text-sm transition-colors rounded-lg group {{ request()->routeIs($item['active']) ? 'text-blue-600 font-semibold dark:text-blue-400 bg-blue-50/50 dark:bg-blue-900/10' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                                                        {!! file_get_contents(public_path($item['icon'])) !!}
                                                        <span class="truncate">{{ $item['name'] }}</span>
                                                    </a>
                                                @endcan
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route($link['route']) }}"
                                        class="flex items-center gap-3 px-3 py-2 text-sm font-medium transition-all duration-200 rounded-lg group {{ request()->routeIs($link['active']) ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                                        <span class="w-5 h-5 flex items-center justify-center">
                                            @if (isset($link['icon']) && file_exists(public_path($link['icon'])))
                                                {!! file_get_contents(public_path($link['icon'])) !!}
                                            @else
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            @endif
                                        </span>
                                        <span>{{ $link['name'] }}</span>
                                    </a>
                                @endisset
                            @endisset
                        @endif
                    @endforeach
                </nav>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="flex items-center justify-between h-16 px-4 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 sticky top-0 z-10">
                <div class="flex items-center">
                    <button @click="sidebarIsOpen = true" class="p-2 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>

                    <nav class="hidden ml-4 md:flex items-center space-x-2 text-sm">
                        @foreach ($breadcrumbs as $index => $item)
                            @if (!$loop->first) <span class="text-gray-400">/</span> @endif
                            @isset($item['href'])
                                <a href="{{ $item['href'] }}" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ $item['name'] }}</a>
                            @else
                                <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $item['name'] }}</span>
                            @endisset
                        @endforeach
                    </nav>
                </div>

                <div class="flex items-center space-x-3">
                    <button @click="toggleTheme" class="p-2 text-gray-500 rounded-xl bg-gray-100 dark:bg-gray-800 dark:text-yellow-400 hover:ring-2 ring-blue-500 transition-all">
                        <template x-if="!darkMode">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                        </template>
                        <template x-if="darkMode">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </template>
                    </button>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm transition border-2 border-transparent rounded-full focus:outline-none">
                                <img class="size-9 rounded-full object-cover shadow-sm" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">{{ __('Profile') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data> @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">{{ __('Log Out') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-gray-950 p-6 md:p-10">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('darkModeControl', () => ({
                darkMode: localStorage.getItem('darkMode') === 'true',
                toggleTheme() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('darkMode', this.darkMode);
                    document.documentElement.classList.toggle('dark', this.darkMode);
                }
            }))
        })
    </script>
    @stack('js')
</body>
</html>
