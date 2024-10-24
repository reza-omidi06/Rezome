<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_massage=Testimonial::latest()->get();
        return view('admin.pages.testimonial.manage',compact('view_massage'));
        //
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
        if($request->file('testimonial_image')){

            $img_req=$request->file('testimonial_image');
            $generate_testimonial=time().'.'.$img_req->getClientOriginalExtension();
            Image::make($img_req)->resize(90,90)->save('uploads/testimonial/'.$generate_testimonial);
            $testimonial_path='uploads/testimonial/'.$generate_testimonial;
            Testimonial::create([
                'testimonial_customer'=>$request->input('testimonial_customer'),
                'testimonial_comment'=>$request->input('testimonial_comment'),
                'testimonial_mail'=>$request->input('testimonial_mail'),
                'testimonial_phone'=>$request->input('testimonial_phone'),
                'testimonial_profession'=>$request->input('testimonial_profession'),
                'testimonial_image'=>$testimonial_path,
                'testimonial_status'=>0,
            ]);
        }
        else{
            Testimonial::create([
                'testimonial_customer'=>$request->input('testimonial_customer'),
                'testimonial_comment'=>$request->input('testimonial_comment'),
                'testimonial_mail'=>$request->input('testimonial_mail'),
                'testimonial_phone'=>$request->input('testimonial_phone'),
                'testimonial_profession'=>$request->input('testimonial_profession'),
                'testimonial_status'=>0,
            ]);
        }
        return redirect()->back()->with('success', 'Your testimonial has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $show_massage=Testimonial::findOrFail($id);
        return view('admin.pages.testimonial.view',compact('show_massage'));
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
    public function Show(Request $request){
        $request_id=$request->input('id');
        $request_active=Testimonial::findOrFail($request_id);
        $request_active->update([
            'testimonial_status'=>'1'
        ]);
        $notification = array(
            'message' => ' فعال شد',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.testimonial.manage')->with($notification);
    }
    public function Hidden(Request $request){
        $request_id=$request->input('id');
        $request_inactive=Testimonial::findOrFail($request_id);
        $request_inactive->update([
            'testimonial_status'=>'0'
        ]);
        $notification = array(
            'message' => 'غیر فعال شد',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.testimonial.manage')->with($notification);

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
        $notification = array(
            'message'=>'آیتم حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);

    }
}
