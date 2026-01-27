<x-guest-layout>
    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <h1 class="gsap-title opacity-0 text-4xl md:text-5xl font-black text-white mb-4">
                {{ __('pol_header_title') }}
            </h1>
            <p class="gsap-subtitle opacity-0 text-slate-400 max-w-2xl mx-auto text-lg">
                {{ __('pol_header_subtitle') }}
            </p>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="gsap-image opacity-0 relative">
                    <div class="absolute inset-0 bg-blue-600 rounded-3xl rotate-3 opacity-10"></div>
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Documentos legales y confidencialidad"
                        class="relative rounded-3xl shadow-2xl w-full object-cover h-[500px]">
                </div>

                <div class="space-y-10">
                    <div class="gsap-pillar opacity-0 pl-6 border-l-4 border-blue-600">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3 flex items-center gap-3">
                            <svg class="size-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            {{ __('pol_conf_title') }}
                        </h3>
                        <p class="text-slate-600 leading-relaxed text-justify">
                            {{ __('pol_conf_desc') }}
                        </p>
                    </div>

                    <div class="gsap-pillar opacity-0 pl-6 border-l-4 border-red-600">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3 flex items-center gap-3">
                            <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            {{ __('pol_legal_title') }}
                        </h3>
                        <p class="text-slate-600 leading-relaxed text-justify">
                            {{ __('pol_legal_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-5">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 gsap-guidelines opacity-0">Operational Guidelines</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="gsap-card opacity-0 bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('pol_scope_title') }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ __('pol_scope_desc') }}</p>
                </div>

                <div
                    class="gsap-card opacity-0 bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('pol_pay_title') }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ __('pol_pay_desc') }}</p>
                </div>

                <div
                    class="gsap-card opacity-0 bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('pol_time_title') }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ __('pol_time_desc') }}</p>
                </div>

                <div
                    class="gsap-card opacity-0 bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('pol_resp_title') }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ __('pol_resp_desc') }}</p>
                </div>

                <div
                    class="gsap-card opacity-0 bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100 lg:col-span-2">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">{{ __('pol_comm_title') }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ __('pol_comm_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    "@push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                // Verificar si GSAP cargó
                if (typeof gsap === 'undefined') {
                    console.error("GSAP no se ha cargado. Revisa tu conexión a internet.");
                    // Fallback de emergencia: mostrar todo si falla la animación
                    document.querySelectorAll('.opacity-0').forEach(el => el.classList.remove('opacity-0'));
                    return;
                }

                const tl = gsap.timeline({
                    defaults: {
                        ease: "power3.out",
                        duration: 0.8
                    }
                });

                // 1. Header
                tl.to(".gsap-title", {
                        y: 0,
                        opacity: 1,
                        startAt: {
                            y: 30,
                            opacity: 0
                        }
                    })
                    .to(".gsap-subtitle", {
                        y: 0,
                        opacity: 1,
                        startAt: {
                            y: 20,
                            opacity: 0
                        }
                    }, "-=0.6");

                // 2. Imagen y Pilares
                tl.to(".gsap-image", {
                        x: 0,
                        opacity: 1,
                        duration: 1,
                        startAt: {
                            x: -50,
                            opacity: 0
                        }
                    }, "-=0.4")
                    .to(".gsap-pillar", {
                        x: 0,
                        opacity: 1,
                        stagger: 0.2,
                        startAt: {
                            x: 30,
                            opacity: 0
                        }
                    }, "-=0.8");

                // 3. Cards
                tl.to(".gsap-guidelines", {
                        opacity: 1,
                        startAt: {
                            opacity: 0
                        }
                    }, "-=0.2")
                    .to(".gsap-card", {
                        y: 0,
                        opacity: 1,
                        stagger: 0.1,
                        ease: "back.out(1.7)",
                        startAt: {
                            y: 50,
                            opacity: 0
                        }
                    }, "-=0.2");
            });
        </script>
    @endpush"
</x-guest-layout>
