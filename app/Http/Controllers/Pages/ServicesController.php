<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\TitleServices;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
   public function ServiceManager(){
       $manage_services=Services::latest()->get();
       return view('admin.pages.service.manage',compact('manage_services'));
   }
   public function ServiceTitleUpdate(Request $request){
       $request->validate([
           'title_services' => 'string|max:255',
       ]);
       TitleServices::updateOrCreate([
           'title_services'=>$request->input('title_services'),
       ]);
       $update = array(
           'message'=>'بروزرسانی انجام شد',
           'alert-type'=>'success'
       );
       return redirect()->back()->with($update);
   }
   public function ServiceAdd(){
       return view('admin.pages.service.add');
   }
   public function ServiceStore(Request $request){
       $request->validate([
           'title' => 'required|string|max:255',
           'title_en' => 'required|string|max:255',
           'description_services' => 'required|string|max:255',
           'icon_services' => 'required|string|max:255',
       ]);
//       service

       if($request->file('image_services')){
         $service_image=$request->file('image_services');
         $image_service_gen=time().'.'.$service_image->getClientOriginalExtension();
         Image::make($service_image)->resize()->save('uploads/service/'.$image_service_gen);
         $service_path='uploads/service/'.$image_service_gen;
           Services::create([
           'title'=>$request->input('title'),
           'title_en'=>$request->input('title_en'),
           'description_services'=>$request->input('description_services'),
           'icon_services'=>$request->input('icon_services'),
           'image_services'=>$service_path,
           'status_services'=>1,
           'created_at'=>now()
       ]);
       }else{
           Services::create([
               'title'=>$request->input('title'),
               'title_en'=>$request->input('title_en'),
               'description_services'=>$request->input('description_services'),
               'icon_services'=>$request->input('icon_services'),
               'status_services'=>1,
               'created_at'=>now()
           ]);
       }
       $notification = array(
           'message'=>'آیتم درج شد',
           'alert-type'=>'success'
       );
       return redirect()->route('admin.service.manage')->with($notification);

   }
   public function ServiceEdit($id){
       $edit_view=Services::findOrFail($id);
       return view('admin.pages.service.edit',compact('edit_view'));
   }
   public function ServiceUpdate(Request $request){
       $edit_service_id=$request->id;
//       service
       if ($request->file('image_services')){
           $service_image=$request->file('image_services');
           $image_service_gen=time().'.'.$service_image->getClientOriginalExtension();
           Image::make($service_image)->resize()->save('uploads/service/'.$image_service_gen);
           $service_path='uploads/service/'.$image_service_gen;
           Services::findOrFail($edit_service_id)->update([
               'title'=>$request->input('title'),
               'title_en'=>$request->input('title_en'),
               'description_services'=>$request->input('description_services'),
               'icon_services'=>$request->input('icon_services'),
               'image_services'=>$service_path,
           ]);
       }else{
           Services::findOrFail($edit_service_id)->update([
               'title'=>$request->input('title'),
               'title_en'=>$request->input('title_en'),
               'description_services'=>$request->input('description_services'),
               'icon_services'=>$request->input('icon_services'),
           ]);
       }
       $notification = array(
           'message'=>'بروزرسانی انجام شد',
           'alert-type'=>'success'
       );
       return redirect()->route('admin.service.manage')->with($notification);
   }
//    public function ServiceUpdate(Request $request){
//        $edit_service_id = $request->id;
//
//        // Prepare data to update
//        $data = [
//            'title' => $request->input('title'),
//            'title_en' => $request->input('title_en'),
//            'description_services' => $request->input('description_services'),
//            'icon_services' => $request->input('icon_services'),
//        ];
//
//        // Check if a new image file is uploaded
//        if ($request->file('image_services')) {
//            $service_image = $request->file('image_services');
//            $image_service_gen = time().'.'.$service_image->getClientOriginalExtension();
//            Image::make($service_image)->resize()->save('uploads/service/'.$image_service_gen);
//            $service_path = 'uploads/service/'.$image_service_gen;
//
//            // Add the new image path to data
//            $data['image_services'] = $service_path;
//        }
//
//        // Find the service and update it
//        Services::findOrFail($edit_service_id)->update($data);
//
//        // Prepare notification message
//        $notification = array(
//            'message' => 'بروزرسانی انجام شد',
//            'alert-type' => 'success'
//        );
//
//        // Redirect with notification
//        return redirect()->route('admin.service.manage')->with($notification);
//    }
//    public function ServiceUpdate(Request $request){
//        $edit_service_id = $request->id;
//
//        // Find the existing service
//        $service = Services::findOrFail($edit_service_id);
//
//        // Prepare data to update
//        $data = [
//            'title' => $request->input('title'),
//            'title_en' => $request->input('title_en'),
//            'description_services' => $request->input('description_services'),
//            'icon_services' => $request->input('icon_services', $service->icon_services), // Preserve old icon_services if not provided
//        ];
//
//        // Check if a new image file is uploaded
//        if ($request->file('image_services')) {
//            $service_image = $request->file('image_services');
//            $image_service_gen = time().'.'.$service_image->getClientOriginalExtension();
//            Image::make($service_image)->resize()->save('uploads/service/'.$image_service_gen);
//            $service_path = 'uploads/service/'.$image_service_gen;
//
//            // Update image_services in data
//            $data['image_services'] = $service_path;
//        } else {
//            // Preserve old image_services if not provided
//            $data['image_services'] = $service->image_services;
//        }
//
//        // Update the service with the prepared data
//        $service->update($data);
//
//        // Prepare notification message
//        $notification = array(
//            'message' => 'بروزرسانی انجام شد',
//            'alert-type' => 'success'
//        );
//
//        // Redirect with notification
//        return redirect()->route('admin.service.manage')->with($notification);
//    }

   public function ServiceDelete($id){
      Services::findOrFail($id)->delete();
       $notification = array(
           'message'=>'آیتم حذف شد',
           'alert-type'=>'error'
       );
       return redirect()->back()->with($notification);
   }


//    public function ServiceActive(Request $request){
//       $request_id=$request->id;
//       Services::findOrFail($request_id)->update([
//           'status_services'=>$request->input(1),
//
//       ]);
//        $notification = array(
//            'message'=>'فعال شد',
//            'alert-type'=>'error'
//        );
//        return redirect()->back()->with($notification);
//    }
//    public function ServiceInActive(Request $request){
//        $request_id=$request->id;
//        Services::findOrFail($request_id)->update([
//            'status_services'=>$request->input(0),
//        ]);
//        $notification = array(
//            'message'=>'غیر فعال شد',
//            'alert-type'=>'error'
//        );
//        return redirect()->back()->with($notification);
//    }
    public function ServiceActive(Request $request){
        $request_id = $request->input('id');
        $service = Services::findOrFail($request_id);

        // Set status to 1
        $service->update([
            'status_services' => 1,
        ]);

        $notification = array(
            'message' => 'فعال شد',
            'alert-type' => 'success' // تغییر به 'success' برای موفقیت
        );
        return redirect()->back()->with($notification);
    }

    public function ServiceInActive(Request $request){
        $request_id = $request->input('id');
        $service = Services::findOrFail($request_id);

        // Set status to 0
        $service->update([
            'status_services' => 0,
        ]);

        $notification = array(
            'message' => 'غیر فعال شد',
            'alert-type' => 'success' // تغییر به 'success' برای موفقیت
        );
        return redirect()->back()->with($notification);
    }



}
