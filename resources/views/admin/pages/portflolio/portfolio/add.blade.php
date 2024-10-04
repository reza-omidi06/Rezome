@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <head>
        <style>

        </style>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid" style="padding:0;margin: 0;">
                                <div class="row ">
                                    <div class="col-md-6" style="text-align: start;">
                                        <h4 class="card-title">اضافه کردن نمونه کار </h4>

                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.portfolio.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="portfolio_category_id" class="form-label"> دسته بندی </label>
                                        <select name="portfolio_category_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                            <option data-select2-id="3">انتخاب</option>
                                            <optgroup label="دسته بندی ها">
                                                @foreach($categorys as $category)
                                                    <option value="{{$category->id}}">{{$category->name_portfolio_category}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="portfolio_name" class="form-label">نام</label>
                                        <input  name="portfolio_name" type="text" class="form-control" id="portfolio_name" value=""  required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="portfolio_client" class="form-label">مشتری</label>
                                        <input  name="portfolio_client" type="text" class="form-control" id="portfolio_client" value=""  required>
                                    </div>

                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="portfolio_url" class="form-label"> آدرس اینترنتی</label>
                                        <input name="portfolio_url" type="url" class="form-control" id="portfolio_url"   value="" placeholder="https://ex.com" >
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="portfolio_project_date" class="form-label">تاریخ پروژه </label>
                                        <input  name="portfolio_project_date" ype="date" class="form-control" id="portfolio_project_date" value=""  >
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label for="portfolio_description" class="form-label">توضیحات</label>
                                        <textarea id="elm1" name="portfolio_description" class="form-control" required>

                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="portfolio_image" class="form-label">ابعاد عکس : <span style="color:#d52626;font-size: 0.7rem;">(400x300)</span></label>
                                        <input name="portfolio_image" class="form-control" type="file"   id="image"   style="width: 32%;">
                                        <input type="hidden" name="portfolio_image" id="primaryImage" value="">
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset('uploads/no_images.jpg')}}" style="border: 1px solid;">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-success">افزودن</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').on('change', function() {
                var files = $(this)[0].files;
                $('#imagePreview').html("");

                if (files.length > 0) {
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var imgContainer = $('<div>').addClass('image-container');
                            var img = $('<img>').attr('src', e.target.result);
                            var removeBtn = $('<button>').addClass('remove-image').text('X');

                            removeBtn.on('click', function() {
                                $(this).parent().remove();
                            });

                            imgContainer.append(img).append(removeBtn);
                            $('#imagePreview').append(imgContainer);
                        };

                        reader.readAsDataURL(file);
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            document.getElementById("yourFormId").addEventListener("submit", function(e){
                var url = document.getElementById("portfolio_url").value;
                if(!url.match(/^(http:\/\/|https:\/\/|www\.).*/)){
                    alert("URL must start with http://, https://, or www.");
                    e.preventDefault();
                }
            });
        });
    </script>

@endsection
