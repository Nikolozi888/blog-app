<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class UserController extends Controller
{
    public function index($id) {
        $user = User::where('id', $id)->first();

        $likedItems = Cart::instance('wishlist')->content();

        return view('profiles.user_profile', [
            'user' => $user,
            'likedItems' => $likedItems
        ]);
    }

    public function welcome($id) {

        $user = User::where('id', $id)->first();

        Mail::to($user->email)->send(new WelcomeMail([
            'name' => $user->name,
        ]));

        return redirect()->route('home');
    }

}
