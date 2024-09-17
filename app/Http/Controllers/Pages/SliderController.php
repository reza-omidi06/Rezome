<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //show slider manager
    public function SliderManager(){
        return view('admin.pages.slider.manage');
    }
    //End Method
    // show edit
    //*******for edit text und color*******
    public function SliderEdit(){
        $edit_slider = Slider::find(1)->first();
        return view('admin.pages.slider.edit',compact('edit_slider'));
    }
    //End Method
    //update all field
    public function SliderUpdate(Request $request){
        $request_id=$request->id;
        if ($request->file('image')){
            $image=$request->file('image');
            $image_gen=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(421,600)->save('uploads/slider/'.$image_gen);
            $image_path='uploads/slider/'.$image_gen;
            Slider::findOrFail($request_id)->update([
                'title'=>$request->input('title'),
                'name'=>$request->input('name'),
                'btn_name_one'=>$request->input('btn_name_one'),
                'btn_link_one'=>$request->input('btn_link_one'),
                'btn_name_tow'=>$request->input('btn_name_tow'),
                'btn_link_tow'=>$request->input('btn_link_tow'),
                'image'=>$image_path,
                'image_alt'=>$request->input('image_alt'),
                'background_color'=>$request->input('background_color'),
            ]);
        }
        elseif ($request->file('background_img')){
            $image_back=$request->file('background_img');
            $image_back_gen=time().'.'.$image_back->getClientOriginalExtension();
            Image::make($image_back)->resize(421,600)->save('uploads/slider/'.$image_back_gen);
            $image_back_path='uploads/slider/'.$image_back_gen;
            Slider::findOrFail($request_id)->update([
                'title'=>$request->input('title'),
                'name'=>$request->input('name'),
                'btn_name_one'=>$request->input('btn_name_one'),
                'btn_link_one'=>$request->input('btn_link_one'),
                'btn_name_tow'=>$request->input('btn_name_tow'),
                'btn_link_tow'=>$request->input('btn_link_tow'),
                'image_alt'=>$request->input('image_alt'),
                'background_img'=>$image_back_path,
                'background_color'=>$request->input('background_color'),
            ]);
        }
        else{
            Slider::findOrFail($request_id)->update([
                'title'=>$request->input('title'),
                'name'=>$request->input('name'),
                'btn_name_one'=>$request->input('btn_name_one'),
                'btn_link_one'=>$request->input('btn_link_one'),
                'btn_name_tow'=>$request->input('btn_name_tow'),
                'btn_link_tow'=>$request->input('btn_link_tow'),
                'image_alt'=>$request->input('image_alt'),
                'background_color'=>$request->input('background_color'),
            ]);
        }

        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);


    }
    //End Method
    //***********show text in dynamic and edit and delete***********//
    public function DynamicManager(){
        return view('admin.pages.slider.dynamic.manage');
    }
    //End Method

    //End Method
    public function DynamicEdit(){
        $dynamic_edit=Slider::find(1)->first();
        return view('admin.pages.slider.dynamic.edit',compact('dynamic_edit'));
    }
    //End Method
    public function DynamicUpdate(Request $request){
        $request_id=$request->id;
        Slider::findOrFail($request_id)->update([
            'text_dynamic'=>$request->input('text_dynamic'),
        ]);

        $notification=array(
            'massage'=>'بروزرسانی ',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.slider.edit')->with($notification);

    }
    //End Method
}
