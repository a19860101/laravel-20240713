<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test(){
        return '我是控制器';
    }
    public function hello(){
        return 'HELLO ';
    }
}
