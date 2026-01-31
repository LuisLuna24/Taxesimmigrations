<x-app-layout title="Panel" :breadcrumbs="[
    [
        'name' => 'Dashboard',
    ],
]">
    <div class="flex items-center justify-between mb-8 pb-5 border-b border-gray-200 dark:border-gray-800">
        <div class="min-w-0 flex-1">
            <h1
                class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                {{ __('Panel') }}
            </h1>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('dashboard.comment-stats')

            <div class="mt-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
