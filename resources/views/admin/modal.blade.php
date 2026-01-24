<x-w-modal-card title="Revisión de Comentario" wire:model="openModal" align="center">
    <div class="space-y-4">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <span>Contenido original del usuario:</span>
        </div>

        <div class="bg-gray-50 rounded-lg p-2 border border-gray-100">
            <x-w-textarea disabled wire:model="commentBody" rows="5"
                class="border-none bg-transparent shadow-none focus:ring-0 text-gray-700 italic" />
        </div>

        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-2">
            <x-w-button wire:click="closeModal" label="Cancelar" flat secondary />

            <div class="flex gap-2">
                <x-w-button wire:click="reject" label="Rechazar" icon="x-mark" red outline />
                <x-w-button wire:click="approve" label="Validar" icon="check" green />
            </div>
        </div>
    </div>
</x-w-modal-card>
