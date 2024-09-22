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
                                        <h4 class="card-title">ویرایش کردن خدمات  </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.service.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$edit_view->id }}">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :</label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{$edit_view->title}}" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="title_en" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان (لاتین) : </label>
                                        <input id="title_en" type="text" name="title_en" class="form-control" value="{{$edit_view->title_en}}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 mb-3">
                                        <label for="description_services" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description_services" class="form-control">
                                                {!! $edit_view->description_services !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="icon_services" class="form-label"><span style="color:#ec0808;">*&nbsp</span>آیکون :  <span style="color:#d52626;font-size: 0.7rem;">(fa fa-laptop)</span></label>
                                    <input id="icon_services" type="text" name="icon_services" class="form-control" value="{{$edit_view->icon_services}}">
                                    <i class="{{$edit_view->icon_services}} li-edit-view" ></i>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="image_services" class="form-label">ابعاد عکس : <span style="color:#d52626;font-size: 0.7rem;">(683x854)</span></label>
                                        <input name="image_services" class="form-control" type="file"   id="image"   style="width: 32%;">
                                        <input type="hidden" name="primary_image"id="primaryImage" value="">
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset( !empty($edit_view->image_services) ? $edit_view->image_services : 'uploads/no_images.jpg' ) }}" style="border: 1px solid;">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>

                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">ویرایش کردن </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
