<div class="gsap-comments opacity-0 bg-white py-12 rounded-2xl shadow-sm border border-slate-100 p-6 md:p-10">

    <div class="mb-8 border-b border-slate-100 pb-4">
        <h3 class="gsap-comment-header opacity-0 text-2xl font-bold text-slate-900 flex items-center gap-2">
            <svg class="size-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            {{ __('reviews_view_title') }}
            {{-- Usamos total() para ver la cantidad real en la BD --}}
            <span class="text-slate-400 text-lg font-normal">({{ $comments->total() }})</span>
        </h3>
    </div>

    <div class="space-y-6">
        @forelse ($comments as $comment)
            {{-- IMPORTANTE: wire:key es vital para que Livewire no pierda el rastro en la paginación --}}
            <div wire:key="comment-{{ $comment->id }}" class="gsap-comment-item opacity-0 flex gap-4 items-start">
                <div class="shrink-0">
                    <img class="size-10 rounded-full bg-slate-100 object-cover border border-slate-200"
                        src="https://ui-avatars.com/api/?name={{ urlencode($comment->name ?? 'User') }}&color=3b82f6&background=eff6ff"
                        alt="{{ $comment->name ?? 'Usuario' }}">
                </div>

                <div class="flex-1 bg-slate-50 p-4 rounded-2xl rounded-tl-none border border-slate-100">
                    <div class="flex justify-between items-baseline mb-2">
                        <h4 class="font-bold text-slate-900 text-sm">
                            {{ $comment->name ?? 'Usuario Anónimo' }}
                        </h4>
                        <span class="text-xs text-slate-400">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $comment->comment }} {{-- Asegúrate que tu campo se llame 'comment' o 'body' --}}
                    </p>
                </div>
            </div>
        @empty
            <div
                class="gsap-empty opacity-0 text-center py-10 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                <div class="inline-flex bg-white p-3 rounded-full shadow-sm mb-3">
                    <svg class="size-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-slate-900 font-medium">{{ __('reviews_view_table_1') }}</h3>
                <p class="text-slate-500 text-sm mt-1">{{ __('reviews_view_table_2') }}</p>
            </div>
        @endforelse
    </div>

    {{-- Paginación --}}
    <div class="mt-8 pt-6 border-t border-slate-100">
        {{ $comments->links() }}
    </div>
</div>
