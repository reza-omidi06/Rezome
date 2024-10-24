<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Rezome;
use App\Models\RezomeTitle;
use Illuminate\Http\Request;

class RezomeController extends Controller
{
    //Show Rezome Manager

    public function RezomeManager(){
        $rezome_manage=Rezome::latest()->get();
        $rezome_header = RezomeTitle::latest()->first();
        return view('admin.pages.rezome.manage',compact('rezome_manage','rezome_header'));
    }
    //Show Add Manager

    public function RezomeAdd (){

        return view('admin.pages.rezome.add');

    }
    // Make a serious record for your resume
    public function RezomeStore(Request $request){
        Rezome::create([
            'jobـposition'=>$request->input('jobـposition'),
            'jobـposition_en'=>$request->input('jobـposition_en'),
            'title'=>$request->input('title'),
            'description_rezome'=>$request->input('description_rezome'),
            'Jobـstartـdate'=>$request->input('Jobـstartـdate'),
            'Jobـendـdate'=>$request->input('Jobـendـdate'),
            'status'=>1,
            'created_at'=>now(),
        ]);
        $notification = array(
            'message'=>' درج شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.rezome.manage')->with($notification);
    }
    //Show Edit Manager

    public function RezomeEdit($id){
        $edit_rezome=Rezome::findOrFail($id);
        return view('admin.pages.rezome.edit',compact('edit_rezome'));
    }
    //Update  Rezome
    public function RezomeUpdate(Request $request){
        $rezome_update=$request->id;
        Rezome::findOrFail($rezome_update)->update([
            'jobـposition'=>$request->input('jobـposition'),
            'jobـposition_en'=>$request->input('jobـposition_en'),
            'title'=>$request->input('title'),
            'description_rezome'=>$request->input('description_rezome'),
            'Jobـstartـdate'=>$request->input('Jobـstartـdate'),
            'Jobـendـdate'=>$request->input('Jobـendـdate'),
            'updated_at'=>now(),
        ]);
        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.rezome.manage')->with($notification);
    }
    //Show Delete Manager
    public function RezomeDelete($id){
        Rezome::findOrFail($id)->delete();
        $notification = array(
            'message'=>'ایتم مورد نظر حذف شد',
            'alert-type'=>'danger'
        );
        return redirect()->route('admin.rezome.manage')->with($notification);
    }
    // Update Rezome Title
    public function RezomeTitle(Request $request){
        RezomeTitle::updateOrCreate([
            'title'=>$request->input('title'),
            'sub_title'=>$request->input('sub_title'),
            'created_at'=>now(),
        ]);
        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    //Rezome_Active
    public function RezomeActive(Request $request){
        $request_id=$request->input('id');
        $rezome_active=Rezome::findOrFail($request_id);

        $rezome_active->update([
            'status'=>'1' ,
        ]);
        $notification = array(
            'message' => 'فعال شد',
            'alert-type' => 'success' // تغییر به 'success' برای موفقیت
        );
        return redirect()->back()->with($notification);
    }

    public function RezomeInActive(Request $request){
        $request_id=$request->input('id');
        $rezome_active=Rezome::findOrFail($request_id);

        $rezome_active->update([
            'status'=>'0' ,
        ]);
        $notification = array(
            'message' => 'غیر فعال شد',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    //Rezome_InActive




//




}
