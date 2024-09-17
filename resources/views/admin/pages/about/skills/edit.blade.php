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
                                        <h4 class="card-title">اضافه کردن مهارت  </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.skill.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$skill_edit->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="skill_name" class="form-label">عنوان :</label>
                                        <input id="skill_name" type="text" name="skill_name" class="form-control" value="{{$skill_edit->skill_name}}" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="skill_name_en" class="form-label">عنوان :عنوان(لاتین) : </label>
                                        <input id="skill_name_en" type="text" name="skill_name_en" class="form-control" value="{{$skill_edit->skill_name_en}}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="skill_percentage" class="form-label">میزان مهارت : </label>
                                        <input id="skill_percentage" type="number"  name="skill_percentage" class="form-control" value="{{$skill_edit->skill_percentage}}" >
                                    </div>
                                    <div class="col-md-9 mb-3">
                                        <label for="description" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description" class="form-control">
                                            {{$skill_edit->description}}
                                        </textarea>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی کردن </button>
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
