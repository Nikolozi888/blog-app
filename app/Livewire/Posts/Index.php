<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Index extends Component
{

    public $posts, $categories;

    public $selectedCategory = null;

    public function mount()
    {
        $this->posts = Post::with('category')->latest()->get();
        $this->categories = Category::with('posts')->latest()->get();
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $this->posts = $category->posts;

        $this->selectedCategory = $category->id ?? null;
    }



    public function render()
    {
        return view('livewire.posts.index');
    }
}
