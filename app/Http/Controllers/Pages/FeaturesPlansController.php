<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\FeaturesPlans;
use App\Models\PlanTitle;
use App\Models\PlanType;
use Illuminate\Http\Request;

class FeaturesPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show_features=FeaturesPlans::latest()->get();
        $show_title=PlanTitle::find(1)->first();
        return view('admin.pages.plans.fecure.manage',compact('show_features','show_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $plans=PlanType::orderBy('name_type_fa','ASC')->get();
        return view('admin.pages.plans.fecure.create',compact('plans'));
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
        FeaturesPlans::create([
            'plan_type_id'=>$request->input('plan_type_id'),
            'features'=>$request->input('features'),
            'feature_description'=>$request->input('feature_description'),
            'created_at'=>now(),
        ]);
        $notification = array(
            'message'=>' افزوده شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.fecureplan.manage')->with($notification);
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
        $edit_fecure=FeaturesPlans::findOrFail($id);
        $plans=PlanType::orderBy('name_type_fa','ASC')->get();
        return view('admin.pages.plans.fecure.edit',compact('edit_fecure','plans'));


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
        //
        $request_id=$request->id;
        FeaturesPlans::findOrFail($request_id)->update([
            'plan_type_id'=>$request->input('plan_type_id'),
            'features'=>$request->input('features'),
            'feature_description'=>$request->input('feature_description'),
        ]);
        $notification = array(
            'message'=>' بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.fecureplan.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        FeaturesPlans::findOrFail($id)->delete();
        $notification = array(
            'message'=>' حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function PlanTitleUpdate(Request $request){
        $request_id=$request->id;
        PlanTitle::findOrFail($request_id)->update([
            'title'=>$request->input('title'),
            'sub_title'=>$request->input('sub_title'),
        ]);
        $notification = array(
            'message'=>' بروزرسانی شد',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
