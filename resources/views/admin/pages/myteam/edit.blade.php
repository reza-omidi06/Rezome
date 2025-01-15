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
                                        <h4 class="card-title">مشخصات فرد </h4>
                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="{{route('admin.myteam.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"  value="{{$myteam_id->id}}">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name_person" class="form-label"><span style="color:#ec0808;">*&nbsp</span> نام  :</label>
                                        <input id="name_person" type="text" name="name_person" class="form-control" value="{{$myteam_id->name_person}}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name_personـen" class="form-label"><span style="color:#ec0808;">*&nbsp</span> نام(لاتین) : </label>
                                        <input id="name_personـen" type="text" name="name_personـen" class="form-control" value="{{$myteam_id->name_personـen }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="job_person" class="form-label"><span style="color:#ec0808;">*&nbsp</span>موقعیت شغلی : </label>
                                        <input id="job_person" type="text" name="job_person" class="form-control" value="{{$myteam_id->job_person }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="about_person" class="form-label">توضیحات فردی : </label>
                                        <textarea id="elm1" type="text" name="about_person" class="form-control">
                                            {!! $myteam_id->about_person  !!}
                                        </textarea>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="picture_person" class="form-label">ابعاد عکس : <span style="color:#d52626;font-size: 0.7rem;">(263x263)</span></label>
                                        <input name="picture_person" class="form-control" type="file"   id="image"   style="width: 32%;">
                                        <input type="hidden" name="picture_person" id="primaryImage" value="">
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset(!empty($myteam_id->picture_person)  ? $myteam_id->picture_person : asset('uploads/no_images.jpg'))}}" style="border: 1px solid;">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style=" background: #e7e7ff; color: #566a7f; ">
                                               شبکه های اجتماعی
                                            </button>
                                        </h4>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse p-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="social_person_instagram" class="form-label"><span ><i class='bx bxl-instagram'></i>|</span> Instagram  :</label>
                                                    <input id="social_person_instagram" type="text" name="social_person_instagram" class="form-control" value="{{$myteam_id->social_person_instagram}}" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="social_person_linkedin" class="form-label"><span><i class='bx bxl-linkedin' ></i>|</span> linkedin : </label>
                                                    <input id="social_person_linkedin" type="text" name="social_person_linkedin" class="form-control" value="{{$myteam_id->social_person_linkedin}}" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="social_person_telegram" class="form-label"><span><i class='bx bxl-telegram' ></i>|</span>Telegram : </label>
                                                    <input id="social_person_telegram" type="text" name="social_person_telegram" class="form-control" value="{{$myteam_id->social_person_telegram}}" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="social_person_X" class="form-label"><span ><i class='bx bxl-twitter'></i>|</span> Twitter  :</label>
                                                    <input id="social_person_X" type="text" name="social_person_X" class="form-control" value="{{$myteam_id->social_person_X}}" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="social_person_facebook" class="form-label"><span><i class='bx bxl-facebook-circle' ></i>|</span>Facebook : </label>
                                                    <input id="social_person_facebook" type="text" name="social_person_facebook" class="form-control" value="{{$myteam_id->social_person_facebook}}" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3 mt-3">
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
