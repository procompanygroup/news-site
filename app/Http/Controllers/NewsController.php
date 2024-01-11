<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Category;
use App\Models\Tags;
use App\Models\NewsTags;
use App\Models\User;

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

        // $composers = News::with('users')->get();
        // return $composers;
        // foreach($composers as $composer ){
        //     $c=$composer["users.user_name"];
        // }


        $composers = DB::table('news')
            ->join('categories', 'categories.id', 'news.category_id')
            ->join('users', 'users.id', 'news.composer_id')
            ->select('news.title', 'news.content', 'news.status', 'news.slug', 'categories.category_name', 'users.user_name')
            ->get('news.title', 'news.content', 'news.status', 'news.slug', 'categories.category_name', 'users.user_name');

            // $data['composer_id'] = auth()->users()->id;
            // $name = User::where('id', $data)->get('user_name');
            
            // $cat_data['category_id'] = categories()->id;
            // $cat_name = Category::where('id', $cat_data)->get('category_name');

        return view('admin.news.show', compact('news', 'tags', 'composers'));
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
    public function store(Request $request) 
    {
        // return dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
            'composer_id' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'slug' => 'required',
        ]);

        News::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'composer_id'=>$request->composer_id,
            'category_id'=>$request->category_id,
            'status'=>$request->status,
            'slug'=>Str::slug($request->slug),
        ]);

        foreach($request->tag_id as $tag)
        {
            $news = News::latest()->first()->id;
            NewsTags::create([
                'news_id'=> $news,
                'tag_id'=> $tag,
            ]);
        }

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
