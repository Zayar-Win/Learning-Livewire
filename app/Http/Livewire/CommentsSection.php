<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentsSection extends Component
{
    public $successMessage;
    public $post;
    public $comment;

    protected $rules = [
        'comment' => 'required|min:4'
    ];

    public $names = ['zayarwin','user','guest'];

    public function postComment()
    {
        $this->validate();

        $randomIndex = rand(0, count($this->names)) - 1;

        Comment::create([
            'post_id' => $this->post->id,
            'username' => $this->names[$randomIndex === -1 ? 0 : $randomIndex],
            'content' => $this->comment,
        ]);

        $this->post->refresh();
        $this->comment = '';

        $this->successMessage = 'Comment created success';

    }

    public function render()
    {
        return view('livewire.comments-section');
    }
}
