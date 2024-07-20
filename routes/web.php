<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/test/{id}', function ($id) {
    // return view('test',['id' => $id]);
    // return view('test')->with(['id' => $id,'msg'=>'hello msg']);
    // return view('test',compact('id'));

    
// });
// Route::get('/test',[TestController::class,'test']);

Route::get('/test/{id}',[App\Http\Controllers\TestController::class,'test']);
Route::get('/hello',[TestController::class,'hello']);

Route::get('/about/{id}',function($id){
    return 'about -- '.$id;
});
Route::get('/',function(){
    return view('home');
});
Route::get('/news',function(){
    return view('news');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post',[PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}',[PostController::class, 'show'])->name('post.show');
Route::delete('/post/{id}',[PostController::class, 'destroy'])->name('post.delete');