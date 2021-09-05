<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryItem;
use Storage;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('order','asc')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        
        $category = new Category([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
        ]);
        $category->save();
        return redirect('/admin/category')->with('success', 'Product category has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
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
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
        );

        Category::whereId($id)->update($form_data);
        return redirect('/admin/category')->with('success', 'Product category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/admin/category')->with('success', 'Product category deleted successfully.');
    }

    public function createSubCategory($id)
    {
        return view('admin.category.createSubCategory',compact('id'));
    }

    public function storeSubCategory(Request $request, $id)
    {
        $request->validate([
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
        
        $categoryItem = new CategoryItem([
            'category_id' => $id,
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
        ]);
        $categoryItem->save();
        return redirect('/admin/category/'.$id)->with('success', 'Sub category has been added.');
    }

    public function editSubCategory($id)
    {
        $category = CategoryItem::findOrFail($id);
        return view('admin.category.editSubCategory',compact('id','category'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $request->validate([
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

        $form_data1 = array(
            'category_id' => $request->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
        );
        CategoryItem::whereId($id)->update($form_data1);
        return redirect('/admin/category/'.$request->id)->with('success', 'Sub category has been updated.');
    }

    public function destroySubCategory($id)
    {
        $categoryItem = CategoryItem::findOrFail($id);
        $categoryId = $categoryItem->category_id;
        $categoryItem->delete();
        return redirect('/admin/category/'.$categoryId)->with('success', 'Sub category deleted successfully.');
    }
}
