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
                                        <h4 class="card-title">افزودن نوع پلن   </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.plantype.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$edit_show->id}}">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name_type_fa" class="form-label"> نام  :</label>
                                        <input id="name_type_fa" type="text" name="name_type_fa" class="form-control" value="{{$edit_show->name_type_fa}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name_type_en" class="form-label"> نام(لاتین) : </label>
                                        <input id="name_type_en" type="text" name="name_type_en" class="form-control" value="{{$edit_show->name_type_en}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="price_type" class="form-label"> قیمت(تومان) : </label>
                                        <input id="price_type" type="text" name="price_type" class="form-control" value="{{$edit_show->price_type}}">
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="description" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description_type" class="form-control">
                                                {!! $edit_show->description_type !!}
                                        </textarea>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی</button>
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
