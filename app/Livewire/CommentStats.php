<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class CommentStats extends Component
{
    // Escuchar eventos para actualizar los números si un comentario se valida/elimina
    #[On('comment-updated')]
    public function render()
    {
        $stats = [
            'pending'  => Comment::where('status', 0)->count(),
            'approved' => Comment::where('status', 1)->count(),
            'rejected' => Comment::where('status', 2)->count(),
        ];

        return view('livewire.comment-stats', [
            'stats' => $stats
        ]);
    }
}
