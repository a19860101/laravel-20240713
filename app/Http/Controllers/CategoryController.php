<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $categories = DB::table('categories')->get();
        // $categories = Category::all();
        // $categories = Category::get();
        $categories = Category::orderBy('id','DESC')->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // DB::table('categories')->insert([
        //     'title'     => $request->title,
        //     'slug'      => $request->slug,
        //     'created_at'=> now(),
        //     'updated_at'=> now(),
        // ]);

        // 方法一
        // $category = new Category;
        // $category->title = $request->title;
        // $category->slug = $request->slug;
        // $category->save();

        // 方法二
        // $category = new Category;
        // $category -> fill([
        //     'title' => $request->title,
        //     'slug'  => $request->slug
        // ]);
        // $category->save();

        // 方法三
        // $category = new Category;
        // $category->fill($request->all());
        // $category->fill($request->except(['_token']));
        // $category->save();

        Category::create($request->except(['_token']));
        // Category::create($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        return $category->id;

        DB::table('categories')->where('id',$category->id)->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'updated_at' => now()
        ]);
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();

        return redirect()->route('category.index');

    }
}
