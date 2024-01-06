<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Category;
use App\Models\Tags;

use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news=News::all();
        $tags=Tags::all();
        return view('admin.news.show', compact('news', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tags::all();
        return view('admin.news.add', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
            'composer_id' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'status' => 'required',
            'slug' => 'required',
        ]);

        News::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'composer_id'=>$request->composer_id,
            'category_id'=>$request->category_id,
            'tag_id'=>$request->tag_id,
            'status'=>$request->status,
            'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Add', 'تم إضافة الخبر بنجاح');
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
        $categories=Category::all();
        $tags=Tags::all();
        $new = News::findOrFail($id);
        return view('admin.news.edit', compact('new', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $new = News::findorFail($id);

        $new->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'composer_id'=>$request->composer_id,
            'category_id'=>$request->category_id,
            'tag_id'=>$request->tag_id,
            'status'=>$request->status,
            'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Edit', 'تم تعديل الخبر بنجاح');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        News::findorFail($id)->first()->delete();
        session()->flash('delete', 'تم حذف التصنيف بنجاح');
        return back();
    }
}
