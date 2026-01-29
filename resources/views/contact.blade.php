<x-guest-layout>

    {{-- ESTILO DE EMERGENCIA (Por si falla JS, que no se quede invisible) --}}
    @push('css')
        <style>
            .opacity-0 {
                animation: forceVisible 0.5s forwards 3s;
            }

            @keyframes forceVisible {
                to {
                    opacity: 1;
                }
            }

            /* Gradiente Instagram */
            .bg-instagram {
                background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            }
        </style>
    @endpush

    {{-- 1. HEADER HERO (Consistente con tus otras páginas) --}}
    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <h1 class="gsap-hero-text opacity-0 text-4xl md:text-5xl font-black text-white mb-4">
                {{ __('cont_title') }}
            </h1>
            <p class="gsap-hero-text opacity-0 text-slate-400 max-w-2xl mx-auto text-lg">
                {{ __('cont_desc') }}
            </p>
        </div>
    </div>

    {{-- 2. SECCIÓN PRINCIPAL --}}
    <section class="py-16 md:py-24 bg-slate-50">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                {{-- COLUMNA IZQUIERDA: INFORMACIÓN DIRECTA --}}
                <div class="space-y-8">
                    <div class="gsap-col-left opacity-0 mb-6">
                        <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                            <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                            {{ __('cont_sub_title_contact') }}
                        </h2>
                    </div>

                    {{-- Tarjeta Teléfono --}}
                    <a href="tel:+13854259442" target="_blank" rel="noopener noreferrer" class="gsap-card-contact opacity-0 block group">
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-blue-200">
                            <div
                                class="size-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                                <svg class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500 font-medium uppercase tracking-wider">{{ __('cont_contact_c1') }}</p>
                                <p
                                    class="text-xl md:text-2xl font-bold text-slate-900 group-hover:text-blue-700 transition-colors">
                                    +1 (385) 425-9442</p>
                            </div>
                        </div>
                    </a>

                    {{-- Tarjeta Whatsapp --}}
                    <a href="https://wa.me/+13854259442" target="_blank" rel="noopener noreferrer" class="gsap-card-contact opacity-0 block group">
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-lime-200">
                            <div
                                class="size-16 bg-lime-50 rounded-2xl flex items-center justify-center text-lime-600 group-hover:bg-lime-600 group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                    <path
                                        d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500 font-medium uppercase tracking-wider">{{ __('cont_contact_c2') }}</p>
                                <p
                                    class="text-xl md:text-2xl font-bold text-slate-900 group-hover:text-lime-700 transition-colors">
                                    +1 (385) 425-9442</p>
                            </div>
                        </div>
                    </a>

                    {{-- Tarjeta Correo --}}
                    <a href="mailto:contac@taxesmigra.com" target="_blank" rel="noopener noreferrer" class="gsap-card-contact opacity-0 block group">
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-blue-200">
                            <div
                                class="size-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                <svg class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500 font-medium uppercase tracking-wider">{{ __('cont_contact_c3') }}</p>
                                <p
                                    class="text-xl md:text-2xl font-bold text-slate-900 group-hover:text-indigo-700 transition-colors">
                                    contac@taxesmigra.com</p>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- COLUMNA DERECHA: REDES SOCIALES --}}
                <div class="space-y-8">
                    <div class="gsap-col-right opacity-0 mb-6">
                        <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                            <span class="w-2 h-8 bg-purple-600 rounded-full"></span>
                            {{ __('cont_sub_title_social') }}
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-1 gap-4">

                        {{-- Facebook --}}
                        <a href="https://www.facebook.com/profile.php?id=100065407053406" target="_blank" rel="noopener noreferrer"
                            class="gsap-social opacity-0 flex items-center gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-blue-100 transition-all duration-300 group">
                            <div
                                class="size-12 bg-[#1877F2] rounded-full flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 group-hover:text-[#1877F2] transition-colors">
                                    {{ __('cont_social_c1') }}</h4>
                                <p class="text-xs text-slate-500">Taxes JMJ & Multiservices</p>
                            </div>
                        </a>

                        {{-- Instagram --}}
                        <a href="https://www.instagram.com/taxesymigra.jmj/" target="_blank" rel="noopener noreferrer"
                            class="gsap-social opacity-0 flex items-center gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-pink-100 transition-all duration-300 group">
                            <div
                                class="size-12 bg-instagram rounded-full flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.069-4.85.069-3.204 0-3.584-.012-4.849-.069-3.26-.149-4.771-1.669-4.919-4.919-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 group-hover:text-[#cc2366] transition-colors">
                                    {{ __('cont_social_c2') }}</h4>
                                <p class="text-xs text-slate-500">taxesymigra.jmj</p>
                            </div>
                        </a>

                        {{-- TikTok --}}
                        <a href="https://www.tiktok.com/@taxes.migra.jmj" target="_blank" rel="noopener noreferrer"
                            class="gsap-social opacity-0 flex items-center gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-slate-300 transition-all duration-300 group">
                            <div
                                class="size-12 bg-black rounded-full flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.35-1.17.82-1.45 1.45-.48.98-.49 2.19.05 3.16.65 1.17 2.05 2.03 3.42 2.11 1.63.13 3.3-1.01 3.51-2.65.03-.59.02-1.18.02-1.78.01-5.61.02-11.21.02-16.82z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 group-hover:text-black transition-colors">{{ __('cont_social_c3') }}
                                </h4>
                                <p class="text-xs text-slate-500">taxes.migra.jmj</p>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {

                // Check de seguridad
                if (typeof gsap === 'undefined') {
                    document.querySelectorAll('.opacity-0').forEach(el => el.classList.remove('opacity-0'));
                    return;
                }

                const tl = gsap.timeline({
                    defaults: {
                        ease: "power3.out",
                        duration: 0.8
                    }
                });

                // 1. Header (Aparece primero)
                tl.to(".gsap-hero-text", {
                    y: 0,
                    opacity: 1,
                    stagger: 0.2,
                    startAt: {
                        y: 30,
                        opacity: 0
                    }
                });

                // 2. Columna Izquierda (Título y Tarjetas de Contacto)
                tl.to(".gsap-col-left", {
                        x: 0,
                        opacity: 1,
                        duration: 0.6,
                        startAt: {
                            x: -30,
                            opacity: 0
                        }
                    }, "-=0.4")
                    .to(".gsap-card-contact", {
                        x: 0,
                        opacity: 1,
                        stagger: 0.15,
                        startAt: {
                            x: -30,
                            opacity: 0
                        }
                    }, "-=0.4");

                // 3. Columna Derecha (Título y Redes Sociales)
                tl.to(".gsap-col-right", {
                        x: 0,
                        opacity: 1,
                        duration: 0.6,
                        startAt: {
                            x: 30,
                            opacity: 0
                        }
                    }, "-=0.6")
                    .to(".gsap-social", {
                        x: 0,
                        opacity: 1,
                        stagger: 0.1,
                        duration: 0.6,
                        startAt: {
                            x: 30,
                            opacity: 0
                        },
                        ease: "back.out(1.2)" // Pequeño rebote divertido para redes sociales
                    }, "-=0.4");
            });
        </script>
    @endpush
</x-guest-layout>
