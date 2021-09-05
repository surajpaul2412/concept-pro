<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryItem;

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
        return view('frontend.categorty',compact('categories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::orderBy('order','asc')->get();
        $category = Category::findOrFail($id);

        if(count($category->categoryItems) != 0){
            return view('frontend.categortyItem',compact('category','categories'));       
        }else{
            $products = Product::whereCategoryId($id)->orderBy('order','asc')->get();
            return view('frontend.product',compact('category','categories','products'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function product($id)
    {
        $categories = Category::orderBy('order','asc')->get();
        $categoryItem = CategoryItem::findOrFail($id);
        $products = Product::where('categoryItem_id',$id)->orderBy('order','asc')->get();

        return view('frontend.categoryProduct',compact('categoryItem','categories','products'));
    }

    public function detail($id)
    {
        $categories = Category::orderBy('order','asc')->get();
        $product = Product::findOrFail($id);
        return view('frontend.detail',compact('product','categories'));
    }
}
