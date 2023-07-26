<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
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

Route::get('/', [HomeController::class,'index']);

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

Route::get('/about/{user?}', [AboutController::class, 'index']);