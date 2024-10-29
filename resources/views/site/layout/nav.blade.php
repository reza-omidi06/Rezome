@php
    $nav=App\Models\Nav::find(1)->first();
@endphp
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
{{--        <a href="{{route('home')}}" class="navbar-brand">--}}
{{--            DevFolio--}}
{{--        </a> --}}
        <a href="{{route('home')}}" class="navbar-brand">
            @if($nav->image_site != null)
                <img src="{{asset($nav->image_site)}}" width="250" height="50">
            @elseif($nav->name_site != null)
                {{$nav->name_site}}
            @else
                <!-- Optional: Placeholder text or image if both are null -->
                <span>Default Brand Name</span>
            @endif
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="direction: rtl">
            <div class="navbar-nav ml-auto">
                <a href="#home" class="nav-item nav-link active">صفحه اصلی</a>
                <a href="#about" class="nav-item nav-link">درباره من</a>
                <a href="#service" class="nav-item nav-link">خدمات</a>
                <a href="#experience" class="nav-item nav-link">سوابق شغلی </a>
                <a href="#portfolio" class="nav-item nav-link">نمونه کار</a>
                <a href="#price" class="nav-item nav-link">قیمت</a>
                <a href="#review" class="nav-item nav-link">نظرات</a>
                <a href="#team" class="nav-item nav-link">Team</a>
                <a href="#blog" class="nav-item nav-link">Blog</a>
                <a href="#contact" class="nav-item nav-link">تماس با ما</a>
            </div>
        </div>
    </div>
</div>
