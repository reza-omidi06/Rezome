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
                                        <h4 class="card-title">تنظیمات منو </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$foote_duct->id}}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="footer_name" class="form-label"><span style="color:#ec0808;">*&nbsp</span>نام :</label>
                                        <input id="footer_name" type="text" name="footer_name" class="form-control" value="{{$foote_duct->footer_name}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="footer_address" class="form-label"><span style="color:#ec0808;">*&nbsp</span>آدرس :</label>
                                        <input id="footer_address" type="text" name="footer_address" class="form-control" value="{{$foote_duct->footer_address}}" required >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="footer_email" class="form-label"><span style="color:#ec0808;">*&nbsp</span>ایمیل :</label>
                                        <input id="footer_email" type="email" name="footer_email" class="form-control" value="{{$foote_duct->footer_email}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="footer_phone" class="form-label"><span style="color:#ec0808;">*&nbsp</span>شماره تماس :</label>
                                        <input id="footer_phone" type="text" name="footer_phone" class="form-control" value="{{$foote_duct->footer_phone}}" required>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p class="p-set-dev">
                                            در صورتی که لینک خالی باشد. شبکه اجتماعی نمایش داده نمیشود.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Instagram-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_instagram" class="form-label"><i class='bx bxl-instagram'>اینستاگرام :</i></label>
                                        <input id="footer_social_instagram" type="text" name="footer_social_instagram" class="form-control" value="{{$foote_duct->footer_social_instagram}}" >
                                    </div>
                                    <!--Facebook-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_facebook" class="form-label"><i class='bx bxl-facebook-circle' > فیس بوک :</i></label>
                                        <input id="footer_social_facebook" type="text" name="footer_social_facebook" class="form-control" value="{{$foote_duct->footer_social_facebook}}" >
                                    </div>
                                    <!--Whatsapp-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_whatsapp" class="form-label"><i class='bx bxl-whatsapp' >واتس اپ :</i></label>
                                        <input id="footer_social_whatsapp" type="text" name="footer_social_whatsapp" class="form-control" value="{{$foote_duct->footer_social_whatsapp}}" >
                                    </div>
                                    <!--Telegram-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_telegram" class="form-label"><i class='bx bxl-telegram' >تلگرام :</i></label>
                                        <input id="footer_social_telegram" type="text" name="footer_social_telegram" class="form-control" value="{{$foote_duct->footer_social_telegram}}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <!--X-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_x" class="form-label"><i class='bx bx-x' >ایکس :</i></label>
                                        <input id="footer_social_x" type="text" name="footer_social_x" class="form-control" value="{{$foote_duct->footer_social_x}}" >
                                    </div>
                                    <!--Linkin-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_linkedin" class="form-label"> <i class='bx bxl-linkedin-square' >لینکدین :</i></label>
                                        <input id="footer_social_linkedin" type="text" name="footer_social_linkedin" class="form-control" value="{{$foote_duct->footer_social_linkedin}}" >
                                    </div>
                                    <!--Youtube-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_youtube" class="form-label"><i class='bx bxl-youtube' >یوتوب :</i></label>
                                        <input id="footer_social_youtube" type="text" name="footer_social_youtube" class="form-control" value="{{$foote_duct->footer_social_youtube}}" >
                                    </div>
                                    <!--Apparat-->
                                    <div class="col-md-3 mb-3">
                                        <label for="footer_social_apparat" class="form-label"><i class='bx bx-movie-play' >آپارات :</i></label>
                                        <input id="footer_social_apparat" type="text" name="footer_social_apparat" class="form-control" value="{{$foote_duct->footer_social_apparat}}" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="footer_copy-right" class="form-label"><i class='bx bxs-copyright' >کپی رایت :</i> </label>
                                        <input id="footer_copy-right" type="text" name="footer_copy_right" class="form-control" value="{{$foote_duct->footer_copy_right}}" >
                                    </div>
                                </div>

                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی  </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script type="text/javascript">
        $(document).on('click', '.btn-danger', function(e) {
            e.preventDefault();

            // دریافت آی‌دی مورد نظر
            var id = $('input[name="id"]').val();

            // درخواست AJAX برای حذف عکس
            $.ajax({
                url: '{{ route("admin.setting.deletePhoto") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    alert(response.success);
                    $('#showImage').attr('src', 'uploads/no_images.jpg');
                }
            });
        });
    </script>

@endsection
