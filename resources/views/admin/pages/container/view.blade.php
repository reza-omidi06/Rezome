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
                                        <h4 class="card-title">مشاهده نظرات </h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: end;">
                                        <a href="{{route('admin.order.manage')}}">

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
                                                   {{$show_order->order_name}}

                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 testimonial_col_fo ">
                                        <h5 class="h5_cus">پلن انتخابی :
                                            <span class="span_cus">
                                               {{optional($show_order->plan)->name_type_fa}}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 testimonial_col_fo ">
                                        <h5 class="h5_cus">قیمت پلن :
                                            <span class="span_cus">
                                                {{optional($show_order->plan)->price_type}}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 testimonial_col_fo ">
                                        <h5 class="h5_cus">شماره همراه :
                                            <span class="span_cus">
                                                {{$show_order->order_phone}}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 testimonial_col_fo ">
                                        <h5 class="h5_cus">
                                            ایمیل :  <span class="span_cus">
                                                {{$show_order->order_mail}}

                                            </span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row row_tes">
                                    <div class="col-md-8 testimonial_col_fo">
                                        <h5 class="h5_cus">پیام  :
                                            <span class="span_cus">
                                                    {!! $show_order->order_description !!}
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row row_tes">
                                    <div class="col-md-4">
                                        <h5 class="h5_cus">تصویر :
                                            <br>
                                            <img class="img_manag-cat mt-3" src="{{asset(!empty($show_order->order_file) ? $show_order->order_file : 'uploads/no_images.jpg')}}">
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"style="width:15%;text-align: center;">
                                        <h3 class="h5_cus"style="text-align: start;">وضعیت نمایش</h3>
                                        <hr>
                                       {{$show_order->order_status}}
{{--                                        @if($show_massage->testimonial_status != 0)--}}
{{--                                        <form action="{{route('admin.testimonial.hidden')}}" method="POST" style="display:inline;">--}}
{{--                                            @csrf--}}
{{--                                        <input type="hidden" name="id" value="{{$show_massage->id}}">--}}
{{--                                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-eye"></i></button>--}}
{{--                                        </form>--}}
{{--                                        @else--}}
{{--                                        <form action="{{route('admin.testimonial.show')}}" method="POST" style="display:inline;">--}}
{{--                                            @csrf--}}
{{--                                                <input type="hidden" name="id" value="{{$show_massage->id}}">--}}
{{--                                            <button type="submit" class="btn btn-danger"><i class="fa-regular fa-eye-slash"></i></button>--}}
{{--                                        </form>--}}
{{--                                        @endif--}}

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
