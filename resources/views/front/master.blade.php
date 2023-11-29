<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>News Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('front-assets') }}/{{ asset('front-assets') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front-assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front-assets') }}/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
@include('front.inc.front-topbar')
<!-- Topbar End -->


<!-- Navbar Start -->
@include('front.inc.front-navbar')
<!-- Navbar End -->

<!-- Main Start -->

@yield('content')

<!-- Main End -->



<!-- Footer Start -->
@include('front.inc.front-footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('front-assets') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('front-assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('front-assets') }}/js/main.js"></script>
</body>

</html>
