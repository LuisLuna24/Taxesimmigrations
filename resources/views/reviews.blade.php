<x-guest-layout>
    @push('css')
        <style>
            /* Si algo falla con GSAP, a los 2 segundos se muestra todo automáticamente */
            .opacity-0 {
                animation: forceVisible 0.5s forwards 2s;
            }

            @keyframes forceVisible {
                to {
                    opacity: 1;
                }
            }
        </style>
    @endpush
    {{-- 1. HEADER HERO --}}
    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <h1 class="gsap-title opacity-0 text-4xl md:text-5xl font-black text-white mb-4">
                {{ __('reviws_title') }}
            </h1>
            <p class="gsap-subtitle opacity-0 text-slate-400 max-w-2xl mx-auto text-lg">
                {{ __('revies_description') }}
            </p>
        </div>
    </div>

    {{-- 2. SECCIÓN DE CONTENIDO (GRID) --}}
    <section class="py-12 md:py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            {{-- GRID LAYOUT: 1 Columna en Móvil, 3 Columnas en Desktop --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                {{-- COLUMNA IZQUIERDA (1/3): Formulario --}}
                <div class="lg:col-span-1 gsap-form-col opacity-0">
                    {{-- 'sticky top-8' hace que el formulario te siga al bajar --}}
                    <div class="sticky top-8 space-y-6">

                        {{-- Tarjeta del Formulario --}}
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                            <div class="flex items-center gap-3 mb-6 border-b border-slate-100 pb-4">
                                <div
                                    class="size-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 shrink-0">
                                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900">{{ __('reviws_title_form') }}</h3>
                                </div>
                            </div>

                            {{-- Componente Livewire del Formulario --}}
                            @livewire('comments.form-comments')
                        </div>

                        {{-- Nota decorativa opcional --}}
                        <div class="bg-blue-600 rounded-xl p-6 text-white text-center shadow-lg shadow-blue-600/20">
                            <p class="font-bold text-lg mb-1">{{ __('reviews_help_title') }}</p>
                            <p class="text-blue-100 text-sm">{{ __('reviews_help_description') }}</p>
                        </div>
                    </div>
                </div>

                {{-- COLUMNA DERECHA (2/3): Lista de Comentarios --}}
                <div class="lg:col-span-2 gsap-comments-col">
                    {{-- El componente Livewire de adentro SÍ tendrá opacity-0, eso está bien --}}
                    @livewire('comments.view-comments')
                </div>

            </div>
        </div>
    </section>

    @push('js')
        <script>
            // --- Función Maestra de Animación ---
            function refreshAnimations() {
                if (typeof gsap === 'undefined') return;

                // 1. Animar el Contenedor Principal de Comentarios (Si está invisible)
                const container = document.querySelector('.gsap-comments.opacity-0');
                if (container) {
                    gsap.to(container, {
                        y: 0,
                        opacity: 1,
                        duration: 0.5,
                        ease: "power3.out",
                        startAt: {
                            y: 15,
                            opacity: 0
                        }
                    });
                }

                // 2. Animar los Items de Comentarios (Si están invisibles)
                const items = document.querySelectorAll('.gsap-comment-item.opacity-0, .gsap-empty.opacity-0');
                if (items.length > 0) {
                    gsap.to(items, {
                        y: 0,
                        opacity: 1,
                        stagger: 0.1,
                        duration: 0.5,
                        ease: "power3.out",
                        startAt: {
                            y: 20,
                            opacity: 0
                        }
                    });
                }

                // 3. Animar el Formulario (Si está invisible - carga inicial)
                const form = document.querySelector('.gsap-form-col .bg-white'); // Asumiendo que la tarjeta del form es blanca
                if (form && window.getComputedStyle(form).opacity === '0') {
                    gsap.to(form, {
                        opacity: 1,
                        x: 0,
                        duration: 1
                    });
                }
            }

            // --- Eventos ---

            // 1. Carga inicial de la página
            document.addEventListener("DOMContentLoaded", () => {
                // Animaciones iniciales generales (Header, etc)
                if (typeof gsap !== 'undefined') {
                    gsap.to(".gsap-title", {
                        y: 0,
                        opacity: 1,
                        startAt: {
                            y: 30,
                            opacity: 0
                        }
                    });
                    gsap.to(".gsap-subtitle", {
                        y: 0,
                        opacity: 1,
                        delay: 0.2,
                        startAt: {
                            y: 20,
                            opacity: 0
                        }
                    });

                    // Animamos las columnas
                    gsap.fromTo(".gsap-form-col", {
                        x: -30,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 1
                    });
                    gsap.fromTo(".gsap-comments-col", {
                        y: 30,
                        opacity: 0
                    }, {
                        y: 0,
                        opacity: 1,
                        duration: 1,
                        delay: 0.2
                    });
                }

                // Ejecutar revisión de contenidos
                setTimeout(refreshAnimations, 100);
            });

            // 2. Escuchar CUALQUIER actualización de Livewire (Paginación, Envío, etc.)
            document.addEventListener('livewire:init', () => {
                Livewire.hook('commit', ({
                    succeed
                }) => {
                    succeed(() => {
                        // Esperamos un micro-momento a que el DOM se pinte y animamos lo nuevo
                        setTimeout(refreshAnimations, 50);
                    });
                });
            });
        </script>
        {{-- Script Específico para conectar Google Recaptcha con Livewire --}}
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>

        <script>
            function iniciarEnvio() {
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                            action: 'submit'
                        })
                        .then(function(token) {
                            // Disparamos un evento personalizado de navegador
                            window.dispatchEvent(new CustomEvent('captcha-token-received', {
                                detail: {
                                    token: token
                                }
                            }));
                        })
                        .catch(function(error) {
                            alert('Error al conectar con Google.');
                        });
                });
            }
        </script>
    @endpush
</x-guest-layout>
