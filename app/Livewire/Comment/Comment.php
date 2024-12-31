<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Post;

class Comment extends Component
{

    public Post $post;

    public $body;


    public function create() {
        $this->validate([
            'body' => 'required|min:3|max:200'
        ]);

        $this->post->comments()->create([
            'body' => $this->body,
            'user_id' => auth()->id(),
        ]);


        $this->body = '';
    }


    public function getCommentsProperty()
    {
        return $this->post->comments()->latest()->get();
    }


    public function render()
    {
        return view('livewire.comment.comment');
    }
}
