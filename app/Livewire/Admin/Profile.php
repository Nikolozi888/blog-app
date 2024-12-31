<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $tab = null;
    public $tabname = 'control';
    public $queryString = ['tab' => ['keep' => true]];

    public $postId, $post;

    public $posts, $users, $admin;
    public $user_id, $category_id, $slug, $title, $excerpt, $body, $thumbnail;
    public $name, $username, $email, $password, $bio, $picture;

    public function mount()
    {

        $this->user_id = null;
        $this->category_id = null;


        $this->tab = request('tab') ? request('tab') : $this->tabname;
        $this->admin = User::where('id', auth()->user()->id)->first();
        $this->posts = Post::latest()->get();
        $this->users = User::latest()->get();

        $this->name = $this->admin->name;
        $this->username = $this->admin->username;
        $this->email = $this->admin->email;
        $this->password = $this->admin->password;
        $this->bio = $this->admin->bio;
        $this->picture = $this->admin->picture;

        if ($this->postId) {
            $this->post = Post::find($this->postId);

            if ($this->post) {
                $this->slug = $this->post->slug;
                $this->title = $this->post->title;
                $this->excerpt = $this->post->excerpt;
                $this->body = $this->post->body;
            } else {
                session()->flash('error', 'Post not found!');
            }
        }
    }

    public function selectTab($tab, $variables = null)
    {
        $this->tab = $tab;

        if ($variables) {
            $this->postId = $variables;
            $this->post = Post::find($this->postId);
        }
    }




    public function createPost()
    {
        $validatedData = $this->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image',
        ]);

        if ($this->thumbnail) {
            $uniqueName = uniqid() . '-' . $this->thumbnail->getClientOriginalName();
            $thumbnailPath = $this->thumbnail->storeAs('images', $uniqueName, 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        Post::create($validatedData);

        $this->reset(['user_id', 'category_id', 'slug', 'title', 'excerpt', 'body', 'thumbnail']);
        session()->flash('success', 'Post created successfully!');
        $this->tab = 'all_posts';
    }

    public function addAdmin()
    {
        $attributes = $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        $attributes['role'] = 'admin';
        User::create($attributes);

        $this->reset(['name', 'username', 'email']);
        session()->flash('success', 'Admin added successfully!');
        $this->tab = 'all_users';
    }

    public function addCategory()
    {
        $attributes = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
        ]);

        Category::create($attributes);
        $this->reset(['name', 'slug']);
        session()->flash('success', 'Category added successfully!');
        $this->tab = 'control';
    }

    public function editProfile()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->admin->id,
            'bio' => 'nullable|string|max:500',
            'picture' => 'nullable|image',
        ]);

        if ($this->picture) {
            $uniqueName = uniqid() . '.' . $this->picture->extension();
            $validatedData['picture'] = $this->picture->storeAs('images', $uniqueName, 'public');
        }

        $this->admin->update($validatedData);

        $this->tab = 'control';
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $post->delete();
            session()->flash('success', 'Post deleted successfully!');
        } else {
            session()->flash('error', 'Post not found!');
        }

        $this->posts = Post::latest()->get();
        $this->tab = 'all_posts';
    }

    public function editPost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $this->postId = $post->id;
            $this->user_id = $post->user_id;
            $this->category_id = $post->category_id;
            $this->slug = $post->slug;
            $this->title = $post->title;
            $this->excerpt = $post->excerpt;
            $this->body = $post->body;
            $this->thumbnail = $post->thumbnail;

            $this->tab = 'edit_post';
        } else {
            session()->flash('error', 'Post not found!');
        }
    }


    public function savePost()
    {
        $validatedData = $this->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $this->postId,
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image',
        ]);

        if ($this->thumbnail) {
            $uniqueName = uniqid() . '-' . $this->thumbnail->getClientOriginalName();
            $thumbnailPath = $this->thumbnail->storeAs('images', $uniqueName, 'public');
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        $post = Post::find($this->postId);
        if ($post) {
            $post->update($validatedData);
            session()->flash('success', 'Post updated successfully!');
            $this->tab = 'all_posts'; // Redirect back to all posts tab
        } else {
            session()->flash('error', 'Post not found!');
        }

        $this->tab = 'all_posts';
    }


    public function render()
    {
        return view('livewire.admin.profile', [
            'users' => User::latest()->get(),
            'categories' => Category::latest()->get(),
        ]);
    }

}
