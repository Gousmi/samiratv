<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\VisitorRecipeController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function(){ return view('layouts/visitor/main');});

//Route::get('recipes/create', [App\Http\Controllers\RecipeController::class, 'create']);

//recipes
Route::resource('recipes', RecipeController::class);


//tags 
Route::resource('tags', TagController::class);

//visitor routes
Route::get('index', [VisitorRecipeController::class, 'index'])->name('homepage');