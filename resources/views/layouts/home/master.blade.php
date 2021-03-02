<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Company Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('home/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('home/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('home/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v2.1.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('layouts.home.header')

  @include('layouts.home.slider')

  @yield('home')

  @include('layouts.home.footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('home/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('home/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('home/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('home/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('home/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('home/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('home/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('home/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('home/js/main.js') }}"></script>

</body>

</html>