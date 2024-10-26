<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $contact_input=ContactUs::latest()->get();
        return view('admin.pages.contact.manage',compact('contact_input'));
    }
    //End Method
    public function store(Request $request){
        ContactUs::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'subject'=>$request->input('subject'),
            'massage'=>$request->input('massage'),
            'created_at'=>now(),
        ]);
        return redirect()->back()->with('success', 'Your testimonial has been submitted successfully!');

    }
    //End Method
    public function show($id){
        $contact_views=ContactUs::findOrFail($id);
        return view('admin.pages.contact.view',compact('contact_views'));
    }
    //End Method
    public function destroy($id){
        ContactUs::findOrFail($id)->delete();
        $notification = array(
            'message'=>'آیتم حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    //End Method
}
