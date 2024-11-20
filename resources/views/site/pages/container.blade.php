@php
    $continer=App\Models\ContinerSetting::find(1)->first();
@endphp
<style>
    .bannercontainer {
        position: relative;
        width: 100%;
        margin: 45px 0;
        padding: 90px 0;
        text-align: center;
        background: {{$continer->cont_background_color}};
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url({{asset($continer->cont_background_image)}});
        @if($continer->cont_background_attachment != 1)
            Background-attachment: unset;
        @else
            Background-attachment: fixed;
        @endif


    }
    .bannercontainer .btn:hover{
        background-color:{{$continer->cont_btn_color}}e3;
        color: {{$continer->cont_background_color}};
        /*color: #ef233c;*/
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        bottom: 23px;
        right: 28px;
        width: 20%;
        margin: 1rem;
    }
    .bannercontainer .btn{
        padding: 12px 25px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        background-color: {{$continer->cont_btn_color}};
        color: {{$continer->cont_background_color}};
        border: 2px solid {{$continer->cont_btn_color}};
        border-radius: 0;
        transition: ease-out 0.3s;
        -webkit-transition: ease-out 0.3s;
        width: 20%;
    }
    .section-header p::after {
        background: {{$continer->up_title_color}};
    }

</style>


<div class="bannercontainer wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-header text-center">
{{--            <p>Reasonable Price</p>--}}
            <p style="background-color:#FFFFFF00;color:{{$continer->up_title_color}};">{{$continer->up_title}}</p>
{{--            <h2>Get A <span>Special</span> Price</h2>--}}
            <h2 style="color:{{$continer->title_color}};">{{$continer->title}}</h2>
        </div>
        <div class="container banner-text">
{{--            <p>--}}
{{--                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus.--}}
{{--            </p>--}}
            <p>
                {!! $continer->cont_description !!}
            </p>
            <a class="btn" href="{{$continer->cont_link}}">Pricing Plan</a>
        </div>
    </div>
</div>

