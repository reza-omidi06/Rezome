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
                                        <h4 class="card-title">مشاهده </h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: end;">
                                        <a href="{{route('admin.contact.manage')}}">
                                            <h4 class="btn btn-outline-primary">بازگشت</h4>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid c-fluid">
                                <div class="row row_tes">
                                    <div class="col-md-3 testimonial_col_fo ">
                                        <h5 class="h5_cus">نام :
                                            <span class="span_cus">
                                                {{$contact_views->name}}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 testimonial_col_fo ">
                                        <h5 class="h5_cus">
                                            ایمیل :
                                            <span class="span_cus">
                                            {{$contact_views->email}}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 testimonial_col_fo ">
                                        <h5 class="h5_cus">شماره همراه :
                                            <span class="span_cus">
                                                {{$contact_views->phone}}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 testimonial_col_fo ">
                                        <h5 class="h5_cus"> موضوع :
                                            <span class="span_cus">
                                                {{$contact_views->subject}}
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row row_tes">
                                    <div class="col-md-8 testimonial_col_fo">
                                        <h5 class="h5_cus">پیام  :
                                            <span class="span_cus">
                                                 {!! $contact_views->massage !!}
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
