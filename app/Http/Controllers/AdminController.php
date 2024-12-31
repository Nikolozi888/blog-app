<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($id)
    {
        $admin = User::find($id);

        if (!$admin) {
            abort(404, 'Admin not found');
        }

        $users = User::latest()->get()->filter(function ($user) use ($admin) {
            return $user->id !== $admin->id;
        });

        $posts = Post::latest()->get();

        return view('profiles.admin_profile', [
            'admin' => $admin,
            'users' => $users,
            'posts' => $posts,
        ]);
    }

}
