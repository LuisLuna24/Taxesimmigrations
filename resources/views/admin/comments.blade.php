<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(key: 'Comments') }}
        </h2>
    </x-slot>

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
