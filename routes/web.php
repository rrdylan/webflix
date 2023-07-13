<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\FiorellaFriendController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/fiorella/{friend?}', [FiorellaFriendController::class, 'show']);

Route::get('/a-propos', [AboutController::class, 'index']);
Route::get('/a-propos/{user}', [AboutController::class, 'show']);

Route::get('/categories', function () {
    return Category::all();
});

Route::get('/category-test', function () {
    $category = new Category();
    $category->name = 'Action';
    $category->save();

    return $category;
});
