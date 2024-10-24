<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DevFolio - Developer Portfolio Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">


    <!-- Favicon -->
{{--    <link href="{{asset('frontend/assets/img/favicon.ico')}}" rel="icon">--}}

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{--{{asset('frontend/assets/')}}--}}
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('frontend/assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
<!-- Nav Bar Start -->
@include('site.layout.nav')
<!-- Nav Bar End -->

@yield('body')
<!-- Footer Start -->
@include('site.layout.footer')
<!-- Footer End -->



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


<script src="{{asset('frontend/assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontend/assets/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/lib/typed/typed.min.js')}}"></script>
<script src="{{asset('frontend/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('frontend/assets/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('frontend/assets/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
</body>
</html>
