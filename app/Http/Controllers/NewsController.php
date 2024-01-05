<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news=News::all();
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Category::all();
        return view('admin.news.add', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
        ]);

        News::create([
            'title'=>$request->title,
            'content'=>$request->content,
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
        $parents=Category::all();
        $new = News::findOrFail($id);
        return view('admin.news.edit', compact('new', 'parents'));
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
