<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(){
        return view('actors.index',[
            'actors' => Actor::paginate(10)
        ]);
    }

    public function show(string $id){
        $actor = Actor::findOrFail($id);

        return view('actors.show', ['actor'=> $actor]);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
}
