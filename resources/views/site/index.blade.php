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
@include('site.pages.container')
<!-- Banner Start -->

<!-- Banner End -->
<!-- Banner End -->

<!-- Portfolio Start -->
@include('site.pages.portfolio')
<!-- Portfolio End -->

<!-- Testimonial Start -->
@include('site.pages.testimonial')
<!-- Testimonial End -->




<!-- Price Start -->
@include('site.pages.price')
<!-- Price End -->

<!-- Banner Start -->
@include('site.pages.order')
<!-- Banner End -->


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
