<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    $title = 'Webflix';

    return view('home', [
        'title' => $title,
        'numbers' => [1, 2, 3],
    ]);
});

Route::get('/fiorella/{friend?}', function (Request $request, string $friend = null) {
    // Pour les paramètres get...
    dump($_GET['color'] ?? null); // Ancienne méthode...
    dump($request->input('color', 'rose')); // Nouvelle méthode...
    dump(request('color')); // Méthode rapide...

    return view('fiorella', [
        'age' => Carbon::parse('2019-12-31')->age,
        'color' => $request->input('color', 'rose'),
        'friend' => ucfirst($friend),
    ]);
});
