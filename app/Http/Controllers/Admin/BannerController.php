<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Storage;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('order','asc')->get();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'heading'=>'nullable|min:3',
            'sub_heading'=>'nullable|min:3|max:255',
            'btn_url'=>'nullable|min:3|max:255',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'bg'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'url'=> 'nullable|min:3',
            'order'=>'nullable|integer'
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('banner', $image);
        }

        $bg_name = $request->bg;
        $bg = $request->file('bg');
        if($bg != ''){
            $bg_name = Storage::disk('public')->put('banner', $bg);
        }

        $banner = new Banner([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'btn_url' => $request->btn_url,
            'image' => $image_name,
            'bg' => $bg_name,
            'url' => $request->url,
            'order' => $request->order,
        ]);
        $banner->save();
        return redirect('/admin/banner')->with('success', 'Banner has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
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
            'heading'=>'nullable|min:3',
            'sub_heading'=>'nullable|min:3|max:255',
            'btn_url'=>'nullable|min:3|max:255',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_image'=> 'nullable|string',
            'bg'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_bg'=> 'nullable|string',
            'url'=> 'nullable|min:3',
            'order'=>'nullable|integer'
        ]);

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('banner', $image);
        }

        $bg_name = $request->hidden_bg;
        $bg = $request->file('bg');
        if($bg != ''){
            $bg_name = Storage::disk('public')->put('banner', $bg);
        }

        $form_data = array(
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'btn_url' => $request->btn_url,
            'image' => $image_name,
            'bg' => $bg_name,
            'url' => $request->url,
            'order' => $request->order,
        );

        Banner::whereId($id)->update($form_data);
        return redirect('/admin/banner')->with('success', 'Banner has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();
        return redirect('/admin/banner')->with('success', 'Banner deleted successfully.');
    }
}
