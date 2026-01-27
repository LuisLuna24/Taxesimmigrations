<x-guest-layout>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    @endpush

    <section class="relative py-10 bg-slate-50 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
            style="background-image: radial-gradient(#1e293b 1px, transparent 1px); background-size: 32px 32px;">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="gsap-section-header opacity-0 text-center mb-16">
                <h2 class="text-red-700 font-bold tracking-[0.2em] uppercase text-xs mb-4">
                    {{ __('about_title') }}
                </h2>
                <h3 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">{{ __('values_title') }}</h3>
            </div>

            @php
                $values = [
                    [
                        'title' => 'val_ethics',
                        'desc' => 'val_ethics_desc',
                        'color' => 'text-emerald-600 bg-emerald-50',
                        'icon' =>
                            'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    ],
                    [
                        'title' => 'val_conf',
                        'desc' => 'val_conf_desc',
                        'color' => 'text-indigo-600 bg-indigo-50',
                        'icon' =>
                            'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                    ],
                    [
                        'title' => 'val_comp',
                        'desc' => 'val_comp_desc',
                        'color' => 'text-amber-600 bg-amber-50',
                        'icon' =>
                            'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    ],
                    [
                        'title' => 'val_trans',
                        'desc' => 'val_trans_desc',
                        'color' => 'text-cyan-600 bg-cyan-50',
                        'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                    ],
                    [
                        'title' => 'val_resp',
                        'desc' => 'val_resp_desc',
                        'color' => 'text-purple-600 bg-purple-50',
                        'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                    ],
                    [
                        'title' => 'val_respect',
                        'desc' => 'val_respect_desc',
                        'color' => 'text-pink-600 bg-pink-50',
                        'icon' =>
                            'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z',
                    ],
                    [
                        'title' => 'val_excel',
                        'desc' => 'val_excel_desc',
                        'color' => 'text-orange-600 bg-orange-50',
                        'icon' =>
                            'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($values as $val)
                    <div
                        class="gsap-value-card opacity-0 p-6 rounded-2xl bg-white border border-slate-100 hover:border-slate-300 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div
                            class="w-12 h-12 rounded-xl {{ $val['color'] }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $val['icon'] }}" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 mb-2">{{ __($val['title']) }}</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">{{ __($val['desc']) }}</p>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 mb-24 mt-10">
                <div
                    class="gsap-hero-card opacity-0 relative p-10 rounded-3xl bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-blue-600"></div>
                    <div class="relative z-10">
                        <div
                            class="size-14 bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white flex items-center justify-center rounded-2xl mb-6 transition-colors duration-300 shadow-sm">
                            <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">{{ __('mission_title') }}
                        </h2>
                        <p class="text-slate-600 text-lg leading-relaxed">{{ __('mission_text') }}</p>
                    </div>
                    <div
                        class="absolute -right-6 -bottom-6 text-blue-50/50 group-hover:text-blue-50 transition-colors duration-500">
                        <svg class="size-48 opacity-20 transform rotate-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="gsap-hero-card opacity-0 relative p-10 rounded-3xl bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-red-600"></div>
                    <div class="relative z-10">
                        <div
                            class="size-14 bg-red-50 text-red-600 group-hover:bg-red-600 group-hover:text-white flex items-center justify-center rounded-2xl mb-6 transition-colors duration-300 shadow-sm">
                            <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">{{ __('vision_title') }}</h2>
                        <p class="text-slate-600 text-lg leading-relaxed">{{ __('vision_text') }}</p>
                    </div>
                    <div
                        class="absolute -right-6 -bottom-6 text-red-50/50 group-hover:text-red-50 transition-colors duration-500">
                        <svg class="size-48 opacity-20 transform rotate-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </div>


        </div>
    </section>

    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                gsap.registerPlugin();

                const tl = gsap.timeline({
                    defaults: {
                        ease: "power3.out"
                    }
                });

                // 1. Animar Misión y Visión (entrando desde los lados)
                tl.fromTo(".gsap-hero-card", {
                    y: 50,
                    opacity: 0,
                    scale: 0.95
                }, {
                    y: 0,
                    opacity: 1,
                    scale: 1,
                    duration: 1,
                    stagger: 0.2 // Pequeño retraso entre Misión y Visión
                });

                // 2. Animar el título de Valores
                tl.fromTo(".gsap-section-header", {
                        y: 30,
                        opacity: 0
                    }, {
                        y: 0,
                        opacity: 1,
                        duration: 0.8
                    },
                    "-=0.5" // Comienza medio segundo antes de que termine la anterior
                );

                // 3. Animar las tarjetas de valores (efecto cascada/stagger)
                tl.fromTo(".gsap-value-card", {
                        y: 40,
                        opacity: 0,
                    }, {
                        y: 0,
                        opacity: 1,
                        duration: 0.8,
                        stagger: 0.1 // 0.1s de diferencia entre cada tarjeta
                    },
                    "-=0.5"
                );
            });
        </script>
    @endpush
</x-guest-layout>
