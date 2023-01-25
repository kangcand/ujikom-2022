<?php

namespace App\Http\Controllers\Backend;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Session;
use Str;
use Validator;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $categories = ArticleCategory::all();
        return view('admin.articleCategory.index', compact('no', 'categories'));
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
            'name' => 'required|unique:article_categories',
        ];

        $message = [
            'name.required' => 'Nama Kategori Tidak Boleh Kosong',
            'name.unique' => 'Nama Kategori tidak boleh sama',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $categories = new ArticleCategory;
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name, '-');
        $categories->save();
        Alert::success('Good Job', 'data saved successfully');
        return redirect()->route('article-category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
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
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $categories = ArticleCategory::findOrFail($id);
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name, '-');
        $categories->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data edited successfully",
        ]);
        return redirect()->route('article-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!ArticleCategory::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Good Job', 'Data deleted successfully');
        return redirect()->route('article-category.index');
    }
}
