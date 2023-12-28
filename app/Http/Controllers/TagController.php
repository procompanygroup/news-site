<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags; 

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'tag_name' => 'required|unique:tags',
            'tag_description' => 'required',
            'media_id' => 'required',
        ]);

        Tags::create([
            'tag_name'=>$request->tag_name,
            'tag_description'=>$request->tag_description,
            'media_id'=>$request->media_id,  
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
        $tag = Tags::findorFail($id);

        $tag->update([
            'tag_name'=>$request->tag_name,
            'tag_description'=>$request->tag_description,
            'media_id'=>$request->media_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tags::findorFail($id)->delete();
    }
}
