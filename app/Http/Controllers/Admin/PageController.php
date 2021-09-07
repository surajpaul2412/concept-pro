<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Storage;
use File;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'title'=>'required|min:3|max:255',
            'content'=> 'required||min:3',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'slug'=>'required|min:2',
            'meta_title'=>'nullable|string',
            'meta_keyword'=>'nullable|string',
            'meta_desc'=>'nullable|string'
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('page', $image);
        }

        $page = new Page([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
        ]);
        $page->save();
        return redirect('/admin/page')->with('success', 'Page has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit', compact('page'));
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
            'title'=>'required|min:3|max:255',
            'content'=> 'required||min:3',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_image'=> 'nullable|string',
            'slug'=>'required|min:2',
            'meta_title'=>'nullable|string',
            'meta_keyword'=>'nullable|string',
            'meta_desc'=>'nullable|string'
        ]);

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('page', $image);
        }

        $form_data = array(
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'image' => $image_name,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_desc' => $request->meta_desc,
        );
        Page::whereId($id)->update($form_data);

        return redirect('/admin/page')->with('success', 'Page has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return redirect('/admin/page')->with('success', 'Page deleted successfully.');
    }
}
