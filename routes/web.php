<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post',[PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}',[PostController::class, 'show'])->name('post.show');
Route::delete('/post/{id}',[PostController::class, 'destroy'])->name('post.delete');
Route::get('/post/{id}/edit',[PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/{id}',[PostController::class, 'update'])->name('post.update');

// Route::resource('/category',CategoryController::class)->middleware('auth');
// Route::group(['middleware' => 'auth'],function(){
//     Route::resource('/category',CategoryController::class)->except('index','store');
// });
Route::middleware('auth')->group(function(){
    Route::resource('/category',CategoryController::class)->except('index','store');
});
Route::resource('/category',CategoryController::class)->only('index','store');


// Tag
Route::resource('/tag',TagController::class);