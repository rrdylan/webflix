<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home',[
        'title' => 'Webflix',
        'numbers' => [1,2,3],
    ]);
});

Route::get('/Billy/{friend?}', function(Request $request, string $friend = null){
    return view('billy', [
    'name'=> 'Billy',
    'age' => Carbon::parse('1996-1-1')->age,
    'friend' => ucfirst($friend),
    ]);
});

Route::get('/Philippe', function(){
    return view('philippe');
});

Route::get('/a-propos/{user?}', function(string $user = null){
    $team = ['Billy', 'Bob', 'Olaf'];
    if( isset($user) && !in_array($user, $team)){
        abort(404);
    }

    return view('a-propos',[
        'name'=>'A propos',
        'team'=> $team,
        'user'=>ucfirst($user), 
    ]);
});