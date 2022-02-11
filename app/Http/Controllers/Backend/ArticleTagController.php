<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Session;
use Str;

class ArticleTagController extends Controller
{

    public function index()
    {
        $no = 1;
        $tags = ArticleTag::all();
        return view('admin.articleTag.index', compact('no', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|numeric|unique:article_tags',
        ]);

        $tags = new ArticleTag;
        $tags->name = $request->name;
        $tags->slug = Str::slug($request->name, '-');
        $tags->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('article-tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleTag  $ArticleTag
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleTag $ArticleTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleTag  $ArticleTag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleTag  $ArticleTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tags = ArticleTag::findOrFail($id);
        $tags->name = $request->name;
        $tags->slug = Str::slug($request->name, '-');
        $tags->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data edited successfully",
        ]);
        return redirect()->route('article-tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleTag  $ArticleTag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!ArticleTag::destroy($id)) {
            return redirect()->back();
        }
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('article-tag.index');
    }
}
