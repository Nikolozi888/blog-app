<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{


    public function create(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string',
            'author_name' => 'nullable|string',
            'created_at' => 'nullable|date',
            'excerpt' => 'nullable|string',
            'thumbnail' => 'nullable|string',
        ]);

        Cart::instance('wishlist')->add(
            $validated['id'],
            $validated['title'],
            1,
            0,
            [
                'author_name' => $validated['author_name'],
                'created_at' => $validated['created_at'],
                'excerpt' => $validated['excerpt'],
                'thumbnail' => $validated['thumbnail']
            ]
        )->associate('App\Models\Post');


        return redirect()->back();
    }




    public function destroy($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }
}
