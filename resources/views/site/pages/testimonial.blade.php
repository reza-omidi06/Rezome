<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@php
        $view_testimonial = App\Models\Testimonial::latest()->get();

@endphp
<div class="testimonial wow fadeInUp" data-wow-delay="0.1s" id="review">
    <div class="container">
        <div class="testimonial-icon">
            <i class="fa fa-quote-left"></i>
        </div>
        <div class="owl-carousel testimonials-carousel">
            @foreach($view_testimonial as $testimonial)
                @if($testimonial->testimonial_status != 0)
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="{{asset(!empty($testimonial->testimonial_image) ? $testimonial->testimonial_image : 'uploads/no_images.jpg')}}" alt="Image">
                        </div>
                        <div class="testimonial-text">
                            <p>{!! $testimonial->testimonial_comment !!}</p>
                            <h3>{{$testimonial->testimonial_customer}}</h3>
                            <h4>{{$testimonial->testimonial_profession}}</h4>
                        </div>
                    </div>
                @endif
            @endforeach

{{--            <div class="testimonial-item">--}}
{{--                <div class="testimonial-img">--}}
{{--                    <img src="{{asset('frontend/assets/img/testimonial-2.jpg')}}" alt="Image">--}}
{{--                </div>--}}
{{--                <div class="testimonial-text">--}}
{{--                    <p>Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum. Lorem ipsum dolor sit amet consec adipis elit.</p>--}}
{{--                    <h3>Customer Name</h3>--}}
{{--                    <h4>Profession</h4>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="testimonial-item">--}}
{{--                <div class="testimonial-img">--}}
{{--                    <img src="{{asset('frontend/assets/img/testimonial-3.jpg')}}" alt="Image">--}}
{{--                </div>--}}
{{--                <div class="testimonial-text">--}}
{{--                    <p>Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum. Lorem ipsum dolor sit amet consec adipis elit.</p>--}}
{{--                    <h3>Customer Name</h3>--}}
{{--                    <h4>Profession</h4>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>

    <button class="open-button" onclick="openForm()">ثبت نظر</button>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-popup" id="myForm">
                    <form action="{{route('admin.testimonial.store')}}" method="POST" enctype="multipart/form-data" class="form-container">
                        @csrf
                        <span class="span-st">نظرات شما</span>
                        <hr style="width:50%">
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <input type="text" name="testimonial_customer" class="form-control mt-0" placeholder="نام " >
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="testimonial_mail" class="form-control" placeholder="ex@mail.com" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="tel" name="testimonial_phone" class="form-control" placeholder="0912" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="testimonial_profession" class="form-control mt-0" placeholder="حرفه" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-10">
                                <textarea type="text" name="testimonial_comment" class="form-control"></textarea>
                            </div>
                            <div class="col-md-4 col-four-md">
                                <input type="file" id="file" name="testimonial_image"/>
                                <label for="file" class="btn-1">فایل پیوست</label>
                                <br>
                                <img id="showImage" class="rounded avatar-lg" src="{{asset('uploads/no_images.jpg')}}" style="border: 1px solid; border-radius: 50px !important; width: 90px; height: 90px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">ثبت نظر</button>
                            </div>
                            <div class="col">
                                <button id="image_uploads" type="button" class="btn cancel" onclick="closeForm()">بستن</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#file').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'ارسال شد!',
            text: "{{ session(' پیام شما با موفقیت ارسال شد!') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
