<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use DB;
use Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny',Post::class);
        //方法一
        // $posts = DB::select('SELECT * FROM posts');

        //方法二
        // $posts = DB::table('posts')->get();

        $posts = Post::get();

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

        $post = new Post;
        $post->fill($request->except(['_token','tag']));
        $post->user_id = Auth::id();
        $post->save();

        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel);
        }
        
        // Post::create($request->except(['_token']));
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $this->authorize('view',Post::find($id));
        // 方法一
        // $post = DB::select('SELECT * FROM posts WHERE id = ?',[$id]);

        // 方法二
        // $post = DB::table('posts')->find($id);

        $post = Post::find($id);
        
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $this->authorize('view',Post::find($id));

        //
        // $post = DB::table('posts')->find($id);
        $post = Post::find($id);
        $categories = Category::get();

        return view('post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update',Post::find($id));
        // 方法一
        // DB::update('UPDATE posts SET title=?,body=?,updated_at=? WHERE id=?',[
        //     $request->title,
        //     $request->body,
        //     now(),
        //     $id
        // ]);
        

        // 方法二
        // DB::table('posts')->where('id',$id)->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'category_id' => $request->category_id,
        //     'updated_at' => now(),
        // ]);

        $post = Post::find($id);
        $post->fill($request->except(['_token','_method','tag']));
        $post->tags()->detach();
        $post->save();

        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel);
        }

        return redirect()->route('post.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Gate::inspect('delete', Post::find($id));

        // return $response;
        if($response->allowed()){

        }else{
            // echo $response->message();
            abort(403,'dont');
        }
        return;
        // $this->authorize('delete',Post::find($id));
        // if(Auth::user()->cannot('delete',Post::find($id))){
        //     abort(403,'您沒有權限執行此動作');
        // }

        //方法一
        DB::delete('DELETE FROM posts WHERE id = ?',[$id]);
        //方法二
        // DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('post.index');
    }
}
