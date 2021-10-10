<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="/vendor/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="/vendor/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="/css/landingpagesmainstyle.css">
</head>
<body>

  <!--================ Header Menu Area start =================-->
  @include('landingpage.layouts.navbar')
  <!--================Header Menu Area =================-->

  <!--================ Content Area start =================-->
  @yield('container')
  <!--================ Content Area =================-->

  <!-- ================ start footer Area ================= -->
  @include('landingpage.layouts.footer')
  <!-- ================ End footer Area ================= -->


  <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="/js/jquery.ajaxchimp.min.js"></script>
  <script src="/js/mail-script.js"></script>
  <script src="/js/main-script.js"></script>
</body>
</html>