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

    <section id="services-section" class="py-10 bg-slate-50 relative" x-data="{
        search: '',
        isLoaded: false,
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

                <div class="relative max-w-2xl mx-auto">
                    <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input x-model="search" type="text" placeholder="{{ __('services_search_placeholder') }}"
                        class="block w-full pl-14 pr-12 py-4 bg-white border border-slate-200 rounded-2xl text-slate-900 shadow-sm focus:ring-4 focus:ring-blue-900/5 focus:border-blue-900 transition-all outline-none" />
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <template x-for="(service, index) in filteredServices" :key="service.title">
                    <article x-show="isLoaded" x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 transform translate-y-8"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        :style="'transition-delay: ' + (index * 100) + 'ms'"
                        class="bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-md hover:shadow-xl transition-all duration-300 flex flex-col md:flex-row h-full group">

                        <div class="relative w-full md:w-2/5 h-56 md:h-auto overflow-hidden">
                            <img :src="service.image" :alt="service.title"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-blue-900/10 group-hover:bg-transparent transition-colors">
                            </div>
                        </div>

                        <div class="p-8 md:w-3/5 flex flex-col">
                            <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-900 transition-colors"
                                x-text="service.title"></h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6" x-text="service.desc"></p>

                            <ul class="space-y-3 mb-8 flex-1">
                                <template x-for="feature in service.features" :key="feature">
                                    <li class="flex items-center gap-3 text-sm font-semibold text-slate-700">
                                        <div
                                            class="flex-shrink-0 w-5 h-5 rounded-full bg-blue-50 flex items-center justify-center text-blue-900">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <span x-text="feature"></span>
                                    </li>
                                </template>
                            </ul>
                            <div x-show="service.alert" class="mb-6 pt-4 border-t border-red-100">
                                <p x-text="service.alert"
                                    class="text-[11px] uppercase tracking-wider font-bold text-red-600 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                                    Disclaimer
                                </p>
                            </div>
                        </div>
                    </article>
                </template>
            </div>

            <div class="text-center mt-16 opacity-0 translate-y-4 anim-header" style="transition-delay: 600ms">
                <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}"
                    class="inline-flex items-center px-10 py-4 bg-blue-900 hover:bg-red-800 text-white font-black rounded-2xl transition-all shadow-lg uppercase tracking-widest text-xs">
                    {{ __('services_cta_btn') }}
                    <svg class="h-4 w-4 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
