<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    @stack('css')
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main id="main-content"
            class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-10">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>
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
                }
            }))
        })
    </script>

    <script>
        Livewire.on('swal', (data) => {
            Swal.fire(data[0]);
        })
    </script>

    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif
    @stack('js')
</body>

</html>
