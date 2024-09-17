@extends('site.layout.masterpage')
@section('body')

<!-- HeroStart -->
@include('site.pages.slider')
<!-- Hero End -->


<!-- About Start -->
@include('site.pages.about')
<!-- About End -->

<!-- Service Start -->
@include('site.pages.service')
<!-- Service End -->

<!-- Experience Start -->
@include('site.pages.experience')
<!-- Job Experience End -->

<!-- Banner Start -->
<div class="banner wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-header text-center">
            <p>Reasonable Price</p>
            <h2>Get A <span>Special</span> Price</h2>
        </div>
        <div class="container banner-text">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus.
            </p>
            <a class="btn">Pricing Plan</a>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Portfolio Start -->
@include('site.pages.portfolio')
<!-- Portfolio End -->

<!-- Banner Start -->
<div class="banner wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-header text-center">
            <p>Awesome Discount</p>
            <h2>Get <span>30%</span> Discount</h2>
        </div>
        <div class="container banner-text">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus.
            </p>
            <a class="btn">Order Now</a>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Price Start -->
@include('site.pages.price')
<!-- Price End -->

<!-- Testimonial Start -->
@include('site.pages.testimonial')
<!-- Testimonial End -->

<!-- Team Start -->
@include('site.pages.team')
<!-- Team End -->

<!-- Contact Start -->
@include('site.pages.contact')
<!-- Contact End -->

<!-- Blog Start -->
@include('site.pages.blog')
<!-- Blog End -->

@endsection
