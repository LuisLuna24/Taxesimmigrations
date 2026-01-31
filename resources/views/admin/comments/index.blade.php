<x-app-layout title="Panel" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => 'admin.dashboard'
    ],
    [
        'name' => 'Comentarios',
    ],
]">
    <div class="flex items-center justify-between mb-8 pb-5 border-b border-gray-200 dark:border-gray-800">
        <div class="min-w-0 flex-1">
            <h1
                class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:truncate sm:text-3xl sm:tracking-tight">
                {{ __('Comments') }}
            </h1>
        </div>
    </div>

    <div>
        <x-w-card>
            @livewire('datatables.comment-table')
        </x-w-card>
    </div>
    @push('js')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esta acción!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Llamamos al método de Livewire manualmente
                        window.Livewire.dispatch('deleteComment', {
                            id: id
                        });
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
