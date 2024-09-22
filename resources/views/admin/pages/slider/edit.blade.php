@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin: 1.5rem auto;">
                        <div class="card-body">
                            <div class="container-fluid" style="padding:0;margin: 0;">
                                <div class="row ">
                                    <div class="col-md-6" style="text-align: start;">
                                        <h4 class="card-title">اسلایدر اسلایدر </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.update.edit')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$edit_slider->id }}">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="portfolio_category_id" class="form-label">عنوان </label>
                                        <input  name="title" type="text" class="form-control" id="portfolio_name" value="{{$edit_slider->title}}"  required>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="portfolio_name" class="form-label">اسم </label>
                                        <input  name="name" type="text" class="form-control" id="portfolio_name" value="{{$edit_slider->name}}" required>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-md-6 mb-3" style="text-align:center">
                                        <a class="btn_style_first-pg" href="{{$edit_slider->btn_link_one}}">{{$edit_slider->btn_name_one}}</a>
                                        <input name="btn_name_one" type="text" class="form-control input_button" id="portfolio_url"   value="{{$edit_slider->btn_name_one}}" placeholder="نام 1" >
                                        <input name="btn_link_one" type="text" class="form-control input_button" id="portfolio_url"   value="{{$edit_slider->btn_link_one}}" placeholder=" link1" >
                                    </div>

                                    <div class="col-md-6 mb-3" style="text-align:center">
                                        <a class="btn_style_first-pg" href="{{$edit_slider->portfolio_url}}">{{$edit_slider->btn_name_tow}}</a>
                                        <input name="btn_name_tow" type="text" class="form-control input_button" id="portfolio_url"   value="{{$edit_slider->btn_name_tow}}" placeholder="نام  دوم" >
                                        <input name="portfolio_url" type="text" class="form-control input_button" id="portfolio_url"   value="{{$edit_slider->portfolio_url}}" placeholder=" لینک دوم" >
                                    </div>
                                </div>
                                <hr>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style=" background: #e7e7ff; color: #566a7f; ">
                                                تغیر پس زمینه
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="padding:0.5rem;">
                                            <div class="row mb-3"  >
                                                <div class="col-md-3 m-auto" >
                                                    <label></label>
                                                    <a href="{{route('admin.dynamic.edit')}}" class="btn btn-primary" >متن متحرک</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>رنگ پس زمینه </label>
                                                    <br>
                                                    <input name="background_color" type="color" value="{{$edit_slider->background_color}}" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label>عکس پس زمینه</label>
                                                    <input name="background_img" class="form-control" type="file"  id="image" style="width: 44%;">
                                                </div>
                                                <div class="col-md-3">
                                                    <img id="showImage" class="rounded avatar-lg" src="{{asset(!empty( $edit_slider->background_img) ? $edit_slider->background_img  : 'uploads/no_images.jpg')}}" style="border: 1px solid;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="portfolio_image" class="form-label">عکس<span style="color:#d52626;font-size: 0.7rem;">(421x600)</span></label>
                                        <input name="image" class="form-control" type="file"  id="image" multiple="" style="width: 35%;">
                                        <input type="hidden" name="primary_image" id="primaryImage" value="">
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset(!empty( $edit_slider->image) ? $edit_slider->image  : 'uploads/no_images.jpg')}}" style="border: 1px solid;">

                                    </div>
                                    <div class="col-md-3">
                                        <input name="image_alt" type="text" class="form-control input_button" id="portfolio_url"   value="{{$edit_slider->image_alt}}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
