<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/source/img/favicon.png" type="image/png">
        <title>thue xe Da Nang</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/source/css/bootstrap.css">
        <link rel="stylesheet" href="/source/css/login.css">
        <link rel="stylesheet" href="/source/css/menu.css">
        <link rel="stylesheet" href="/source/vendors/linericon/style.css">
        <link rel="stylesheet" href="/source/css/font-awesome.min.css">
        <link rel="stylesheet" href="/source/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/source/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="/source/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/source/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="/source/vendors/jquery-ui/jquery-ui.css">
        <!-- main css -->
        <link rel="stylesheet" href="/source/css/style.css">
        <link rel="stylesheet" href="/source/css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
      		 @include('menu')
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <!--================End Home Banner Area =================-->
        
        <!--================Choice Area =================-->
        <section class="choice_area p_120">
        	@yield('content')
        	
        </section>
        <!--================End Product List Area =================-->
        
        <!--================ start footer Area  =================-->	
        	@include('footer')
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/source/js/jquery-3.2.1.min.js"></script>
        <script src="/source/js/popper.js"></script>
        <script src="/source/js/bootstrap.min.js"></script>
        <script src="/source/js/stellar.js"></script>
        <script src="/source/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="/source/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="/source/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="/source/vendors/isotope/isotope-min.js"></script>
        <script src="/source/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/source/vendors/jquery-ui/jquery-ui.js"></script>
        <script src="/source/js/jquery.ajaxchimp.min.js"></script>
        <script src="/source/js/mail-script.js"></script>
        <script src="/source/js/theme.js"></script>
    </body>
</html>