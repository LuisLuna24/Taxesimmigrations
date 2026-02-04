<div>
    @if ($successMessage)
        <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-xl border border-green-100 flex items-center gap-3">
            <p class="font-bold text-sm">{{ __('reviws_form_susses') }}</p>
        </div>
    @endif

    {{-- Cargamos el script de Google v3 con tu SITEKEY --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('NOCAPTCHA_SITEKEY') }}"></script>

    <form wire:submit.prevent="save" class="space-y-5"
          x-data="{
            submitForm() {
                grecaptcha.ready(() => {
                    grecaptcha.execute('{{ env('NOCAPTCHA_SITEKEY') }}', {action: 'submit'}).then((token) => {
                        // Pasamos el token a Livewire y llamamos al método save
                        $wire.set('captcha_token', token);
                        $wire.save();
                    });
                });
            }
          }">

        {{-- Campos de entrada --}}
        <div>
            <label class="block text-sm font-medium text-slate-700">{{ __('reviws_label_1') }}</label>
            <input type="text" wire:model="name" class="w-full rounded-lg border-slate-200 text-sm">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">{{ __('reviws_label_2') }}</label>
            <input type="text" wire:model="email" class="w-full rounded-lg border-slate-200 text-sm">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">{{ __('reviws_label_3') }}</label>
            <textarea wire:model="comment" rows="4" class="w-full rounded-lg border-slate-200 text-sm"></textarea>
            @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        @error('captcha_token')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror

        {{-- BOTÓN: Ahora llama a la función de Alpine en lugar de submit directo --}}
        <button type="button"
            @click="submitForm()"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg flex justify-center items-center gap-2 disabled:opacity-50"
            wire:loading.attr="disabled">

            <span wire:loading.remove>{{ __('reviws_form_button_1') }}</span>
            <span wire:loading>{{ __('reviws_form_button_2') }}</span>
        </button>
    </form>
</div>
