<?php

namespace App\Http\Controllers\Backend;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Str;
use Validator;

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
        $rules = [
            'name' => 'required|unique:article_tags',
        ];

        $message = [
            'name.required' => 'Nama Tag Tidak Boleh Kosong',
            'name.unique' => 'Nama Tag tidak boleh sama',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $tags = new ArticleTag;
        $tags->name = $request->name;
        $tags->slug = Str::slug($request->name, '-');
        $tags->save();
        Alert::success('Good Job', 'data saved successfully');
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
        $rules = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'Nama Tag Tidak Boleh Kosong',
            // 'name.unique' => 'Nama Tag tidak boleh sama',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $tags = ArticleTag::findOrFail($id);
        $tags->name = $request->name;
        $tags->slug = Str::slug($request->name, '-');
        $tags->save();
        Alert::success('Good Job', 'data edited successfully');
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
        Alert::success('Good Job', 'data deleted successfully');
        return redirect()->route('article-tag.index');
    }
}
