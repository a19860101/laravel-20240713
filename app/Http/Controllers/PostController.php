<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //方法一
        // $posts = DB::select('SELECT * FROM posts');

        //方法二
        $posts = DB::table('posts')->get();
        // return $posts;

        // return view('post.index',['posts' => $posts]);
        // return view('post.index')->with(['posts' => $posts]);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 方法一
        // DB::insert('INSERT INTO posts(title,body)VALUES(?,?)',[
        //     $request->title,
        //     $request->body
        // ]);

        // 方法二
        DB::table('posts')->insert([
            'title' => $request->title,
            'body'  => $request->body,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
