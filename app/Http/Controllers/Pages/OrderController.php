<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderSetting;
use App\Models\PlanType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_orders=Order::latest()->get();
        $prices_order=PlanType::orderBy('name_type_fa','ASC')->get();
        $order_setting=OrderSetting::find(1)->first();
        return view('admin.pages.order.manage',compact('view_orders','prices_order','order_setting'));
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
        if ($request->file('order_file')){
            $order_file = $request->file('order_file');
            $order_file_name = time().'.'.$order_file->getClientOriginalExtension();
            $order_file->move(public_path('uploads/order'), $order_file_name);
            $order_file_path = 'uploads/order/' . $order_file_name;

            Order::create([
                'plan_id' => $request->input('plan_id'),
                'order_name' => $request->input('order_name'),
                'order_mail' => $request->input('order_mail'),
                'order_phone' => $request->input('order_phone'),
                'order_description' => $request->input('order_description'),
                'order_file' => $order_file_path,
                'order_status' => 1,
                'created_at' => now(),
            ]);
        }
        else{
            Order::create([
                'plan_id' => $request->input('plan_id'),
                'order_name' => $request->input('order_name'),
                'order_mail' => $request->input('order_mail'),
                'order_phone' => $request->input('order_phone'),
                'order_description' => $request->input('order_description'),
                'order_status' => 1,
                'created_at' => now(),
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
    public function show($id)
    {
        $show_order=Order::findOrFail($id);
        return view('admin.pages.order.view',compact('show_order'));
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
    /* uploads/order/background */
    public function update(Request $request)
    {

//        'order_setting_back_attachment',
        $request_id=$request->id;
        if ($request->file('order_setting_back_image')){
            $file_order=$request->file('order_setting_back_image');
            $file_genarator=time().'.'.$file_order->getClientOriginalExtension();
            Image::make($file_order)->resize(1903,500)->save('uploads/order/background/'.$file_genarator);
            $file_order_path='uploads/order/background/'.$file_genarator;

            OrderSetting::findOrFail($request_id)->update([
                'order_setting_title_up_title'=>$request->input('order_setting_title_up_title'),
                'order_setting_title'=>$request->input('order_setting_title'),
                'order_setting_description'=>$request->input('order_setting_description'),
                'order_setting_back_color'=>$request->input('order_setting_back_color'),
                'order_setting_btn_color'=>$request->input('order_setting_btn_color'),
                'order_setting_back_image'=>$file_order_path,
                'updated_at'=>now(),
            ]);
        }
        else{
            OrderSetting::findOrFail($request_id)->update([
                'order_setting_title_up_title'=>$request->input('order_setting_title_up_title'),
                'order_setting_title'=>$request->input('order_setting_title'),
                'order_setting_description'=>$request->input('order_setting_description'),
                'order_setting_back_color'=>$request->input('order_setting_back_color'),
                'order_setting_btn_color'=>$request->input('order_setting_btn_color'),
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
    public function destroySetting($id)
    {
        $orderSettingdel = OrderSetting::findOrFail($id);
        $imagePath = public_path('uploads/order/background/' . $orderSettingdel->order_setting_back_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);  // حذف فایل

        }
        $orderSettingdel->update([
            'order_setting_back_image' => null
        ]);
        $notification = array(
            'message' => 'حذف  با موفقیت انجام شد',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    public function AttachmentActive(Request $request){
        $request_id=$request->id;
        OrderSetting::findOrFail($request_id)->update([
            'order_setting_back_attachment'=>1,
        ]);

        $notification = array(
            'message' => 'فعال شد',
            'alert-type' => 'success' // تغییر به 'success' برای موفقیت
        );
        return redirect()->back()->with($notification);
    }
    public function AttachmentInActive(Request $request){
        $request_id=$request->id;
        OrderSetting::findOrFail($request_id)->update([
            'order_setting_back_attachment'=>0,
        ]);

        $notification = array(
            'message' => 'غیر فعال شد',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function destroy($id){
        Order::findOrFail($id)->delete();
        $notification = array(
            'message'=>'آیتم حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
