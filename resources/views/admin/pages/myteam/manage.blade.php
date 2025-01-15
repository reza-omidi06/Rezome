@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">مدیریت تیم</h4>
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
                                    <div class="col-md-6 mb-3">
                                        <a href="{{route('admin.myteam.create')}}" class="btn btn-outline-success">
                                            افزودن
                                        </a>
                                    </div>
                                    <div class="col-md-6 mb-3" style="text-align:end;">
                                        <a href="{{ route('export.order') }}" class="btn btn-success">
                                            <i class="fa fa-file-excel"></i>
                                            اکسل
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>

{{--'my_team_background_attachment',--}}
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style=" background: #e7e7ff; color: #566a7f; ">
                                            تغیر عنوان
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <form method="POST" action="{{ route('admin.team.settingteam') }}" class="py-3 accordion-form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$myteamset->id}}">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="my_team_top_head" class="form-label">تغییر بالای عنوان :</label>
                                                    <input id="my_team_top_head" type="text" name="my_team_top_head" class="form-control" value="{{$myteamset->my_team_top_head}}">
                                                    <label for="my_team_top_head_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ بالای عنوان :</label>
                                                    <input id="my_team_top_head_color" type="color" name="my_team_top_head_color" class="form-control" value="{{$myteamset->my_team_top_head_color}}" style="width:16%;" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="my_team_head" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :</label>
                                                    <input id="my_team_head" type="text" name="my_team_head" class="form-control" value="{{$myteamset->my_team_head}}" required>
                                                    <label for="my_team_head_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ  عنوان :</label>
                                                    <input id="my_team_head_color" type="color" name="my_team_head_color" class="form-control" value="{{$myteamset->my_team_head_color}}" style="width:16%;" required>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <label for="my_team_bg_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ پس زمینه :</label>
                                                    <input id="my_team_bg_color" type="color" name="my_team_bg_color" class="form-control" value="{{$myteamset->my_team_bg_color}}" style="width:60%;" required>
                                                </div>
{{--                                                <div class="col-md-2 mb-3">--}}
{{--                                                    <label for="order_setting_btn_color" class="form-label"><span style="color:#ec0808;">*&nbsp</span>رنگ دکمه :</label>--}}
{{--                                                    <input id="order_setting_btn_color" type="color" name="order_setting_btn_color" class="form-control" value="" style="width:60%;" required>--}}
{{--                                                </div>--}}
                                                <div class="col-md-4 mb-3">
                                                    <label for="my_team_bg_image" class="form-label"><span style="color:#ec0808;">1903x500</span>عکس پس زمینه :</label>
                                                    <input name="my_team_bg_image" class="form-control" type="file" id="image">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="hidden" name="primary_image" id="primaryImage" value="">
                                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{asset(!empty($myteamset->my_team_bg_image) ? $myteamset->my_team_bg_image : 'uploads/no_images.jpg')}}" alt="" style="border: 1px solid;">
                                                    <a href="{{route('admin.myteam.delete',$myteamset->id)}}" class="btn btn-danger mt-4">حذف</a>
                                                </div>
                                                <!-- بخش ثابت بودن پس زمینه -->
                                                <div class="col-md-5 mb-3">
                                                    <label for="my_team_background_attachment" class="form-label"><span style="color:#ec0808;">*&nbsp</span>ثابت بودن پس زمینه :</label>
                                                    <br>
                                                    <input type="hidden" name="my_team_background_attachment" value="{{ $myteamset->my_team_background_attachment }}">

                                                    @if($myteamset->my_team_background_attachment == 1)
                                                        <button type="button" class="btn btn-primary" onclick="changeAttachment(0)">پوشش خودکار</button>
                                                    @else
                                                        <button type="button" class="btn btn-success" onclick="changeAttachment(1)">ثابت</button>
                                                    @endif
                                                </div>
                                                <!-- پایان بخش ثابت بودن پس زمینه -->

{{--                                                <div class="col-md-8 mb-3">--}}
{{--                                                    <label for="order_setting_description" class="form-label">توضیحات :</label>--}}
{{--                                                    <textarea name="order_setting_description" id="elm1" class="form-control">--}}

{{--                                                    </textarea>--}}
{{--                                                </div>--}}
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
                                    <th style="text-align:center;">عکس</th>
                                    <th style="text-align:center;">نام</th>
                                    <th style="text-align:center;">موقعیت شغلی </th>
                                    <th style="text-align:center;">شبکه اجتماعی</th>
                                    <th style="text-align:center;">درباره  </th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($myteam as $team)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                           {{$i++}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">

                                            <img class="img_team" src="{{asset(!empty($team->picture_person) ? $team->picture_person  :'uploads/no_images.jpg')}}">

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$team->name_person}}

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$team->job_person}}

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            @if($team->social_person_instagram or $team->social_person_linkedin or  $team->social_person_telegram or $team->social_person_X or $team->social_person_facebook == null)
                                                <p>ثبت نشده</p>
                                            @else

                                                <p>ثبت شده</p>

                                            @endif
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {!! Str::limit(strip_tags($team->about_person),20) !!}
                                        </td>

{{--                                        <td style="text-align:center;line-height: 3rem;">--}}
{{--                                            <img class="img_manag-cat" src="{{asset('uploads/no_images.jpg')}}" alt="{{$view_order->order_mail}}">--}}
{{--                                        </td>--}}
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.myteam.edit',$team->id)}}" class="btn btn-warning sm" title="Show Data">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.myteam.destroy',$team->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
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
            form.action = value === 1 ? '{{ route("admin.mytem.attachment.active") }}' : '{{ route("admin.mytem.attachment.inactive") }}';
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
            idInput.value = '{{ $myteamset->id }}';
            form.appendChild(idInput);

            // ارسال فرم
            document.body.appendChild(form);
            form.submit();
        }

    </script>
@endsection
