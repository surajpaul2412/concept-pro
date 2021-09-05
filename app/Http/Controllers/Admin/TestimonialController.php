<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Storage;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
            'designation'=> 'required||min:3|max:255',
            'review'=>'required|min:2',
            'avatar'=> 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $image_name = $request->avatar;
        $image = $request->file('avatar');
        if($image != ''){
            $image_name = Storage::disk('public')->put('avatar', $image);
        }

        $testimonial = new Testimonial([
            'name' => $request->name,
            'designation' => $request->designation,
            'review' => $request->review,
            'avatar' => $image_name,
            'status' => 1,
        ]);
        $testimonial->save();
        return redirect('/admin/testimonials')->with('success', 'Testimonial has been added.');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
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
            'designation'=> 'required||min:3|max:255',
            'review'=>'required|min:2',
            'avatar'=> 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'hidden_avatar'=> 'nullable|string',
        ]);

        $image_name = $request->hidden_avatar;
        $image = $request->file('avatar');
        if($image != ''){
            $image_name = Storage::disk('public')->put('avatar', $image);
        }

        $form_data = array(
            'name' => $request->name,
            'designation' => $request->designation,
            'review' => $request->review,
            'avatar' => $image_name,
            'status' => $request->status,
        );

        Testimonial::whereId($id)->update($form_data);
        return redirect('/admin/testimonials')->with('success', 'Testimonial has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return redirect('/admin/testimonials')->with('success', 'Testimonial deleted successfully.');
    }

    public function deactivate($id){
        Testimonial::whereId($id)->update(['status'=>0]);
        return redirect('/admin/testimonials')->with('success', 'Testimonial has been De-activated.');
    }

    public function activate($id){
        Testimonial::whereId($id)->update(['status'=>1]);
        return redirect('/admin/testimonials')->with('success', 'Testimonial has been Activated.');
    }
}
