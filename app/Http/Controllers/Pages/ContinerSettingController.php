<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\ContinerSetting;
use App\Models\MyTeamSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ContinerSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continer_manage=ContinerSetting::find(1)->first();
        return view('admin.pages.container.manage',compact('continer_manage'));
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
        //



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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request_id=$request->id;
        if ($request->file('cont_background_image')){
            $img_continer=$request->file('cont_background_image');
            $cont_gen=time().'.'.$img_continer->getClientOriginalExtension();
            Image::make($img_continer)->resize(1903,500)->save('uploads/container/'.$cont_gen);
            $path_cont='uploads/container/'.$cont_gen;
            ContinerSetting::findOrFail($request_id)->update([
                'up_title'=>$request->input('up_title'),
                'title'=>$request->input('title'),
                'cont_description'=>$request->input('cont_description'),
                'cont_link'=>$request->input('cont_link'),
                'cont_background_color'=>$request->input('cont_background_color'),
                'cont_btn_color'=>$request->input('cont_btn_color'),
                'up_title_color'=>$request->input('up_title_color'),
                'title_color'=>$request->input('title_color'),
                'cont_background_attachment'=>$request->input('cont_background_attachment'),
                'cont_background_image'=>$path_cont,
                'updated_at'=>now(),
            ]);
        }
        else{
            ContinerSetting::findOrFail($request_id)->update([
                'up_title'=>$request->input('up_title'),
                'title'=>$request->input('title'),
                'cont_description'=>$request->input('cont_description'),
                'cont_link'=>$request->input('cont_link'),
                'cont_background_color'=>$request->input('cont_background_color'),
                'cont_btn_color'=>$request->input('cont_btn_color'),
                'up_title_color'=>$request->input('up_title_color'),
                'title_color'=>$request->input('title_color'),
                'cont_background_attachment'=>$request->input('cont_background_attachment'),
                'updated_at'=>now(),
            ]);
        }
        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagecontainer = ContinerSetting::findOrFail($id);

        $filePath = public_path('uploads/container/' . $imagecontainer->cont_background_image);

        if ($imagecontainer->cont_background_image && File::exists($filePath)) {

            File::delete($filePath);
        }

        $imagecontainer->update([
            'cont_background_image' => null
        ]);

        $notification = array(
            'message' => 'حذف با موفقیت انجام شد',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
