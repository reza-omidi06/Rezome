@extends('admin.backend_master.dashboard.master_page')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">مدیریت سفارشات</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <a href="{{ route('export.order') }}" class="btn btn-outline-success">
                                            <i class="fa fa-file-excel"></i>
                                            اکسل
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style=" background: #e7e7ff; color: #566a7f; ">
                                            تغیر عنوان
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
{{--                                        <form method="POST" action="{{route('admin.order.setting')}}"  class="py-3 accordion-form" enctype="multipart/form-data">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="id" value="{{$order_setting->id}}">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-6 mb-3">--}}
{{--                                                    <label for="order_setting_title_up_title" class="form-label"> تغیر بالای عنوان  :</label>--}}
{{--                                                    <input id="order_setting_title_up_title" type="text" name="order_setting_title_up_title" class="form-control" value="{{$order_setting->order_setting_title_up_title}}">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-6 mb-3">--}}
{{--                                                    <label for="order_setting_title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :</label>--}}
{{--                                                    <input id="order_setting_title" type="text" name="order_setting_title" class="form-control" value="{{$order_setting->order_setting_title}}" required>--}}

{{--                                                </div>--}}
{{--                                                <div class="col-md-2 mb-3">--}}
{{--                                                    <label for="order_setting_back_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ پس زمینه :</label>--}}
{{--                                                    <input id="order_setting_back_color" type="color" name="order_setting_back_color" class="form-control" value="{{$order_setting->order_setting_back_color}}" style="width:60%;" required>--}}

{{--                                                </div>--}}
{{--                                                <div class="col-md-4 mb-3">--}}
{{--                                                    <label for="order_setting_back_image" class="form-label"><span style="color:#ec0808;">1903x500</span>عکس پس زمینه :</label>--}}
{{--                                                    <input name="order_setting_back_image" class="form-control" type="file"   id="image">--}}

{{--                                                </div>--}}
{{--                                                <div class="col-md-3 mb-3">--}}
{{--                                                    <input type="hidden" name="primary_image"id="primaryImage" value="">--}}
{{--                                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ asset( !empty($order_setting->order_setting_back_image) ? $order_setting->order_setting_back_image : 'uploads/no_images.jpg' ) }}" style="border: 1px solid;">--}}
{{--                                                    <a href="{{route('admin.order.destroy',$order_setting->id)}}" class="btn btn-danger mt-4">حذف</a>--}}

{{--                                                </div>--}}
{{--                                                <div class="col-md-5 mb-3">--}}
{{--                                                    <label for="order_setting_back_attachment" class="form-label"><span style="color:#ec0808;">*&nbsp</span>ثابت بودن  پس زمینه :</label>--}}
{{--                                                    <br>--}}
{{--                                                    @if($order_setting->order_setting_back_attachment == 1)--}}
{{--                                                        <form action="{{route('admin.attachment.inactive')}}" method="POST" style="display:inline;">--}}
{{--                                                            @csrf--}}
{{--                                                            <input type="hidden" name="id" value="{{ $order_setting->id }}">--}}
{{--                                                            <button type="submit" class="btn btn-success">پوشش خودکار</button>--}}
{{--                                                        </form>--}}
{{--                                                    @else--}}
{{--                                                        <form action="{{route('admin.attachment.active')}}" method="POST" style="display:inline;">--}}
{{--                                                            @csrf--}}
{{--                                                            <input type="hidden" name="id" value="{{ $order_setting->id }}">--}}
{{--                                                            <button type="submit" class="btn btn-danger">ثابت</button>--}}
{{--                                                        </form>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-8 mb-3">--}}
{{--                                                    <label for="order_setting_description" class="form-label">توضیحات :</label>--}}
{{--                                                    <textarea name="order_setting_description" id="elm1" class="form-control">--}}
{{--                                                        {!! $order_setting->order_setting_description !!}--}}
{{--                                                    </textarea>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end row-->--}}
{{--                                            <div class="row mb-3">--}}
{{--                                                <div class="col-md-5">--}}
{{--                                                    <button type="submit" class="btn btn-primary"> بروزرسانی </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                        <form method="POST" action="{{ route('admin.order.setting') }}" class="py-3 accordion-form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $order_setting->id }}">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="order_setting_title_up_title" class="form-label">تغییر بالای عنوان :</label>
                                                    <input id="order_setting_title_up_title" type="text" name="order_setting_title_up_title" class="form-control" value="{{ $order_setting->order_setting_title_up_title }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="order_setting_title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :</label>
                                                    <input id="order_setting_title" type="text" name="order_setting_title" class="form-control" value="{{ $order_setting->order_setting_title }}" required>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="order_setting_back_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ پس زمینه :</label>
                                                    <input id="order_setting_back_color" type="color" name="order_setting_back_color" class="form-control" value="{{ $order_setting->order_setting_back_color }}" style="width:60%;" required>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="order_setting_btn_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ دکمه :</label>
                                                    <input id="order_setting_btn_color" type="color" name="order_setting_btn_color" class="form-control" value="{{ $order_setting->order_setting_btn_color }}" style="width:60%;" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="order_setting_back_image" class="form-label"><span style="color:#ec0808;">1903x500</span>عکس پس زمینه :</label>
                                                    <input name="order_setting_back_image" class="form-control" type="file" id="image">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="hidden" name="primary_image" id="primaryImage" value="">
                                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ asset(!empty($order_setting->order_setting_back_image) ? $order_setting->order_setting_back_image : 'uploads/no_images.jpg') }}" style="border: 1px solid;">
                                                    <a href="{{ route('admin.order.destroysetting', $order_setting->id) }}" class="btn btn-danger mt-4">حذف</a>
                                                </div>

                                                <!-- بخش ثابت بودن پس زمینه -->
                                                <div class="col-md-5 mb-3">
                                                    <label for="order_setting_back_attachment" class="form-label"><span style="color:#ec0808;">*&nbsp</span>ثابت بودن پس زمینه :</label>
                                                    <br>
                                                    <input type="hidden" name="order_setting_back_attachment" value="{{ $order_setting->order_setting_back_attachment }}">
                                                    @if($order_setting->order_setting_back_attachment == 1)
                                                        <button type="button" class="btn btn-primary" onclick="changeAttachment(0)">پوشش خودکار</button>
                                                    @else
                                                        <button type="button" class="btn btn-success" onclick="changeAttachment(1)">ثابت</button>
                                                    @endif
                                                </div>
                                                <!-- پایان بخش ثابت بودن پس زمینه -->

                                                <div class="col-md-8 mb-3">
                                                    <label for="order_setting_description" class="form-label">توضیحات :</label>
                                                    <textarea name="order_setting_description" id="elm1" class="form-control">
                                                        {!! $order_setting->order_setting_description !!}
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
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">پلن</th>
                                    <th style="text-align:center;">نام</th>
                                    <th style="text-align:center;">شماره تماس</th>
                                    <th style="text-align:center;">ایمیل</th>
                                    <th style="text-align:center;">توضیحات</th>
                                    <th style="text-align:center;">تصویر</th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($view_orders as $view_order)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                         #
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{optional($view_order->plan)->name_type_fa}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$view_order->order_name}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$view_order->order_phone}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$view_order->order_mail}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {!! Str::limit(strip_tags($view_order->order_description),20) !!}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            <img class="img_manag-cat" src="{{asset('uploads/no_images.jpg')}}" alt="{{$view_order->order_mail}}">
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.order.show',$view_order->id)}}" class="btn btn-warning sm" title="Show Data">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.order.destroy',$view_order->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

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
    <script>
        function changeAttachment(value) {
            // ایجاد فرم جدید
            var form = document.createElement('form');
            form.method = 'POST';

            // تعیین مسیر درخواست با استفاده از route در PHP و اضافه کردن 'active' یا 'inactive'
            form.action = value === 1 ? '{{ route("admin.attachment.active") }}' : '{{ route("admin.attachment.inactive") }}';

            // افزودن ورودی CSRF
            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            // افزودن ورودی ID
            var idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = '{{ $order_setting->id }}';
            form.appendChild(idInput);

            // ارسال فرم
            document.body.appendChild(form);
            form.submit();
        }

    </script>
@endsection
