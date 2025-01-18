<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\MyTeam;
use App\Models\MyTeamSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class MyteamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myteamset=MyTeamSet::find(1)->first();
        $myteam=MyTeam::latest()->get();
        return view('admin.pages.myteam.manage',compact('myteamset','myteam'));
    }

    public function SettingUpdate(Request $request){
        $id_myteam=$request->id;
            if ($request->file('my_team_bg_image')){
            $image=$request->file('my_team_bg_image');
            $image_generater=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,)->save('uploads/setting/myteam/'.$image_generater);
            $path_team='uploads/setting/myteam/'.$image_generater;
            MyTeamSet::findOrFail($id_myteam)->update([
                'my_team_top_head'=>$request->input('my_team_top_head'),
                'my_team_top_head_color'=>$request->input('my_team_top_head_color'),
                'my_team_head'=>$request->input('my_team_head'),
                'my_team_head_color'=>$request->input('my_team_head_color'),
                'my_team_bg_color'=>$request->input('my_team_bg_color'),
                'my_team_bg_image'=>$path_team,
                '`updated_at`'=>now()
            ]);
        }
            else{
                MyTeamSet::findOrFail($id_myteam)->update([
                    'my_team_top_head'=>$request->input('my_team_top_head'),
                    'my_team_top_head_color'=>$request->input('my_team_top_head_color'),
                    'my_team_head'=>$request->input('my_team_head'),
                    'my_team_head_color'=>$request->input('my_team_head_color'),
                    'my_team_bg_color'=>$request->input('my_team_bg_color'),
                    '`updated_at`'=>now()
                    ]);
            }
        $notification = array(
            'message' => 'بروزرسانی با موفقیت انجام شد',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function Delete($id){
        $imgmyteam=MyTeamSet::findOrFail($id);
        $filepath=public_path('uploads/setting/myteam/'.$imgmyteam->my_team_bg_image);
        if ($imgmyteam->my_team_bg_image && File::exists($filepath)){
            File::delete($filepath);

        }
        $imgmyteam->update([
            'my_team_bg_image'=>null
        ]);
        $notification = array(
            'message' => 'حذف با موفقیت انجام شد',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function MyTeamAttachmentActive(Request $request){
        $request_id=$request->id;
        MyTeamSet::findOrFail($request_id)->update([
            'my_team_background_attachment'=>'1'
        ]);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function MyTeamAttachmentInActive(Request $request){
        $request_id=$request->id;
        MyTeamSet::findOrFail($request_id)->update([
            'my_team_background_attachment'=>'0'
        ]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.pages.myteam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('picture_person')){
            $person_pic=$request->file('picture_person');
            $pic_per_gen=time().'.'.$person_pic->getClientOriginalExtension();
            Image::make($person_pic)->resize(263,263)->save('uploads/setting/myteam/'.$pic_per_gen);
            $personal_img_path='uploads/setting/myteam/'.$pic_per_gen;
            MyTeam::create([
                'name_person'=>$request->input('name_person'),
                'name_personـen'=>$request->input('name_personـen'),
                'job_person'=>$request->input('job_person'),
                'about_person'=>$request->input('about_person'),
                'picture_person'=>$personal_img_path,
                'social_person_instagram'=>$request->input('social_person_instagram'),
                'social_person_linkedin'=>$request->input('social_person_linkedin'),
                'social_person_telegram'=>$request->input('social_person_telegram'),
                'social_person_X'=>$request->input('social_person_X'),
                'social_person_facebook'=>$request->input('social_person_facebook'),
            ]);
        }
        else{
            MyTeam::create([
                'name_person'=>$request->input('name_person'),
                'name_personـen'=>$request->input('name_personـen'),
                'job_person'=>$request->input('job_person'),
                'about_person'=>$request->input('about_person'),
                'social_person_instagram'=>$request->input('social_person_instagram'),
                'social_person_linkedin'=>$request->input('social_person_linkedin'),
                'social_person_telegram'=>$request->input('social_person_telegram'),
                'social_person_X'=>$request->input('social_person_X'),
                'social_person_facebook'=>$request->input('social_person_facebook'),
            ]);
        }
        $notification = array(
            'message' => 'اطلاعات  با موفقیت ذخیره شد',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.myteam.manage')->with($notification);

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
        $myteam_id=MyTeam::findOrFail($id);
        return view('admin.pages.myteam.edit',compact('myteam_id'));
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
        if ($request->file('picture_person')){
            $person_pic=$request->file('picture_person');
            $pic_per_gen=time().'.'.$person_pic->getClientOriginalExtension();
            Image::make($person_pic)->resize(263,263)->save('uploads/setting/myteam/'.$pic_per_gen);
            $personal_img_path='uploads/setting/myteam/'.$pic_per_gen;
            MyTeam::findOrFail($request_id)->update([
                'name_person'=>$request->input('name_person'),
                'name_personـen'=>$request->input('name_personـen'),
                'job_person'=>$request->input('job_person'),
                'about_person'=>$request->input('about_person'),
                'picture_person'=>$personal_img_path,
                'social_person_instagram'=>$request->input('social_person_instagram'),
                'social_person_linkedin'=>$request->input('social_person_linkedin'),
                'social_person_telegram'=>$request->input('social_person_telegram'),
                'social_person_X'=>$request->input('social_person_X'),
                'social_person_facebook'=>$request->input('social_person_facebook'),
            ]);
        }
        else{
            MyTeam::findOrFail($request_id)->update([
                'name_person'=>$request->input('name_person'),
                'name_personـen'=>$request->input('name_personـen'),
                'job_person'=>$request->input('job_person'),
                'about_person'=>$request->input('about_person'),
                'social_person_instagram'=>$request->input('social_person_instagram'),
                'social_person_linkedin'=>$request->input('social_person_linkedin'),
                'social_person_telegram'=>$request->input('social_person_telegram'),
                'social_person_X'=>$request->input('social_person_X'),
                'social_person_facebook'=>$request->input('social_person_facebook'),
            ]);
        }
        $notification = array(
            'message' => 'اطلاعات  با موفقیت بروز شد',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.myteam.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MyTeam::findOrFail($id)->delete();

        $notification = array(
            'message' => 'حذف  با موفقیت انجام شد',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }


}
