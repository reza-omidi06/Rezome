@php
$view_slider=App\Models\Slider::find(1)->first();
 @endphp
<div class="hero" id="home" style="background: {{$view_slider->background_color}};, url({{$view_slider->background_img}});direction: rtl;">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6">
                <div class="hero-content">
                    <div class="hero-text">
                        <p>{{$view_slider->title}}</p>
                        <h1>{{$view_slider->name}}</h1>
                        <h2></h2>
                        <div class="typed-text">
                            {{$view_slider->text_dynamic}}
{{--                            sss ssa, 222, a--}}
                        </div>
{{--                        <div class="typed-text">Web Designer, Web Developer, Front End Developer, Apps Designer, Apps Developer</div>--}}
                    </div>
                    <div class="hero-btn">
                        <a class="btn" href="#">{{$view_slider->btn_name_one}}</a>
                        <a class="btn" href="#">{{$view_slider->btn_name_tow}}</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 d-none d-md-block">
                <div class="hero-image">
                    <img src="{{asset('frontend/assets/img/hero.png')}}" alt="Hero Image">
                </div>
            </div>
        </div>
    </div>
</div>
