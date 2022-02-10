<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use Auth;
use Illuminate\Http\Request;
use Session;
use Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $articles = Article::all();
        return view('admin.article.index', compact('articles', 'no'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ArticleCategory::all();
        $tag = ArticleTag::all();
        return view('admin.article.create', compact('category', 'tag'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'foto' => 'required|image|max:2048',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title, '-') . Str::random(6);
        $article->user_id = Auth::user()->id;
        $article->content = $request->content;
        // upload image / foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/article/', $name);
            $article->foto = $name;
        }
        $article->category_id = $request->category_id;
        // dd($article->foto);
        $article->save();
        $article->ArticleTag()->attach($request->tags);

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "data berhasil dibuat",
        ]);
        return redirect()->route('article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ArticleCategory::all();
        $tag = ArticleTag::all();
        $article = Article::findOrFail($id);
        $selectTag = ArticleTag::with('article')->pluck('id')->toArray();
        return view('admin.article.edit', compact('article', 'tag', 'category', 'selectTag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $request->validate([
            'title' => 'required|',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            // 'foto' => 'required|image|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->slug = Str::slug($request->title, '-') . Str::random(6);
        $article->user_id = Auth::user()->id;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        // upload image / foto
        if ($request->hasFile('foto')) {
            $article->deleteImage();
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/article/', $name);
            $article->foto = $name;
        }

        $article->save();
        $article->ArticleTag()->sync($request->tags);
        // dd($request->image);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data edited successfully",
        ]);
        return redirect()->route('article.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->deleteImage();
        $article->delete();
        $article->ArticleTag()->detach();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('article.index');

    }
}
