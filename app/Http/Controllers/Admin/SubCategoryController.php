<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryItem;
use Storage;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryItem::orderBy('order','asc')->get();
        return view('admin.subCategory.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('order','asc')->get();
        return view('admin.subCategory.create',compact('categories'));
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
            'category_id'=>'required|integer',
            'name'=>'required|min:3|max:255',
            'slug'=>'required|min:2',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'meta_title'=>'nullable',
            'meta_keyword'=>'nullable',
            'meta_desc'=>'nullable',
            'order'=>'required|integer',
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('products', $image);
        }
        
        $subCategory = new CategoryItem([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
        ]);
        $subCategory->save();
        return redirect('/admin/subCategory')->with('success', 'Sub Category has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('order','asc')->get();
        $category = CategoryItem::findOrFail($id);
        return view('admin.subCategory.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'=>'required|integer',
            'name'=>'required|min:3|max:255',
            'slug'=>'required|min:2',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_image'=> 'nullable|string',
            'meta_title'=>'nullable',
            'meta_keyword'=>'nullable',
            'meta_desc'=>'nullable',
            'order'=>'required|integer',
        ]);

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('products', $image);
        }

        $form_data = array(
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
        );

        CategoryItem::whereId($id)->update($form_data);
        return redirect('/admin/subCategory')->with('success', 'Sub category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryItem::findOrFail($id)->delete();
        return redirect('/admin/subCategory')->with('success', 'Sub Category deleted successfully.');
    }
}
