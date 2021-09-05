<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSolutionSection;
use Storage;
use File;

class SiteSolutionSectionController extends Controller
{
    public function index(){
        $siteSolutionSection = SiteSolutionSection::all();
        return view('admin.siteSolutionSection.index',compact('siteSolutionSection'));
    }

    public function create(){
        return view('admin.siteSolutionSection.create');
    }

    public function store(Request $request){
        $request->validate([
            'heading'=>'required|min:2|max:255',
            'content'=>'required|min:2',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('products', $image);
        }
        
        $product = new SiteSolutionSection([
            'heading' => $request->heading,
            'content' => $request->content,
            'image' => $image_name
        ]);
        $product->save();
        return redirect('/admin/siteSolutionSection')->with('success', 'New Section has been added.');
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
        $siteSolutionSection = SiteSolutionSection::findOrFail($id);
        return view('admin.siteSolutionSection.edit',compact('siteSolutionSection'));
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
            'heading'=>'required|min:2|max:255',
            'content'=>'required|min:2',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_image'=> 'nullable|string'
        ]);

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = Storage::disk('public')->put('products', $image);
        }

        $form_data = array(
            'heading' => $request->heading,
            'content' => $request->content,
            'image' => $image_name,
        );
        SiteSolutionSection::whereId($id)->update($form_data);
        return redirect('/admin/siteSolutionSection')->with('success', 'Site Solution Section has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SiteSolutionSection::findOrFail($id)->delete();
        return redirect('/admin/siteSolutionSection')->with('success', 'Site Solution Section deleted successfully.');
    }
}
