<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test($id){
        // return '我是控制器';
        return view('test')->with(['id' => $id,'msg'=>'hello msg']);

    }
    public function hello(){
        return 'HELLO ';
    }
}
