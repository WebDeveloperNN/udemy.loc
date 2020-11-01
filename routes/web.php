<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PostsController;


Route::post('/post/store', [PostsController::class, 'store'])->name('post.store');
Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::get('/post/{category?}/{title?}', [PostsController::class, 'index'])->name('post.index');






// Plan
Route::view('/plan', 'plan');
