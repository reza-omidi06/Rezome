<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Nav;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index(){
        $nav_set=Nav::find(1)->first();
        return view('admin.pages.setting.navsetting',compact('nav_set'));
    }
    //End Method

    public function update(Request $request){
        $request_id=$request->id;
        if ($request->file('image_site')){
            $file_nav=$request->file('image_site');
            $fil_genrator=time().'.'.$file_nav->getClientOriginalExtension();
            Image::make($file_nav)->resize(250,50)->save('uploads/setting/nav/'.$fil_genrator);
            $img_path='uploads/setting/nav/'.$fil_genrator;

            Nav::findOrFail($request_id)->update([
                'title_site'=>$request->input('title_site'),
                'image_site'=>$img_path,
                'name_site'=>$request->input('name_site'),
                'description'=>$request->input('description'),
                'updated_at'=>now(),
            ]);
        }
        else{
            Nav::findOrFail($request_id)->update([

                'title_site'=>$request->input('title_site'),
                'name_site'=>$request->input('name_site'),
                'description'=>$request->input('description'),
                'updated_at'=>now(),

            ]);

        }

        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deletePhoto(Request $request) {
        $nav = Nav::findOrFail($request->id);

        // حذف عکس از سیستم فایل در صورت وجود
        if (file_exists(public_path($nav->image_site))) {
            unlink(public_path($nav->image_site));
        }

        // به‌روزرسانی فیلد عکس به حالت خالی یا مقدار پیش‌فرض
        $notification = array(
            'message'=>'با موفقیت حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
