<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TAXES AND IMMIGRATION BY JOSDALY MARIN LLC')</title>
    <meta name="description" content="@yield('meta_description', 'Preparación profesional de formas migratorias e impuestos. Servicios expertos por Josdaly Marin LLC. Honestidad y eficiencia.')">
    <meta name="keywords"
        content="Taxes and Immigration, Josdaly Marin, preparación de impuestos, formas migratorias, tax prep, notary public">

    <meta property="og:title" content="TAXES AND IMMIGRATION BY JOSDALY MARIN LLC">
    <meta property="og:description" content="Especialistas en preparación de documentos migratorios y fiscales.">
    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfjE1UsAAAAAPRkqkoKjjzQpPh1V1-wRvI2lMxr"></script>

    @livewireStyles
    @stack('css')
</head>

<body class="font-sans antialiased text-slate-900 selection:bg-primary-500 selection:text-white">

    <x-nav />

    <main id="main-content" class="min-h-screen">
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
    @stack('js')
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "ProfessionalService",
      "name": "TAXES AND IMMIGRATION BY JOSDALY MARIN LLC",
      "address": {
        "@@type": "PostalAddress",
        "addressCountry": "US"
      },
      "description": "Servicios de preparación de formas migratorias y declaración de impuestos.",
      "founder": "Josdaly Marin"
    }
    </script>
</body>

</html>
