<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/test/{id}', function ($id) {
    // return view('test',['id' => $id]);
    return view('test')->with(['id' => $id,'msg'=>'hello msg']);
    // return view('test',compact('id'));
    
});
Route::get('/about/{id}',function($id){
    return 'about -- '.$id;
});