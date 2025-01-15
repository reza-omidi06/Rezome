@php
    $setting=App\Models\MyTeamSet::find(1)->first();
@endphp
{{--'my_team_top_head_color',--}}{{-- done--}}
{{--'my_team_head_color',--}}{{--donex--}}
{{--'my_team_bg_color',--}}{{--done--}}
{{--'my_team_bg_image',--}}{{-- done--}}
{{--'my_team_background_attachment',--}}
<style>
    /*******************************/
    /*********** Team CSS **********/
    /*******************************/
    .team {
        position: relative;
        width: 100%;
        padding: 65px 0 20px 0;
        background-color: {{$setting->my_team_bg_color}};
        background-image: url("{{$setting->my_team_bg_image}}");
        @if($setting->my_team_background_attachment != 1)
            Background-attachment: unset;
        @else
            Background-attachment: fixed;
        @endif
    }
    .section-header p::before {
        position: absolute;
        content: "";
        height: 3px;
        top: 11px;
        right: 0;
        left: -30px;
        background: #5d5ea5;
        z-index: -1;
    }
    .section-header p::after {
        background: {{$setting->my_team_top_head_color}};
    }
</style>
<div class="team" id="team">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p style="color: {{$setting->my_team_top_head_color}}; background:#ffffff00;">{{$setting->my_team_top_head}}</p>
            <h2 style="color: {{$setting->my_team_head_color}};">{{$setting->my_team_head}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.0s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset('frontend/assets/img/team-1.jpg')}}" alt="Image">
                    </div>
                    <div class="team-text">
                        <h2>Mollie Ross</h2>
                        <h4>Web Designer</h4>
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accum lacus
                        </p>
                        <div class="team-social">
                            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset('frontend/assets/img/team-2.jpg')}}" alt="Image">
                    </div>
                    <div class="team-text">
                        <h2>Dylan Adams</h2>
                        <h4>Web Developer</h4>
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accum lacus
                        </p>
                        <div class="team-social">
                            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset('frontend/assets/img/team-3.jpg')}}" alt="Image">
                    </div>
                    <div class="team-text">
                        <h2>Jennifer Page</h2>
                        <h4>Apps Designer</h4>
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accum lacus
                        </p>
                        <div class="team-social">
                            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset('frontend/assets/img/team-4.jpg')}}" alt="Image">
                    </div>
                    <div class="team-text">
                        <h2>Josh Dunn</h2>
                        <h4>Apps Developer</h4>
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accum lacus
                        </p>
                        <div class="team-social">
                            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<link href="{{asset('frontend/assets/css/style_comment.css')}}" rel="stylesheet">

<script src="{{asset('frontend/assets/js/main_comment.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="{{asset('frontend/assets/img/registration-form-6.jpg')}}" alt="">
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Make An Appointment</h3>
            <div class="form-row">
                <input type="text" class="form-control" placeholder="Name">
                <input type="text" class="form-control" placeholder="Mail">
            </div>
            <div class="form-row">
                <input type="text" class="form-control" placeholder="Phone">
                <div class="form-holder">
                    <input type="text" class="form-control" placeholder="Phone">
                </div>
            </div>
            <textarea name="" id="" placeholder="Message" class="form-control" style="height: 130px;"></textarea>
            <button>Book Now
                <i class="zmdi zmdi-long-arrow-right"></i>
            </button>
        </form>

    </div>
</div>
-->
