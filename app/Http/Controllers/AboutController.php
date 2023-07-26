<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $team = ['Billy', 'Bob', 'Olaf'];
    public function index(string $user = null){
        

        if( isset($user) && !in_array($user, $this->team)){
            abort(404);
        }
    
        return view('about',[
            'name'=>'A propos',
            'team'=> $this->team,
            'user'=>ucfirst($user), 
        ]);
    }
}
