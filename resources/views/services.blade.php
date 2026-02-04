<x-guest-layout>
    @php
        $servicesData = [
            [
                'title' => __('srv_imm_title'),
                'image' => asset('img/inmigracion.webp'),
                'desc' => __('srv_imm_desc'),
                'tags' => 'immigration visa eb1 eb2 tps residency status inmigración residencia',
                'alert' => __('srv_imm_alert'),
                'features' => [__('srv_imm_1'), __('srv_imm_2'), __('srv_imm_3'), __('srv_imm_4'), __('srv_imm_5')],
            ],
            [
                'title' => __('srv_tax_title'),
                'image' => asset('img/Impuestos.webp'),
                'desc' => __('srv_tax_desc'),
                'tags' => 'taxes impuestos personales corporativos itin business tax empresa',
                'features' => [__('srv_tax_1'), __('srv_tax_2'), __('srv_tax_3'), __('srv_tax_4')],
            ],
            [
                'title' => __('srv_acc_title'),
                'image' => asset('img/Accidentes.webp'),
                'desc' => __('srv_acc_desc'),
                'tags' => 'accidents accidentes transito personal ticket licencia dui auto coche',
                'features' => [
                    __('srv_acc_1'),
                    __('srv_acc_2'),
                    __('srv_acc_3'),
                    __('srv_acc_4'),
                    __('srv_acc_5'),
                    __('srv_acc_6'),
                    __('srv_acc_7'),
                    __('srv_acc_8'),
                    __('srv_acc_9'),
                    __('srv_acc_10'),
                    __('srv_acc_11'),
                ],
            ],
            [
                'title' => __('srv_notary_title'),
                'image' => asset('img/Notary Public.webp'),
                'desc' => __('srv_notary_desc'),
                'tags' => 'notaria notary apostilla matrimonio divorcio documentos legal wedding',
                'features' => [__('srv_notary_1'), __('srv_notary_2'), __('srv_notary_3')],
            ],
            [
                'title' => __('srv_other_title'),
                'image' => asset('img/other.webp'),
                'desc' => __('srv_other_desc'),
                'tags' => 'notaria notary apostilla matrimonio divorcio documentos legal wedding',
                'features' => [
                    __('srv_other_1'),
                    __('srv_other_2'),
                    __('srv_other_3'),
                    __('srv_other_4'),
                    __('srv_other_5'),
                    __('srv_other_6'),
                    __('srv_other_7'),
                    __('srv_other_8'),
                ],
            ],
        ];
    @endphp

    <section id="services-section" class="py-12 bg-slate-50 relative" x-data="{
        search: '',
        isLoaded: false,
        selectedService: null,
        services: {{ json_encode($servicesData) }},
        get filteredServices() {
            if (this.search === '') return this.services;
            const term = this.search.toLowerCase();
            return this.services.filter(service =>
                service.title.toLowerCase().includes(term) ||
                service.tags.toLowerCase().includes(term)
            );
        }
    }" x-init="gsap.to('.anim-header', { opacity: 1, y: 0, duration: 0.8, delay: 0.2 });
    setTimeout(() => { isLoaded = true; }, 400);">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            <div class="text-center max-w-4xl mx-auto mb-16 anim-header opacity-0 translate-y-4">
                <h2 class="text-red-700 font-bold tracking-[0.2em] uppercase text-xs mb-4">
                    {{ __('services_eyebrow') }}
                </h2>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 tracking-tight">
                    {{ __('services_title') }} <br />
                    <span class="text-blue-900">{{ __('services_subtitle') }}</span>
                </h1>

                <div class="relative max-w-xl mx-auto">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input x-model="search" type="text" placeholder="{{ __('services_search_placeholder') }}"
                        class="block w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-full text-slate-900 shadow-sm focus:ring-4 focus:ring-blue-900/10 focus:border-blue-900 transition-all outline-none" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
                <template x-for="(service, index) in filteredServices" :key="service.title">
                    <article x-show="isLoaded" x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform translate-y-8"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col h-full group relative">

                        <div class="relative w-full h-56 overflow-hidden">
                            <img :src="service.image" :alt="service.title"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60 group-hover:opacity-40 transition-opacity">
                            </div>
                            <h3 class="absolute bottom-4 left-6 text-2xl font-bold text-white drop-shadow-md"
                                x-text="service.title"></h3>
                        </div>

                        <div class="p-6 flex flex-col flex-1">
                            <p class="text-slate-600 text-sm leading-relaxed mb-4 line-clamp-3" x-text="service.desc">
                            </p>

                            <ul class="space-y-2 mb-6">
                                <template x-for="feature in service.features.slice(0, 4)" :key="feature">
                                    <li class="flex items-start gap-2 text-xs font-semibold text-slate-700">
                                        <svg class="flex-shrink-0 w-4 h-4 text-green-500 mt-0.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span x-text="feature"></span>
                                    </li>
                                </template>
                            </ul>

                            <div class="mb-4" x-show="service.features.length > 4">
                                <button @click="selectedService = service"
                                    class="text-blue-900 text-xs font-bold uppercase tracking-wider hover:underline flex items-center gap-1">
                                    Ver lista completa
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>

                            <div class="mt-auto pt-4 border-t border-slate-100">
                                <button @click="selectedService = service"
                                    class="w-full py-2 mb-3 rounded-xl bg-blue-50 text-blue-900 text-sm font-bold hover:bg-blue-100 transition-colors">
                                    Más Información
                                </button>

                                <div x-show="service.alert" class="bg-red-50 p-3 rounded-lg border border-red-100">
                                    <p
                                        class="text-[10px] uppercase tracking-wider font-bold text-red-600 flex items-center gap-2 mb-1">
                                        <span class="w-1.5 h-1.5 bg-red-600 rounded-full animate-pulse"></span>
                                        Importante
                                    </p>
                                    <p x-text="service.alert" class="text-[10px] text-red-800 leading-tight"></p>
                                </div>
                            </div>
                        </div>
                    </article>
                </template>
            </div>

            <div class="text-center mt-16 opacity-0 translate-y-4 anim-header" style="transition-delay: 600ms">
                <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}"
                    class="inline-flex items-center px-10 py-4 bg-blue-900 hover:bg-red-800 text-white font-black rounded-2xl transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 uppercase tracking-widest text-xs">
                    {{ __('services_cta_btn') }}
                    <svg class="h-4 w-4 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>

        <div x-show="selectedService" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">

            <div x-show="selectedService" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-slate-900/75 backdrop-blur-sm transition-opacity"
                @click="selectedService = null"></div>

            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div x-show="selectedService" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">

                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4" x-if="selectedService">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-2xl font-bold leading-6 text-slate-900" id="modal-title"
                                        x-text="selectedService.title"></h3>
                                    <button @click="selectedService = null"
                                        class="text-slate-400 hover:text-slate-500">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="relative w-full h-48 rounded-xl overflow-hidden mb-6">
                                    <img :src="selectedService.image" class="w-full h-full object-cover">
                                </div>

                                <p class="text-sm text-slate-500 mb-6" x-text="selectedService.desc"></p>

                                <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wide mb-3">Servicios
                                    Incluidos:</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                                    <template x-for="feature in selectedService.features" :key="feature">
                                        <div
                                            class="flex items-center gap-2 text-sm text-slate-700 bg-slate-50 p-2 rounded border border-slate-100">
                                            <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span x-text="feature"></span>
                                        </div>
                                    </template>
                                </div>

                                <div x-show="selectedService.alert"
                                    class="bg-red-50 p-4 rounded-xl border border-red-100 flex gap-3">
                                    <svg class="h-6 w-6 text-red-600 flex-shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <div>
                                        <h5 class="text-sm font-bold text-red-800 mb-1">Nota Importante</h5>
                                        <p x-text="selectedService.alert" class="text-xs text-red-700"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}"
                            class="inline-flex w-full justify-center rounded-xl bg-blue-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 sm:ml-3 sm:w-auto">
                            Contactar Ahora
                        </a>
                        <button type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto"
                            @click="selectedService = null">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
