<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Admin\RecipeController;
//use App\Http\Controllers\VisitorRecipeController;
//use App\Http\Controllers\TagController;
//use App\Http\Controllers\ImageController;

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

/* Route::prefix('admin')->group(function(){
    Route::resource('recipes', RecipeController::class);
    Route::resource('tags', TagController::class);
}); */

// Admin grouped routes
Route::group(['namespace'=>'App\Http\Controllers\Admin','prefix'=>'admin','as'=>'admin.'], function(){
    //recipes
    Route::get('recipes/{recipe}/editimage', [App\Http\Controllers\Admin\RecipeController::class, 'editImage'])->name('recipes.editimage');
    Route::resource('recipes', 'RecipeController');
    //tags
    Route::resource('tags', 'TagController');
    //images
    Route::post('images/store', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('images.store');
    Route::delete('images/{image}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('images.destroy');

        });

//visitor grouped routes
Route::group(['namespace'=>'App\Http\Controllers\Visitor','prefix'=>'visitor','as'=>'visitor.'], function(){
    //recipes 
    Route::get('index', [App\Http\Controllers\Visitor\RecipeController::class, 'index'])->name('recipes.index');
    Route::get('recipes/{recipe}/show', [App\Http\Controllers\Visitor\RecipeController::class, 'show'])->name('recipes.show');
    //comments and replies
    Route::post('comment/store', [App\Http\Controllers\Visitor\CommentController::class, 'store'])->name('comment.store');
    Route::post('reply/store', [App\Http\Controllers\Visitor\CommentController::class, 'replyStore'])->name('reply.store');
    Route::get('recipes/{recipe}/comment/count', [App\Http\Controllers\Visitor\CommentController::class, 'commentCount'])->name('comment.count');
    //ratings
    Route::post('rating/store', [App\Http\Controllers\Visitor\RatingController::class, 'store'])->name('rating.store');

        });
// OLD ROUTES
//recipes
//Route::resource('recipes', RecipeController::class);


//tags 
//Route::resource('tags', TagController::class);


//Route::get('recipes/{recipe}/editimage', [RecipeController::class, 'editImage'])->name('recipes.editimage');

// deleting an image from editimage page
//Route::post('images/store', [ImageController::class, 'store'])->name('images.store');
//Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');
