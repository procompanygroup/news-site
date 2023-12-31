<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.category.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
            'category_description' => 'required',
            'create_user_id' => 'required',
            'update_user_id' => 'required',
            'parent_id' => 'required',
            'media_id' => 'required',
        ]);

        Category::create([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'create_user_id'=>$request->create_user_id,
            'update_user_id'=>$request->update_user_id,
            'parent_id'=>$request->update_user_id,
            'media_id'=>$request->update_user_id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $category = Category::findorFail($id);

        $category->update([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'create_user_id'=>$request->create_user_id,
            'update_user_id'=>$request->update_user_id,
            'parent_id'=>$request->parent_id,
            'media_id'=>$request->media_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::findorFail($id)->delete();
    }
}
