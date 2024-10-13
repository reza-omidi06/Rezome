<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\PlanType;
use Illuminate\Http\Request;

class PlanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_types=PlanType::latest()->get();
        return view('admin.pages.plans.type.manage',compact('show_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.plans.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PlanType::create([
            'name_type_fa'=>$request->input('name_type_fa'),
            'name_type_en'=>$request->input('name_type_en'),
            'price_type'=>$request->input('price_type'),
            'description_type'=>$request->input('description_type'),
            'status_type'=>1,
            'created_at'=>now(),
        ]);
        $notification = array(
            'message'=>' افزوده شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.plantype.manage')->with($notification);
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
        $edit_show=PlanType::findOrFail($id);
        return view('admin.pages.plans.type.edit',compact('edit_show'));

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
        PlanType::findOrFail($request_id)->update([
            'name_type_fa'=>$request->input('name_type_fa'),
            'name_type_en'=>$request->input('name_type_en'),
            'price_type'=>$request->input('price_type'),
            'description_type'=>$request->input('description_type'),
        ]);
        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.plantype.manage')->with($notification);

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
        PlanType::findOrFail($id)->delete();
        $notification = array(
            'message'=>' حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->route('admin.plantype.manage')->with($notification);
    }


    public function PlanTypeActive(Request $request){
        $id_req=$request->id;
        PlanType::findOrFail($id_req)->update([
            'status_type'=>'1'
        ]);
        $notification = array(
            'message' => ' فعال شد',
            'alert-type' => 'success' // تغییر به 'success' برای موفقیت
        );
        return redirect()->back()->with($notification);
    }
    public function PlanTypeInActive(Request $request){
        $id_req=$request->id;
        PlanType::findOrFail($id_req)->update([
            'status_type'=>'0'
        ]);
        $notification = array(
            'message' => 'غیر فعال شد',
            'alert-type' => 'success' // تغییر به 'success' برای موفقیت
        );
        return redirect()->back()->with($notification);
    }
    public function SpecialActive(Request $request){

        $req_special_ac=$request->id;
        PlanType::findOrFail($req_special_ac)->update([
            'special'=>1
        ]);
        $notification = array(
            'message' => ' فعال شد',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SpecialInActive(Request $request){

        $req_special_inac=$request->id;
        PlanType::findOrFail($req_special_inac)->update([
            'special'=>0
        ]);
        $notification = array(
            'message' => 'غیر فعال شد',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
