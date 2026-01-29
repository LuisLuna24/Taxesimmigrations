@php
    $currentYear = date('Y');
    $path = request()->path();
    $currentLang = str_starts_with($path, 'en') ? 'en' : 'es';

    $content = [
        'es' => [
            'description' =>
                'Servicios profesionales de preparación de  impuestos y llenado de formas migratorias. Compromiso, honestidad y eficiencia en cada trámite.',
            'navTitle' => 'Navegación',
            'contactTitle' => 'Contacto',
            'rights' => 'Todos los derechos reservados.',
            'cta_text' => '¿Listo para empezar su trámite?',
            'phone_label' => 'Teléfono',
            'email_label' => 'Email Us', // Como pediste
            'disclaimer' => 'IMPORTANTE: No soy abogada y no ofrezco asesoría legal.',
        ],
        'en' => [
            'description' =>
                'Professional Tax Preparation and Immigration Form Services. Commitment, honesty, and efficiency in every process.',
            'navTitle' => 'Navigation',
            'contactTitle' => 'Contact',
            'rights' => 'All rights reserved.',
            'cta_text' => 'Ready to start your process?',
            'phone_label' => 'Phone',
            'email_label' => 'Email Us',
            'disclaimer' => 'IMPORTANT: I am not an attorney and do not offer legal advice.',
        ],
    ];

    $text = $content[$currentLang];

    $routes = [
        ['name' => $currentLang === 'en' ? 'Home' : 'Inicio', 'url' => $currentLang === 'en' ? '/en' : '/'],
        [
            'name' => $currentLang === 'en' ? 'Services' : 'Servicios',
            'url' => $currentLang === 'en' ? '/en/services' : '/services',
        ],
        [
            'name' => $currentLang === 'en' ? 'Contact' : 'Contacto',
            'url' => $currentLang === 'en' ? '/en/contact' : '/contact',
        ],
    ];
@endphp

<footer class="bg-white pt-20 pb-10 relative overflow-hidden border-t border-slate-100">
    <div
        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary-600 via-rojo-500 to-primary-600 opacity-80">
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-16 mb-16">

            <div class="lg:col-span-5">
                <a href="{{ $currentLang === 'en' ? '/en' : '/' }}"
                    class="inline-block mb-8 transition-transform hover:scale-105">
                    <img src="{{ asset('img/Locho M.webp') }}" alt="Logo" class="h-16 w-auto object-contain" />
                </a>
                <p class="text-slate-500 leading-relaxed mb-8 max-w-sm text-sm">
                    {{ $text['description'] }}
                </p>
                <a href="{{ $currentLang === 'en' ? '/en/contact' : '/contact' }}"
                    class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-bold text-white bg-slate-900 hover:bg-primary-700 transition-all shadow-lg shadow-slate-900/10 group">
                    {{ $text['cta_text'] }}
                    <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <div class="lg:col-span-3">
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-slate-900 mb-8 flex items-center">
                    <span class="w-8 h-px bg-primary-600 mr-3"></span>
                    {{ $text['navTitle'] }}
                </h4>
                <ul class="space-y-4">
                    @foreach ($routes as $route)
                        <li>
                            <a href="{{ $route['url'] }}"
                                class="text-slate-500 hover:text-primary-600 transition-colors text-sm font-medium flex items-center group">
                                <span
                                    class="w-0 group-hover:w-4 h-px bg-primary-400 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                                {{ $route['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-4">
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-slate-900 mb-8 flex items-center">
                    <span class="w-8 h-px bg-primary-600 mr-3"></span>
                    {{ $text['contactTitle'] }}
                </h4>
                <div class="space-y-6">
                    <div class="flex items-center gap-4 group">
                        <div
                            class="size-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition-colors border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <a href="tel:+13854259442"
                            class="text-slate-600 hover:text-primary-700 font-semibold text-sm transition-colors tracking-tight">
                            +1 (385) 425-9442
                        </a>
                    </div>

                    <div class="flex items-center gap-4 group">
                        <div
                            class="size-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition-colors border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <a href="mailto:contac@taxesmigra.com"
                            class="text-slate-600 hover:text-primary-700 font-semibold text-sm transition-colors break-all tracking-tight">
                            contac@taxesmigra.com
                        </a>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div
                            class="size-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition-colors border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4l0 -8" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                <path d="M16.5 7.5v.01" />
                            </svg>
                        </div>
                        <a href="https://www.instagram.com/taxesymigra.jmj/"
                            class="text-slate-600 hover:text-primary-700 font-semibold text-sm transition-colors break-all tracking-tight">
                            taxesymigra.jmj
                        </a>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div
                            class="size-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition-colors border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                            </svg>
                        </div>
                        <a href="https://www.facebook.com/profile.php?id=100065407053406"
                            class="text-slate-600 hover:text-primary-700 font-semibold text-sm transition-colors break-all tracking-tight">
                            Taxes JMJ & Multiservices
                        </a>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div
                            class="size-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition-colors border border-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-tiktok">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917" />
                            </svg>
                        </div>
                        <a href="https://www.tiktok.com/@taxes.migra.jmj"
                            class="text-slate-600 hover:text-primary-700 font-semibold text-sm transition-colors break-all tracking-tight">
                            taxes.migra.jmj
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-10 flex flex-col items-center">
            <p
                class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mb-6 text-center max-w-2xl opacity-70 leading-relaxed px-4">
                {{ $text['disclaimer'] }}
            </p>

            <div
                class="flex flex-col md:flex-row justify-between items-center w-full gap-4 text-xs font-medium text-slate-500">
                <p>&copy; {{ $currentYear }} Blue Ocean. {{ $text['rights'] }}</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-primary-600 transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-primary-600 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>
