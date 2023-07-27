<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        foreach($cart as $item){
            $item['movie']  = Movie::find($item['id']);
            
        }

        return view('cart', ['cart' => $cart]);
    }

    public function store(Movie $movie)
    {
        $cart =session('cart', []);

        if(collect($cart)->contains('id', $movie->id)){
            $index = array_search($movie->id, array_column($cart, 'id'));
            $cart[$index]['quantity']++;
            session()->put('cart', $cart);

            return back();

        }
        session()->push('cart', [
            'id'=> $movie->id,
            'quantity' => 1,
            'movie' => null,
        ]);

        return back();
    }
}
