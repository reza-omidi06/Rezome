<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //***************About Manager & update***************
    public function AboutManager(){
        $about_manager=About::find(1)->first();
        return view('admin.pages.about.manager',compact('about_manager'));
    }
    //End Method
    public function AboutUpdate(Request $request){
        $request->validate([
            'file_pdf' => 'nullable|file|mimes:pdf,zip',
            'image_about' => 'nullable|file|max:1024|mimes:png,webp,jpeg',
        ]);
        $find_about_id=$request->id;
        if($request->file('image_about')){
            $image_file=$request->file('image_about');
            $name_genarator=time().'.'.$image_file->getClientOriginalExtension();
            Image::make($image_file)->resize(683,854)->save('uploads/about/'.$name_genarator);
            $image_path='uploads/about/'.$name_genarator;
            About::findOrFail($find_about_id)->update([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'btn_name'=>$request->input('btn_name'),
                'image_about'=>$image_path,
            ]);
        }
        elseif ($request->file('file_pdf')){
            $file_pdf=$request->file('file_pdf');
            $pdf_genarator=time().'.'.$file_pdf->getClientOriginalExtension();
            $file_pdf->move(public_path('uploads/about'), $pdf_genarator);
            $file_path ='uploads/about/' . $pdf_genarator;
            About::findOrFail($find_about_id)->update([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'btn_name'=>$request->input('btn_name'),
                'file_pdf'=>$file_path,
            ]);
        }
        else{
            About::findOrFail($find_about_id)->update([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'btn_name'=>$request->input('btn_name'),
            ]);
        }

        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    //End Method
    //***************Skill Manager,Add ,Edit & Delete***************
    public function SkillManager(){
        $manage_skils=Skill::latest()->get();
        return view('admin.pages.about.skills.manage',compact('manage_skils'));
    }
    //End Method
    public function SkillAdd(){
        return view('admin.pages.about.skills.add');
    }
    //End Method
    public function SkillStore(Request $request){

        Skill::create([
            'skill_name'=>$request->input('skill_name'),
            'skill_name_en'=>$request->input('skill_name_en'),
            'skill_percentage'=>$request->input('skill_percentage'),
            'description'=>$request->input('description'),
            'created_at'=>now(),
        ]);
        $notification = array(
            'message'=>'مهارت درج شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.skill.manager')->with($notification);
    }
    //End Method

    public function SkillEdit($id){
        $skill_edit=Skill::findOrFail($id);
        return view('admin.pages.about.skills.edit',compact('skill_edit'));

    }
    //End Method
    public function SkillUpdate(Request $request){
        $update_skill=$request->id;

        Skill::findOrFail($update_skill)->update([
            'skill_name'=>$request->input('skill_name'),
            'skill_name_en'=>$request->input('skill_name_en'),
            'skill_percentage'=>$request->input('skill_percentage'),
            'description'=>$request->input('description'),
            'updated_at'=>now(),
        ]);
        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.skill.manager')->with($notification);
    }
    //End Method
    public function SkillDelete($id){
        Skill::findOrFail($id)->delete();
        $notification = array(
            'message'=>'ایتم مورد نظر حذف شد',
            'alert-type'=>'danger'
        );
        return redirect()->route('admin.skill.manager')->with($notification);
    }
    //End Method
    //End Method
}
