@php
    $footer=App\Models\Footer::find(1)->first()
@endphp
<div class="footer wow fadeIn" data-wow-delay="0.3s">
    <div class="container-fluid">
        <div class="container">
            <div class="footer-info">
{{--                <h2>Kate Winslet</h2>--}}
                <h2>{{$footer->footer_name}}</h2>
                <h3>{{$footer->footer_address}}</h3>
                <div class="footer-menu">
                    <p>{{$footer->footer_phone}}</p>
                    <p>{{$footer->footer_email}}</p>
                </div>
                <div class="footer-social">

                    @if($footer->footer_social_instagram != null)
                        <a href="{{$footer->footer_social_instagram}}"><i class="fab fa-instagram"></i></a>

                    @endif
                        @if($footer->footer_social_whatsapp != null)
                            <a href="{{$footer->footer_social_whatsapp}}"><i class="fab fa-whatsapp"></i></a>

                        @endif
                        @if($footer->footer_social_telegram != null)
                            <a href="{{$footer->footer_social_telegram}}"><i class="fab fa-telegram"></i></a>
                        @endif

                        @if($footer->footer_social_x != null)
                            <a href="{{$footer->footer_social_x}}"><i class="fab fa-twitter"></i></a>
                        @endif

                        @if($footer->footer_social_linkedin != null)
                            <a href="{{$footer->footer_social_linkedin}}"><i class="fab fa-linkedin"></i></a>
                        @endif
                        @if($footer->footer_social_facebook != null)
                            <a href="{{$footer->footer_social_facebook}}"><i class="fab fa-facebook"></i></a>
                        @endif

                        @if($footer->footer_social_youtube != null)
                            <a href="{{$footer->footer_social_youtube}}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if($footer->footer_social_apparat != null)
                            <a href="{{$footer->footer_social_apparat}}"><i class="fa fa-video fa-fw"></i></a>
                        @endif
                </div>
            </div>
        </div>
        <div class="container copyright">
            <p>&copy; <a href="{{route('home')}}"> {{$footer->footer_name}} </a> {{$footer->footer_copy_right}} || Designed by <a href="https://webrez.ir/" target="_blank"> WebRez</a></p>
        </div>
    </div>
</div>
<!-- Back to top button -->
<a href="#" class="btn back-to-top"><i class="fa fa-chevron-up"></i></a>


<!-- Pre Loader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>
