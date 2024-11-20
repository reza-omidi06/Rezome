@extends('admin.backend_master.dashboard.master_page')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">مدیریت کانتینر</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.container.store') }}" class="py-3 accordion-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $continer_manage->id }}">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="up_title" class="form-label">تغییر بالای عنوان :</label>
                                        <input id="up_title" type="text" name="up_title" class="form-control" value="{{$continer_manage->up_title}}">
                                        <input id="up_title_color" type="color" name="up_title_color" class="form-control" value="{{$continer_manage->up_title_color}}" style="width: 25%; margin-top:0.5rem;" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="title" class="form-label"> عنوان :<span style="color:#ec0808;">*&nbsp</span></label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{$continer_manage->title}}" required>
                                        <input id="title_color" type="color" name="title_color" class="form-control" value="{{$continer_manage->title_color}}" style="width:25%;margin-top: 0.5rem;" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cont_link" class="form-label">لینک : <span style="color:#ec0808;"></span></label>
                                        <input id="cont_link" type="text" name="cont_link" class="form-control" value="{{$continer_manage->cont_link}}" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="cont_background_color" class="form-label">رنگ پس زمینه :<span style="color:#ec0808;">*&nbsp</span></label>
                                        <input id="cont_background_color" type="color" name="cont_background_color" class="form-control" value="{{$continer_manage->cont_background_color}}" style="width:60%;" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="cont_btn_color" class="form-label"> رنگ دکمه :<span style="color:#ec0808;">*&nbsp</span></label>
                                        <input id="cont_btn_color" type="color" name="cont_btn_color" class="form-control" value="{{$continer_manage->cont_btn_color}}" style="width:60%;" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cont_background_image" class="form-label">عکس پس زمینه :<span style="color:#ec0808;">(1903x500)</span></label>
                                        <input name="cont_background_image" class="form-control" type="file" id="image">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="hidden" name="cont_background_image" id="cont_background_image" value="">
                                        <img id="showImage" class="rounded avatar-lg mt-3" src="{{ asset(!empty($continer_manage->cont_background_image) ? $continer_manage->cont_background_image : 'uploads/no_images.jpg') }}" style="border: 1px solid;">
                                        <a href="{{route('admin.container.destroy',$continer_manage->id)}}" class="btn btn-danger mt-4">حذف</a>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="cont_background_attachment" class="form-label">   پوشش پس زمینه  :<span style="color:#ec0808;">*&nbsp</span></label>
                                        <br>
                                        <select class="form-select"  name="cont_background_attachment"  id="floatingSelectGrid" aria-label="Floating label select example">
                                            <option selected>نوع پوشش پس زمینه</option>
                                            <option value="0" {{$continer_manage->cont_background_attachment == 0 ? 'selected' : ''}}>پوشش خودکار</option>
                                            <option value="1" {{$continer_manage->cont_background_attachment == 1 ? 'selected' : ''}}>ثابت</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="cont_description" class="form-label">توضیحات :</label>
                                        <textarea name="cont_description" id="elm1" class="form-control">
                                                       {!! $continer_manage->cont_description !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
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
