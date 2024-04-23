<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Real estate, Property sale, Property buy">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Move Right®">
	<meta name='og:image' content='../images/assets/ogg.png'>
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#0D1A1C">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#0D1A1C">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#0D1A1C">
	<title>@yield('title')</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="{{ asset("/images/fav-icon/icon.png") }} ">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{  asset("/css/bootstrap.min.css") }}" media="all">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href=" {{ asset("/css/style.min.css") }} " media="all">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href=" {{ asset("/css/responsive.css") }} " media="all">

</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
			Loading Transition
		==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="icon"><img src="../images/loader.gif" alt="" class="m-auto d-block" width="64"></div>
			</div>
		</div>

		<!-- 
		=============================================
			Dashboard Aside Menu
		============================================== 
		-->
		<x-buyers.aside :buyer="$buyer"/>
		<!-- /.dash-aside-navbar -->

		<!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
        @yield('content')
		<!-- /.dashboard-body -->


		<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="remove-account-popup text-center modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<img src="../images/lazy.svg" data-src="images/icon/icon_22.svg" alt="" class="lazy-img m-auto">
						<h2>Are you sure?</h2>
						<p>Are you sure to delete your account? All data will be lost.</p>
						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<a href="#" class="confirm-btn fw-500 tran3s me-3">Yes</a>
							<button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
		


		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>

		<!-- Optional JavaScript _____________________________  -->

		<!-- jQuery first, then Bootstrap JS -->
		<!-- jQuery -->
		<script src=" {{ asset("/vendor/jquery.min.js") }} "></script>
		<!-- Bootstrap JS -->
		<script src=" {{ asset("/vendor/bootstrap/js/bootstrap.bundle.min.js") }} "></script>
		<!-- WOW js -->
		<script src=" {{ asset("/vendor/wow/wow.min.js") }} "></script>
		<!-- Slick Slider -->
		<script src=" {{ asset("/vendor/slick/slick.min.js") }} "></script>
		<!-- Fancybox -->
		<script src=" {{ asset("/vendor/fancybox/fancybox.umd.js") }} "></script>
		<!-- Lazy -->
		<script src=" {{ asset("/vendor/jquery.lazy.min.js") }} "></script>
		<!-- js Counter -->
		<script src=" {{ asset("/vendor/jquery.counterup.min.js") }} "></script>
		<script src=" {{ asset("/vendor/jquery.waypoints.min.js") }} "></script>
		<!-- Nice Select -->
		<script src=" {{ asset("/vendor/nice-select/jquery.nice-select.min.js") }} "></script>
		<!-- validator js -->
		<script src=" {{ asset("/vendor/validator.js") }} "></script>

		<!-- Theme js -->
		<script src=" {{ asset("/js/theme.js") }} "></script>
	</div> <!-- /.main-page-wrapper -->
</body>

</html>