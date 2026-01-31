<div class="flex items-center space-x-2">
    <x-w-button wire:click="validateCommet({{ $comment->id }})" blue xs>Validar</x-w-button>
    <x-w-button onclick="confirmDelete({{ $comment->id }})" red xs>
        Eliminar
    </x-w-button>
</div>
