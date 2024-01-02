<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
            'category_description' => 'required',
        ]);

        Category::create([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
        ]);

        // return redirect('/cpanel/category/show');

        session()->flash('Add', 'تم إضافة التصنيف بنجاح');
        return back();
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
    public function edit($id)
    {
        // $id = $request->id;
        // $category = Category::where('id', $id)->first();

        $category = Category::findOrFail($id);

        // $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // $category = Category::findOrFail($request->id);
        return $id;
/*
        $category = Category::findorFail($id);
        $category->update([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'parent_id'=>$request->parent_id,
        ]);

        session()->flash('Edit', 'تم تعديل التصنيف بنجاح');
        return back();
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Category::findorFail($id)->delete();

        // $id = $request->id;
        // $category = Category::where('id', $id)->delete();

        session()->flash('delete', 'تم حذف التصنيف بنجاح');
        return back();  

    }
}
