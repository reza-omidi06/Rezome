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
                            <form method="POST" action="{{route('admin.fecureplan.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="plan_type_id" class="form-label">انتخاب پلن  </label>
                                        <select name="plan_type_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                            <option data-select2-id="3">انتخاب</option>
                                            <optgroup label="پلن">
                                                @foreach($plans as $plan)
                                                    <option value="{{$plan->id}}">{{$plan->name_type_fa}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <!--end row-->
                                 <div class="row">
                                     <div class="col-md-6 mb-3" >
                                        <label for="features" class="form-label"><span style="color:#ec0808;">*&nbsp</span> ویژگی  :</label>
                                         <input type="text" name="features" class="form-control" id="tag" data-role="tagsinput" required>
                                     </div>
                                 </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="feature_description" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="feature_description" class="form-control">

                                        </textarea>
                                    </div>
                                </div>
                                <!--end row-->
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
@endsection
