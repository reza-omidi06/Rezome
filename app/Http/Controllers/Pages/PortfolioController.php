<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    //
    public function PortfolioManage(){
        $manage_portfolio=Portfolio::latest()->get();
        return view('admin.pages.portflolio.portfolio.manage',compact('manage_portfolio'));

    }
    //ِِEnd Method
    public function PortfolioAdd(){
        $categorys=PortfolioCategory::orderBy('name_portfolio_category','ASC')->get();
        return view('admin.pages.portflolio.portfolio.add',compact('categorys'));
    }
    public function PortfolioStore(Request $request){

        if($request->file('portfolio_image')){
           $img_portfolio=$request->file('portfolio_image');
           $portfolio_gen_name=time().'.'.$img_portfolio->getClientOriginalExtension();
           Image::make($img_portfolio)->resize(400,300)->save('uploads/portfolio/project'.$portfolio_gen_name);
           $portfolio_path='uploads/portfolio/project'.$portfolio_gen_name;
            Portfolio::create([
                'portfolio_category_id'=>$request->input('portfolio_category_id'),
                'portfolio_name'=>$request->input('portfolio_name'),
                'portfolio_client'=>$request->input('portfolio_client'),
                'portfolio_project_date'=>$request->input('portfolio_project_date'),
                'portfolio_url'=>$request->input('portfolio_url'),
                'portfolio_description'=>$request->input('portfolio_description'),
                'portfolio_image'=>$portfolio_path,
                'created_at'=>now(),
           ]);
        }
        else{
            Portfolio::create([
                'portfolio_category_id'=>$request->input('portfolio_category_id'),
                'portfolio_name'=>$request->input('portfolio_name'),
                'portfolio_client'=>$request->input('portfolio_client'),
                'portfolio_project_date'=>$request->input('portfolio_project_date'),
                'portfolio_url'=>$request->input('portfolio_url'),
                'portfolio_description'=>$request->input('portfolio_description'),
                'created_at'=>now(),
            ]);

        }
        $notification = array(
            'message'=>' درج شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.portfolio.manage')->with($notification);
    }
    //ِِEnd Method
    public function PortfolioEdit($id){
        $edit_portfolio=Portfolio::findOrFail($id);
        $categorys=PortfolioCategory::orderBy('name_portfolio_category','ASC')->get();
        return view('admin.pages.portflolio.portfolio.edit',compact('edit_portfolio','categorys'));
    }
    //ِِEnd Method
    public function PortfolioUpdate(Request $request){
        $request_id=$request->id;
        if($request->file('portfolio_image')){
            $img_portfolio=$request->file('portfolio_image');
            $portfolio_gen_name=time().'.'.$img_portfolio->getClientOriginalExtension();
            Image::make($img_portfolio)->resize(400,300)->save('uploads/portfolio/project'.$portfolio_gen_name);
            $portfolio_path='uploads/portfolio/project'.$portfolio_gen_name;
            Portfolio::findOrFail($request_id)->update([
                'portfolio_category_id'=>$request->input('portfolio_category_id'),
                'portfolio_name'=>$request->input('portfolio_name'),
                'portfolio_client'=>$request->input('portfolio_client'),
                'portfolio_project_date'=>$request->input('portfolio_project_date'),
                'portfolio_url'=>$request->input('portfolio_url'),
                'portfolio_description'=>$request->input('portfolio_description'),
                'portfolio_image'=>$portfolio_path,
                'created_at'=>now(),
            ]);
        }
        else{
            Portfolio::findOrFail($request_id)->update([
                'portfolio_category_id'=>$request->input('portfolio_category_id'),
                'portfolio_name'=>$request->input('portfolio_name'),
                'portfolio_client'=>$request->input('portfolio_client'),
                'portfolio_project_date'=>$request->input('portfolio_project_date'),
                'portfolio_url'=>$request->input('portfolio_url'),
                'portfolio_description'=>$request->input('portfolio_description'),
                'created_at'=>now(),
            ]);

        }
        $notification = array(
            'message'=>' بروزرسانی شد',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.portfolio.manage')->with($notification);
    }
    //ِِEnd Method
    public function PortfolioDelete($id){
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message'=>'حذف شد',
            'alert-type'=>'error'
        );
        return redirect()->route('admin.portfolio.manage')->with($notification);

    }
    //ِِEnd Method
    //ِِEnd Method
    //ِِEnd Method
}
