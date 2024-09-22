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
                                        <h4 class="card-title">ویرایش درباره ما </h4>
                                    </div>
                                    <div class="col-md-6" style="text-align:end;">
                                        <a href="{{route('admin.skill.manager')}}" class="btn btn-outline-warning" >
                                            <i class="ri-add-box-fill">
                                                مهارت ها
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="{{route('admin.about.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$about_manager->id }}">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label">عنوان :  </label>
                                        <input  name="title" type="text" class="form-control" id="portfolio_name" value="{{$about_manager->title}}"  required>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="btn_name" class="form-label">عنوان دکمه : <span style="color:#d52626;font-size: 0.7rem;">(درصورت خالی بودن عنوان دکمه نمایش داده نمی شود) </label>
                                        <input  name="btn_name" type="text" class="form-control" id="btn_name" value="{{$about_manager->btn_name}}"  >
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="portfolio_image" class="form-label"> بارگزاری رزومه : <span style="color:#d52626;font-size: 0.7rem;">(Pdf,Zip)</span>
                                        </label>
                                        <br>
                                        <input  name="file_pdf" type="file" class="form-control" accept=".pdf,.zip" id="portfolio_name" value="{{$about_manager->file_pdf}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="form-label">توضیحات :  </label>
                                    <div class="col-md-10 mb-3">
                                        <textarea id="elm1" name="description" class="form-control">
                                            {{$about_manager->description}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="portfolio_image" class="form-label">ابعاد عکس : <span style="color:#d52626;font-size: 0.7rem;">(683x854)</span></label>
                                        <input name="image_about" class="form-control" type="file"   id="image"   style="width: 32%;">
                                        <input type="hidden" name="primary_image"id="primaryImage" value="" required>
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset(!empty($about_manager->image_about) ? $about_manager->image_about : 'uploads/no_images.jpg')}}" style="border: 1px solid;">
                                    </div>
                                    <div class="col-md-3">
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
