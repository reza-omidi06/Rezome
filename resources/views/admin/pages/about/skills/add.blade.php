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
                            <form method="POST" action="{{route('admin.skill.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="skill_name" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :</label>
                                        <input id="skill_name" type="text" name="skill_name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="skill_name_en" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :عنوان(لاتین) : </label>
                                        <input id="skill_name_en" type="text" name="skill_name_en" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="skill_percentage" class="form-label"> <span style="color:#ec0808;">*&nbsp</span>میزان مهارت : </label>
                                        <input id="skill_percentage" type="number"  name="skill_percentage" class="form-control" required>
                                    </div>
                                    <div class="col-md-9 mb-3">
                                        <label for="description" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description" class="form-control">

                                        </textarea>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-success">اضافه کردن </button>
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
