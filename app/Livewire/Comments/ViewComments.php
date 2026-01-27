<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\WithPagination;
use Livewire\Component;

class ViewComments extends Component
{
    use WithPagination;
    public function render()
    {
        $comments = Comment::where('status', 1)->latest()->paginate(5, pageName: "comments-page");
        return view('livewire.comments.view-comments', [
            'comments' => $comments,

        ]);
    }
}
