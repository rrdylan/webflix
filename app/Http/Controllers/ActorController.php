<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function index(){
        return view('actors.index',[
            'actors' => Actor::paginate(10)
        ]);
    }

    public function show(string $id){
        $actor = Actor::findOrFail($id);
        $movie = $actor->movies;

        return view('actors.show', [
            'actor'=> $actor,
            'movies'=>$movie,
        ]);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request, Actor $actor)
    {
        $request->validate([
            'name'=> 'required|unique:actors',
            'profil'=>'nullable|image',
            'biography'=>'required',
            'birthday'=>'date',
            'deathday'=>'nullable',
            'origin'=>'nullable',
        ]);

        Actor::create([
            'name'=> $request->input('name'),
            'biography' => $request->input('biography'),
            'birthday' => $request->input('birthday'),
            'deathday' => $request->input('birthday') ?? null,
            'origin' => $request->input('origin') ?? null,

        ]);

        //Remplacer l'image s'il y'en a une 
        if($request->hasFile('profil')){
            Storage::delete(str($actor->cover)->remove('/storage/'));
            $validated['profil'] = '/storage/'.$request->file('profil')->store('actors');
        }

        $actor->update($validated);

        return redirect('/actors');
    }
}
