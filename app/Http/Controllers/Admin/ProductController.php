<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryItem;
use App\Models\ProductVideo;
use App\Models\ProductDownload;
use Storage;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('order','asc')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('order','asc')->get();
        $categoriesItems = CategoryItem::orderBy('order','asc')->get();
        return view('admin.product.create',compact('categories','categoriesItems'));
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
            'categoryItem_id'=>'nullable',
            'name'=>'required|min:3|max:255',
            'SKU'=>'required|string',
            'slug'=>'required|min:2',
            'description'=>'required|min:2',
            'overview'=>'nullable',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'meta_title'=>'nullable',
            'meta_keyword'=>'nullable',
            'meta_desc'=>'nullable',
            'order'=>'required|integer',
            'buy'=>'nullable|string',
            'upload_url'=>'nullable|array',
            'downloads'=>'nullable|array',
            'youtube_url'=>'nullable|array',
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('products', $image);
        }
        
        $product = new Product([
            'category_id' => $request->category_id,
            'categoryItem_id' => $request->categoryItem_id,
            'name' => $request->name,
            'SKU' => $request->SKU,
            'slug' => $request->slug,
            'description' => $request->description,
            'overview' => $request->overview,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
            'url' => $request->buy,
        ]);
        $product->save();

        if($request->youtube_url) {
            foreach ($request->youtube_url as $key => $url) {
                $productUrl = new ProductVideo();
                $productUrl->product_id = $product->id;
                $productUrl->type = $request->type[$key];
                $productUrl->url = $url;
                $productUrl->save();
            }
        }

        if($request->hasfile('upload_url')) {
            foreach ($request->file('upload_url') as $key1 => $file) {
                $productVideo = new ProductVideo();
                $productVideo->product_id = $product->id;
                $productVideo->type = $request->type1[$key1];
                $productVideo->name = $file->getClientOriginalName();
                $productVideo->url = Storage::disk('public')->put('productVideos', $file);
                $productVideo->save();
            }
        }

        if($request->downloads) {
            foreach ($request->downloads as $download) {
                $downloads = new ProductDownload();
                $downloads->product_id = $product->id;
                $downloads->name = $download->getClientOriginalName();
                $downloads->url = Storage::disk('public')->put('productDocs', $download);
                $downloads->save();
            }
        }

        return redirect('/admin/product')->with('success', 'Product has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('order','asc')->get();
        $categoriesItems = CategoryItem::orderBy('order','asc')->get();
        return view('admin.product.edit', compact('product','categories','categoriesItems'));
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
            'categoryItem_id'=>'nullable',
            'name'=>'required|min:3|max:255',
            'SKU'=>'required|string',
            'slug'=>'required|min:2',
            'description'=>'required|min:2',
            'overview'=>'nullable',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_image'=> 'nullable|string',
            'meta_title'=>'nullable',
            'meta_keyword'=>'nullable',
            'meta_desc'=>'nullable',
            'order'=>'required|integer',
            'buy'=>'nullable|integer',
        ]);
        // dd($request->all());

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('products', $image);
        }

        $form_data = array(
            'category_id' => $request->category_id,
            'categoryItem_id' => $request->categoryItem_id,
            'name' => $request->name,
            'SKU' => $request->SKU,
            'slug' => $request->slug,
            'description' => $request->description,
            'overview' => $request->overview,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
            'order' => $request->order,
            'url' => $request->buy,
        );
        Product::whereId($id)->update($form_data);

        // Download
        if($request->hidden_downloads){
            foreach($request->hidden_downloads as $hidden_download){
                ProductDownload::whereProductId($id)->whereUrl($hidden_download)->update(['is_updated'=>1]);
            }
            ProductDownload::whereProductId($id)->whereIsUpdated(null)->delete();
            ProductDownload::whereProductId($id)->update(['is_updated'=>null]);
        }
        if($request->downloads) {
            foreach ($request->downloads as $download) {
                $downloads = new ProductDownload();
                $downloads->product_id = $id;
                $downloads->name = $download->getClientOriginalName();
                $downloads->url = Storage::disk('public')->put('productDocs', $download);
                $downloads->save();
            }
        }

        // Video
        if($request->hidden_youtube_url){
            foreach($request->hidden_youtube_url as $hidden_youtube){
                ProductVideo::whereProductId($id)->whereUrl($hidden_youtube)->update(['is_updated'=>1]);
            }
        }
        if($request->hidden_upload_url){
            foreach($request->hidden_upload_url as $hidden_upload){
                ProductVideo::whereProductId($id)->whereUrl($hidden_upload)->update(['is_updated'=>1]);
            }
        }
        ProductVideo::whereProductId($id)->whereIsUpdated(null)->delete();
        ProductVideo::whereProductId($id)->update(['is_updated'=>null]);
        if($request->youtube_url) {
            foreach ($request->youtube_url as $key => $url1) {
                if($url1){
                    $productUrl = new ProductVideo();
                    $productUrl->product_id = $id;
                    $productUrl->type = 1;
                    $productUrl->url = $url1;
                    $productUrl->save();
                }
            }
        }
        if($request->hasfile('upload_url')) {
            foreach ($request->file('upload_url') as $key1 => $file1) {
                if($file1){
                    $productVideo = new ProductVideo();
                    $productVideo->product_id = $id;
                    $productVideo->type = 2;
                    $productVideo->name = $file1->getClientOriginalName();
                    $productVideo->url = Storage::disk('public')->put('productVideos', $file1);
                    $productVideo->save();
                }
            }
        }
        return redirect('/admin/product')->with('success', 'Product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/admin/product')->with('success', 'Product deleted successfully.');
    }
}
