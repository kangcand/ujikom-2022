<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Session;
use Str;

class ProductTagController extends Controller
{
    public function index()
    {
        $no = 1;
        $tags = ProductTag::all();
        return view('admin.productTag.index', compact('no', 'tags'));
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
            'name' => 'required|unique:product_tags',
        ]);

        $tags = new ProductTag;
        $tags->name = $request->name;
        $tags->slug = Str::slug($request->name, '-');
        $tags->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('product-tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTag  $ProductTag
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTag $ProductTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTag  $ProductTag
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
     * @param  \App\Models\ProductTag  $ProductTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tags = ProductTag::findOrFail($id);
        $tags->name = $request->name;
        $tags->slug = Str::slug($request->name, '-');
        $tags->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data edited successfully",
        ]);
        return redirect()->route('product-tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTag  $ProductTag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!ProductTag::destroy($id)) {
            return redirect()->back();
        }
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('product-tag.index');
    }
}
