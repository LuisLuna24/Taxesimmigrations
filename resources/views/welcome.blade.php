<x-guest-layout>
    @php
        // DEFINICIÓN DE DATOS (Equivalente al frontmatter de Astro)
        $services = [
            [
                'icon' => '💰',
                'title' => 'Preparación de Impuestos Individuales (1040)',
                'desc' =>
                    'Planificación estratégica para individuos y familias, maximizando deducciones y asegurando el cumplimiento de las declaraciones de impuestos (IRS).',
            ],
            [
                'icon' => '📈',
                'title' => 'Contabilidad Mensual y Reportes',
                'desc' =>
                    'Servicios completos de contabilidad, nómina y gestión financiera mensual para pequeñas y medianas empresas (PyMEs) que buscan un crecimiento organizado.',
            ],
            [
                'icon' => '⚖️',
                'title' => 'ITIN (CAA — Agente Certificador del IRS)',
                'desc' =>
                    'Asistencia profesional y certificación como Agente Aceptante Certificador para solicitudes ITIN (Formulario W-7), asegurando el cumplimiento fiscal para residentes y no residentes.',
            ],
        ];

        $currentLang = str_starts_with(request()->path(), 'en') ? 'en' : 'es';
    @endphp

    <header id="hero-section"
        class="relative overflow-hidden bg-white pt-16 pb-24 px-4 md:px-16 lg:px-24 xl:px-32 selection:bg-primary-500/30">

        <div
            class="absolute inset-0 -z-20 h-full w-full bg-white bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:14px_24px]">
        </div>
        <div
            class="absolute top-0 left-0 right-0 -z-10 h-[500px] w-full bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,var(--tw-gradient-stops))] from-primary-200/40 via-white to-transparent">
        </div>

        <div
            class="absolute top-1/3 left-10 w-72 h-72 bg-rojo-400/20 rounded-full blur-[100px] -z-10 animate-pulse">
        </div>

        <div class="flex flex-col lg:flex-row items-center justify-between gap-12 lg:gap-20">

            <div class="flex flex-col items-center lg:items-start flex-1 text-center lg:text-left z-10">

                <div class="hero-content opacity-0 translate-y-4 mb-8">
                    <div class="relative inline-block group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary-400 to-rojo-400 blur-xl opacity-20 group-hover:opacity-40 rounded-full transition-opacity duration-500">
                        </div>
                        <img src="{{ asset('img/Locho M.webp') }}" alt="Logo"
                            class="relative h-20 md:h-28 w-auto object-contain transition-transform duration-500 group-hover:scale-105">
                    </div>
                </div>

                <h1
                    class="hero-content opacity-0 translate-y-8 text-4xl md:text-5xl lg:text-7xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                    {{ __('hero_title_1') }}
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary-700 to-primary-500 italic pr-1">
                        {{ __('hero_title_italic') }}
                    </span>
                    <br class="hidden md:block">
                    {{ __('hero_title_2') }}
                    <span class="relative whitespace-nowrap text-rojo-700">
                        <span class="relative z-10">{{ __('hero_title_secondary') }}</span>
                        <svg class="absolute -bottom-2 left-0 w-full h-3 text-rojo-300 -z-10" viewBox="0 0 100 10"
                            preserveAspectRatio="none">
                            <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none"
                                class="opacity-40" />
                        </svg>
                    </span>
                </h1>

                <p
                    class="hero-content opacity-0 translate-y-8 mt-8 text-lg md:text-xl text-slate-600 max-w-xl leading-relaxed font-medium">
                    {!! __('hero_description', [
                        'legal' =>
                            '<span class="text-slate-900 font-semibold decoration-primary-300/50 underline decoration-2 underline-offset-2">' .
                            __('hero_legal') .
                            '</span>',
                        'confidentiality' =>
                            '<span class="text-slate-900 font-semibold decoration-rojo-300/50 underline decoration-2 underline-offset-2">' .
                            __('hero_confidentiality') .
                            '</span>',
                    ]) !!}
                </p>

                <div
                    class="hero-content opacity-0 translate-y-8 flex flex-col sm:flex-row items-center gap-4 mt-10 w-full sm:w-auto">
                    <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}"
                        class="group relative w-full sm:w-auto flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 px-8 rounded-full transition-all shadow-[0_10px_20px_-10px_rgba(15,23,42,0.5)] hover:shadow-[0_20px_25px_-15px_rgba(15,23,42,0.3)] hover:-translate-y-1 active:scale-95 text-sm tracking-wide">
                        {{ __('hero_btn_start') }}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <a href="{{ $currentLang == 'en' ? route('en.services') : route('services') }}"
                        class="w-full sm:w-auto flex items-center justify-center bg-white border border-slate-200 hover:border-slate-300 text-slate-700 hover:text-primary-700 font-bold py-4 px-8 rounded-full transition-all shadow-sm hover:shadow-md hover:-translate-y-1 active:scale-95 text-sm tracking-wide">
                        {{ __('hero_btn_services') }}
                    </a>
                </div>
            </div>

            <div class="flex-1 relative w-full flex justify-center lg:justify-end mt-16 lg:mt-0 perspective-1000">
                <div id="hero-blob"
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-primary-400/30 via-rojo-400/30 to-purple-400/30 rounded-full blur-3xl -z-10 opacity-0 scale-75">
                </div>

                <div id="hero-image-container" class="relative opacity-0 scale-95 z-10">
                    <div
                        class="relative rounded-3xl p-2 bg-white/40 backdrop-blur-sm border border-white/50 shadow-2xl">
                        <img src="{{ asset('img/home.webp') }}"
                            alt="Professional Services"
                            class="block w-full h-auto lg:max-w-[580px] rounded-2xl shadow-[0_0_1px_rgba(0,0,0,0.1)]">

                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-black/5 pointer-events-none">
                        </div>
                    </div>

                    <div id="floating-badge"
                        class="absolute -bottom-8 -left-8 md:-left-12 bg-white/80 backdrop-blur-md p-5 rounded-2xl shadow-[0_20px_40px_-5px_rgba(0,0,0,0.1)] border border-white/40 hidden sm:block opacity-0 translate-y-4 max-w-[240px]">
                        <div class="flex items-start gap-4">
                            <div
                                class="size-12 rounded-xl bg-gradient-to-br from-primary-600 to-primary-800 flex items-center justify-center text-white shadow-lg shadow-primary-500/30 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800 uppercase tracking-wide mb-0.5">
                                    {{ __('hero_badge_privacy') }}</p>
                                <p class="text-[11px] text-slate-500 leading-tight">{{ __('hero_badge_sub') }}</p>
                            </div>
                        </div>
                    </div>

                    <div id="floating-shape"
                        class="absolute -top-6 -right-6 bg-rojo-50 p-4 rounded-2xl shadow-lg border border-rojo-100 hidden lg:block opacity-0">
                        <div class="size-2 rounded-full bg-rojo-400"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="values-section" class="relative py-20 lg:py-32 bg-slate-50 overflow-hidden">

        <div
            class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-slate-300 to-transparent opacity-50">
        </div>
        <div
            class="absolute -top-24 -left-24 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-30 pointer-events-none">
        </div>
        <div
            class="absolute top-1/2 right-0 w-64 h-64 bg-rojo-100 rounded-full blur-3xl opacity-30 pointer-events-none">
        </div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">

            <div class="max-w-3xl mx-auto text-center mb-16 value-header opacity-0 translate-y-8">
                <h2 class="text-primary-800 font-bold tracking-wide uppercase text-sm mb-3">
                    {{ __('values_eyebrow') }}
                </h2>
                <h1 class="text-3xl md:text-4xl font-bold text-rojo-800 mb-6">
                    {{ __('values_title') }}
                </h1>
                <p class="text-lg text-slate-600 leading-relaxed">
                    {{ __('values_description') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">

                <div
                    class="value-card group relative bg-white rounded-2xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-slate-100 transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-12">
                    <div
                        class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div
                        class="w-14 h-14 rounded-xl bg-purple-50 flex items-center justify-center mb-6 group-hover:bg-purple-100 transition-colors duration-300">
                        <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-purple-700 transition-colors">
                        {{ __('values_ethics_title') }}
                    </h3>
                    <p class="text-slate-600 leading-relaxed">
                        {{ __('values_ethics_desc') }}
                    </p>
                </div>

                <div
                    class="value-card group relative bg-white rounded-2xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-slate-100 transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-12 delay-100">
                    <div
                        class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div
                        class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center mb-6 group-hover:bg-emerald-100 transition-colors duration-300">
                        <svg class="w-7 h-7 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-emerald-700 transition-colors">
                        {{ __('values_privacy_title') }}
                    </h3>
                    <p class="text-slate-600 leading-relaxed">
                        {{ __('values_privacy_desc') }}
                    </p>
                </div>

                <div
                    class="value-card group relative bg-white rounded-2xl p-8 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-slate-100 transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-12 delay-200">
                    <div
                        class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-orange-500 to-amber-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div
                        class="w-14 h-14 rounded-xl bg-orange-50 flex items-center justify-center mb-6 group-hover:bg-orange-100 transition-colors duration-300">
                        <svg class="w-7 h-7 text-orange-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-orange-700 transition-colors">
                        {{ __('values_commitment_title') }}
                    </h3>
                    <p class="text-slate-600 leading-relaxed">
                        {{ __('values_commitment_desc') }}
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section id="cta-section" class="py-24 px-4 md:px-6">
        <div class="container mx-auto">

            <div
                class="cta-container relative rounded-[2.5rem] overflow-hidden px-6 py-12 md:px-16 md:py-20 text-center md:text-left flex flex-col justify-between shadow-2xl shadow-slate-900/30 opacity-0 scale-95 transform bg-[url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=2370&auto=format&fit=crop')] bg-cover bg-center bg-no-repeat">

                <div class="absolute inset-0 bg-slate-900/90 mix-blend-multiply z-0"></div>

                <div
                    class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-primary-500/10 rounded-full blur-[80px] pointer-events-none z-0">
                </div>

                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-10 mb-8">
                    <div class="max-w-2xl">
                        <h2
                            class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 drop-shadow-sm">
                            {{ __('cta_title') }}
                        </h2>
                        <p class="text-lg text-slate-200 leading-relaxed mb-8 md:mb-0 font-medium drop-shadow-sm">
                            {{ __('cta_description') }}
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto shrink-0">
                        <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}"
                            class="group inline-flex items-center justify-center bg-white text-slate-900 font-bold py-4 px-8 rounded-xl transition-all hover:bg-slate-100 hover:scale-105 shadow-lg shadow-white/10 text-center">
                            {{ __('cta_btn_primary') }}
                            <svg class="w-5 h-5 ml-2 text-slate-900 transition-transform group-hover:translate-x-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>

                        <a href="tel:+1234567890"
                            class="group inline-flex items-center justify-center bg-transparent border-2 border-white/30 text-white font-semibold py-4 px-8 rounded-xl transition-all hover:bg-white/10 hover:border-white hover:scale-105 text-center backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-mail">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z" />
                                <path
                                    d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z" />
                            </svg>
                            {{ __('cta_btn_rojo') }}
                        </a>
                    </div>
                </div>

                <div class="relative z-10 mt-6 border-t border-white/10 pt-6">
                    <p
                        class="text-[10px] md:text-xs text-slate-400 text-center md:text-left leading-relaxed uppercase tracking-wide opacity-80">
                        <span class="text-red-400 font-bold mr-1">*</span> {{ __('cta_disclaimer') }}
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section id="services-section" class="py-24 bg-slate-50 relative">

        <div class="container mx-auto px-4 md:px-6 mb-16 relative z-10">
            <div class="text-center max-w-3xl mx-auto services-header opacity-0 translate-y-8">
                <h2 class="text-primary-600 font-bold tracking-widest uppercase text-xs mb-3">
                    {{ __('services_eyebrow') }}
                </h2>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    {{ __('services_title') }}
                </h1>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                    {{ __('services_subtitle') }}
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div
                    class="service-card group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 hover:-translate-y-1 opacity-0 translate-y-8 flex flex-col h-full">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-blue-900 rounded-t-2xl"></div>

                    <div class="mb-6">
                        <div
                            class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-blue-900" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ __('srv_taxes_title') }}</h3>
                    </div>

                    <ul class="space-y-3 mb-8 flex-grow">
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-blue-900 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_tax_1') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-blue-900 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_tax_2') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-blue-900 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_tax_3') }}</span>
                        </li>
                    </ul>
                </div>

                <div
                    class="service-card group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 hover:-translate-y-1 opacity-0 translate-y-8 flex flex-col h-full">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-cyan-600 rounded-t-2xl"></div>

                    <div class="mb-6">
                        <div
                            class="w-14 h-14 rounded-xl bg-cyan-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-cyan-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ __('srv_immigration_title') }}</h3>
                    </div>

                    <ul class="space-y-3 mb-8 flex-grow">
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-cyan-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_imm_1') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-cyan-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_imm_2') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-cyan-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_imm_3') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-cyan-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_imm_4') }}</span>
                        </li>
                    </ul>
                </div>

                <div
                    class="service-card group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 hover:-translate-y-1 opacity-0 translate-y-8 flex flex-col h-full">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-red-600 rounded-t-2xl"></div>

                    <div class="mb-6">
                        <div
                            class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-red-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ __('srv_accidents_title') }}</h3>
                    </div>

                    <ul class="space-y-3 mb-8 flex-grow">
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-red-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_acc_1') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-red-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_acc_2') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-red-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_acc_3') }}</span>
                        </li>
                    </ul>
                </div>

                <div
                    class="service-card group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 hover:-translate-y-1 opacity-0 translate-y-8 flex flex-col h-full">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-indigo-900 rounded-t-2xl"></div>

                    <div class="mb-6">
                        <div
                            class="w-14 h-14 rounded-xl bg-indigo-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-indigo-900" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ __('srv_notary_title') }}</h3>
                    </div>

                    <ul class="space-y-3 mb-8 flex-grow">
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-indigo-900 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_notary_1') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-indigo-900 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_notary_2') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-indigo-900 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_notary_3') }}</span>
                        </li>
                        <li class="flex items-start text-slate-600 text-sm">
                            <svg class="w-5 h-5 text-indigo-900 mr-2 flex-shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span>{{ __('srv_notary_4') }}</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    @push('js')
        <script>
            //+===========================================================Hedear
            document.addEventListener('DOMContentLoaded', () => {
                const tl = gsap.timeline({
                    defaults: {
                        ease: "power3.out",
                        duration: 1
                    }
                });

                // Animación refinada
                tl.to(".hero-content", {
                        opacity: 1,
                        y: 0,
                        stagger: 0.1,
                        duration: 1.2
                    })
                    .to("#hero-image-container", {
                        opacity: 1,
                        scale: 1,
                        duration: 1.4,
                        ease: "elastic.out(1, 0.75)" // Efecto rebote sutil
                    }, "-=1.0")
                    .to("#hero-blob", {
                        opacity: 1,
                        scale: 1.1,
                        duration: 2,
                        ease: "sine.out"
                    }, "-=1.4")
                    .to(["#floating-badge", "#floating-shape"], {
                        opacity: 1,
                        y: 0,
                        stagger: 0.2,
                        duration: 1
                    }, "-=0.8");

                // Flotación (Idle)
                gsap.to("#hero-image-container", {
                    y: 20,
                    duration: 4,
                    repeat: -1,
                    yoyo: true,
                    ease: "sine.inOut"
                });

                gsap.to("#floating-badge", {
                    y: -15, // Movimiento contrario para parallax
                    duration: 5,
                    repeat: -1,
                    yoyo: true,
                    ease: "sine.inOut",
                    delay: 0.5
                });

                gsap.to("#floating-shape", {
                    y: 10,
                    rotation: 5,
                    duration: 6,
                    repeat: -1,
                    yoyo: true,
                    ease: "sine.inOut",
                });
            });
        </script>

        <script>
            //======================================================================Valores
            document.addEventListener('DOMContentLoaded', () => {
                gsap.registerPlugin(ScrollTrigger);

                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: "#values-section",
                        start: "top 80%", // Inicia cuando el top de la sección toca el 80% de la pantalla
                        toggleActions: "play none none reverse"
                    }
                });

                tl.to(".value-header", {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: "power3.out"
                    })
                    .to(".value-card", {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        stagger: 0.2, // Retraso entre cada tarjeta
                        ease: "back.out(1.7)" // Efecto rebote sutil
                    }, "-=0.4");
            });
        </script>

        <script>
            //==============================================================Contacto
            document.addEventListener('DOMContentLoaded', () => {
                gsap.registerPlugin(ScrollTrigger);

                // Animación de aparición (Scale Up)
                gsap.to(".cta-container", {
                    scrollTrigger: {
                        trigger: "#cta-section",
                        start: "top 85%", // Se activa cuando el top de la sección llega al 85% de la pantalla
                        toggleActions: "play none none reverse"
                    },
                    opacity: 1,
                    scale: 1,
                    duration: 1,
                    ease: "power3.out"
                });
            });
        </script>

        <script>
            //==============================================================Services
            document.addEventListener('DOMContentLoaded', () => {
                gsap.registerPlugin(ScrollTrigger);

                const tlServices = gsap.timeline({
                    scrollTrigger: {
                        trigger: "#services-section",
                        start: "top 80%",
                        toggleActions: "play none none reverse"
                    }
                });

                tlServices.to(".services-header", {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        ease: "power2.out"
                    })
                    .to(".service-card", {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        stagger: 0.15,
                        ease: "power2.out"
                    }, "-=0.5");
            });
        </script>
    @endpush
</x-guest-layout>
