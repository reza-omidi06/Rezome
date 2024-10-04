<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortflolioCategoryController extends Controller
{

    public function PortfolioCategoryManage(){
        $detail_portfolio_category=PortfolioCategory::latest()->get();
        return view('admin.pages.portflolio.category.manage',compact('detail_portfolio_category'));

    }
    //End Method
    public function PortfolioCategoryAdd(){

        return view('admin.pages.portflolio.category.add');
    }
    //End Method
    public function StorePortflolioCategory(Request $request){
//        $request->validate([
//            'name_portfolio_category'=>'required|string|max:255',
//            'name_en_portfolio_category'=>'required|string|max:255',
//            'description_portfolio_category'=>'string|max:255',
//            'image_portfolio_category'=>'string|max:255',
//        ]);
        if ($request->file('image_portfolio_category')){
            $request_file=$request->file('image_portfolio_category');
            $image_portfolio=time().'.'.$request_file->getClientOriginalExtension();
            Image::make($request_file)->resize('150','150')->save('uploads/portfolio/'.$image_portfolio);
            $path_portfolio='uploads/portfolio/'.$image_portfolio;
            PortfolioCategory::create([
                'name_portfolio_category'=>$request->input('name_portfolio_category'),
                'name_en_portfolio_category'=>$request->input('name_en_portfolio_category'),
                'description_portfolio_category'=>$request->input('description_portfolio_category'),
                'image_portfolio_category'=>$path_portfolio,
                'created_at'=>now(),
            ]);
        }
        else{
            PortfolioCategory::create([
                'name_portfolio_category'=>$request->input('name_portfolio_category'),
                'name_en_portfolio_category'=>$request->input('name_en_portfolio_category'),
                'description_portfolio_category'=>$request->input('description_portfolio_category'),
                'created_at'=>now(),
            ]);
        }
        $notification = array(
            'message'=>' درج شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.portfoliocategory.manage')->with($notification);
    }
    //End Method
    public function PortfolioCategoryEdit($id){
        $edit_portfolio_category=PortfolioCategory::findOrFail($id);
        return view('admin.pages.portflolio.category.edit',compact('edit_portfolio_category'));
    }
    //End Method
    public function UpdatePortflolioCategory(Request $request){
        $find_profiol_cat=$request->id;
        if ($request->file('image_portfolio_category')){
            $request_file=$request->file('image_portfolio_category');
            $image_portfolio=time().'.'.$request_file->getClientOriginalExtension();
            Image::make($request_file)->resize('150','150')->save('uploads/portfolio/'.$image_portfolio);
            $path_portfolio='uploads/portfolio/'.$image_portfolio;
            PortfolioCategory::findOrFail($find_profiol_cat)->update([
                'name_portfolio_category'=>$request->input('name_portfolio_category'),
                'name_en_portfolio_category'=>$request->input('name_en_portfolio_category'),
                'description_portfolio_category'=>$request->input('description_portfolio_category'),
                'image_portfolio_category'=>$path_portfolio,
            ]);
        }

        else{
            PortfolioCategory::findOrFail($find_profiol_cat)->update([
                'name_portfolio_category'=>$request->input('name_portfolio_category'),
                'name_en_portfolio_category'=>$request->input('name_en_portfolio_category'),
                'description_portfolio_category'=>$request->input('description_portfolio_category'),
            ]);
        }
        $notification = array(
            'message'=>'بروزرسانی انجام شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.portfoliocategory.manage')->with($notification);
    }
    //End Method
    public function PortfolioCategoryDelete($id){
        PortfolioCategory::findOrFail($id)->delete();

        $notification = array(
            'message'=>'دسته بندی حذف شد',
            'alert-type'=>'danger'
        );
        return redirect()->back()->with($notification);
    }
    //End Method
    //End Method
    //End Method
}
