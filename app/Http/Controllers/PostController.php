<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
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
        $categories = Category::get();
        return view('post.create',compact('categories'));
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
        // DB::table('posts')->insert([
        //     'title' => $request->title,
        //     'body'  => $request->body,
        //     'category_id' => $request->category_id,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        Post::create($request->except(['_token']));
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 方法一
        // $post = DB::select('SELECT * FROM posts WHERE id = ?',[$id]);

        // 方法二
        $post = DB::table('posts')->find($id);
        
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = DB::table('posts')->find($id);
        $categories = Category::get();

        return view('post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 方法一
        // DB::update('UPDATE posts SET title=?,body=?,updated_at=? WHERE id=?',[
        //     $request->title,
        //     $request->body,
        //     now(),
        //     $id
        // ]);
        

        // 方法二
        DB::table('posts')->where('id',$id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'updated_at' => now(),
        ]);
        return redirect()->route('post.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //方法一
        DB::delete('DELETE FROM posts WHERE id = ?',[$id]);
        //方法二
        // DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('post.index');
    }
}
