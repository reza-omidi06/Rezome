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
                                        <h4 class="card-title">اضافه موقعیت کاری  </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.plantype.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$edit_rezome->id }}">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="jobـposition" class="form-label"><span style="color:#ec0808;">*&nbsp</span>موقعیت شغلی :</label>
                                        <input id="jobـposition" type="text" name="jobـposition" class="form-control"  value="{{$edit_rezome->jobـposition}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="jobـposition_en" class="form-label"><span style="color:#ec0808;">* موقعیت شغلی(لاتین) : </label>
                                        <input id="jobـposition_en" type="text" name="jobـposition_en" class="form-control" value="{{$edit_rezome->jobـposition_en}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="title" class="form-label"><span style="color:#ec0808;">*&nbsp</span> عنوان :</label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{$edit_rezome->title}}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="title" class="form-label"><span style="color:#ec0808;">*&nbsp</span> عنوان :</label>
                                        <input id="title" type="text" name="title" class="form-control" value="{{$edit_rezome->title}}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="span_labl_cus"> در صورت خالی بودن  سال پایان فعالیت نشان دهنده مشغول به کار بودن است </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="Jobـstartـdate" class="form-label"><span style="color:#ec0808;">*&nbsp</span>سال شروع فعالیت :</label>
                                        <input id="Jobـstartـdate" type="text" name="Jobـstartـdate" class="form-control" value="{{$edit_rezome->Jobـstartـdate}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="jobـposition" class="form-label"><span style="color:#ec0808;">  *&nbsp</span> سال پایان فعالیت  :</label>
                                        <input id="Jobـendـdate" type="text" name="Jobـendـdate" class="form-control" value="{{$edit_rezome->jobـposition}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 mb-3">
                                        <label for="description_rezome" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description_rezome" class="form-control">
                                            {!! $edit_rezome->description_rezome !!}
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
