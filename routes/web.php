<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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