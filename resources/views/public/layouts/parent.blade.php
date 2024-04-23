<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Real estate, Property sale, Property buy">
    <meta property="og:type" content="website">
	<meta name='og:image' content='images/assets/ogg.png'>
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
	<link rel="icon" type="image/png" sizes="56x56" href=" {{ asset("images/fav-icon/icon.png") }} ">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="  {{ asset("css/bootstrap.min.css") }}  " media="all">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href=" {{ asset("css/style.min.css") }} " media="all">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href=" {{ asset("css/responsive.css") }} " media="all">

</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
			Loading Transition
		==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="icon"><img src="images/loader.gif" alt="" class="m-auto d-block" width="64"></div>
			</div>
		</div>


        <!-- ################### Search Modal ####################### -->
        <!-- Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="modal-content d-flex justify-content-center">
                    <form action="{{ route("public.listings") }}" method="GET">
                        <input type="text" name="keywords" placeholder="Buy Apartments, Rent Condos, Sell Houses">
                        <button><i class="fa-light fa-arrow-right-long"></i></button>
                    </form>
                </div>
            </div>
        </div>


		@php
			$tab = Session::has('success') && Session::get('from') ? "signup" : "login";
		@endphp
		
		@php
			$buyerTab = Session::has('buyerSuccess') && Session::get('buyerFrom') ? "buyerSignup" : "buyerLogin";
		@endphp
		<!-- 
		=============================================
			Theme Main Menu
		============================================== 
		-->
		<x-public.header />
		<!-- /.theme-main-menu -->


        @yield('content')
        
		<!--
		=====================================================
			Footer Three
		=====================================================
		-->
		<x-public.footer />
        <!-- /.footer-three -->


        <!-- ################### Login Modal ####################### -->
        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="user-data-form modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="form-wrapper m-auto">
							<ul class="nav nav-tabs w-100" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link {{ $tab == "login" ? "active" : "" }}" data-bs-toggle="tab" data-bs-target="#fc1" role="tab">Landlord Login</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link {{ $tab == "signup" ? "active" : "" }}" data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Landlord Signup</button>
								</li>
							</ul>

							<div class="tab-content mt-30">
								<div class="tab-pane {{ $tab == "login" ? "show active" : " " }}" role="tabpanel" id="fc1">
									<div class="text-center mb-20">
										<h2>Welcome Back!</h2>
										{{-- <p class="fs-20 color-dark">Still don't have an account? 
                                            <button  data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Sign up</button>
                                        </p> --}}
									</div>
									<form action="{{ route("landlords.login") }} " method="POST">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Email*</label>
													<input name="email" type="email" placeholder="fishNchips@example.com" required>
												</div>
												<span class="text-danger">@error('email'){{$message}}@enderror</span>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label>Password*</label>
													<input type="password" name="password" placeholder="Enter Password" class="pass_log_id" required>
													<span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_68.svg" alt=""></span></span>
													<span class="text-danger">@error('password'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="agreement-checkbox d-flex justify-content-between align-items-center">
													{{-- <div>
														<input type="checkbox" id="remember">
														<label for="remember">Keep me logged in</label>
													</div>
													<a href="#">Forget Password?</a> --}}
												</div> <!-- /.agreement-checkbox -->
											</div>
											<div class="col-12">
												<button class="btn-two w-100 text-uppercase d-block mt-20">Login</button>
												@if (Session::has('success'))
													<div class="alert alert-success some-space-upNdown" role="alert">
														<center style="">
															{{ session("success") }}
															<br>
														</center> 
													</div>
												@endif

												@if (Session::has('fail'))
													<div class="alert alert-danger some-space-upNdown" role="alert">
														<center style="">
															{{ session("fail") }}
															<br>
														</center> 
													</div>
												@endif
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane {{ $tab == "signup" ? "show active" : " " }}" role="tabpanel" id="fc2">
									<div class="text-center mb-20">
										<h2>Register</h2>
										{{-- <p class="fs-20 color-dark">Already have an account? <a href="#">Login</a></p> --}}
									</div>
									<form action=" {{route("landlords.store")}} " method="POST">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Name*</label>
													<input type="text" placeholder="Mr. Fish n Chips" name="name" required>
													<span class="text-danger">@error('name'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Email*</label>
													<input type="email" placeholder="fishnchips@example.com" name="email" required>
													<span class="text-danger">@error('email'){{$message}}@enderror</span>
												</div>
											</div>
                                            <div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Phone*</label>
													<input type="tel" id="phoneInput" placeholder="+44 xx xxxx xxxx" name="phone" required>
													<span class="text-danger">@error('phone'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label>Password*</label>
													<input type="password" placeholder="Enter Password" class="pass_log_id" name="password" required>
													<span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_68.svg" alt=""></span></span>
													<span class="text-danger">@error('password'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="agreement-checkbox d-flex justify-content-between align-items-center">
													<div>
														<input type="checkbox" id="remember2" required>
														<label for="remember2">
															By hitting the "Register" button, you agree to the 
															<a href="#">Terms conditions</a> 
															& 
															<a href="#">Privacy Policy</a>
														</label>
													</div>
												</div> <!-- /.agreement-checkbox -->
											</div>
											<div class="col-12">
												<button class="btn-two w-100 text-uppercase d-block mt-20">Sign Up</button>
												
												@if (Session::has('success'))
													<div class="alert alert-success some-space-upNdown" role="alert">
														<center style="">
															{{ session("success") }}
															<br>
														</center> 
													</div>
												@endif

												@if (Session::has('fail'))
													<div class="alert alert-danger some-space-upNdown" role="alert">
														<center style="">
															{{ session("fail") }}
															<br>
														</center> 
													</div>
												@endif

											</div>

										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							
							{{-- <div class="d-flex align-items-center mt-30 mb-10">
								<div class="line"></div>
								<span class="pe-3 ps-3 fs-6">OR</span>
								<div class="line"></div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
										<img src="images/icon/google.png" alt="">
										<span class="ps-3">Signup with Google</span>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
										<img src="images/icon/facebook.png" alt="">
										<span class="ps-3">Signup with Facebook</span>
									</a>
								</div>
							</div> --}}
						</div>
						<!-- /.form-wrapper -->
                    </div>
                    <!-- /.user-data-form -->
                </div>
            </div>
        </div>

        <!-- ################### Buyer Login Modal ####################### -->
        <!-- Modal -->
        <div class="modal fade" id="buyerLoginModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="user-data-form modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="form-wrapper m-auto">
							<ul class="nav nav-tabs w-100" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link {{ $buyerTab == "buyerLogin" ? "active" : "" }}" data-bs-toggle="tab" data-bs-target="#fc3" role="tab">Buyer Login</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link {{ $buyerTab == "buyerSignup" ? "active" : "" }}" data-bs-toggle="tab" data-bs-target="#fc4" role="tab">Buyer Signup</button>
								</li>
							</ul>

							<div class="tab-content mt-30">
								<div class="tab-pane {{ $buyerTab == "buyerLogin" ? "show active" : " " }}" role="tabpanel" id="fc3">
									<div class="text-center mb-20">
										<h2>Welcome Back!</h2>
									</div>
									<form action="{{ route("buyers.login") }} " method="POST">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Email*</label>
													<input name="buyerEmail" type="email" placeholder="fishNchips@example.com" required>
												</div>
												<span class="text-danger">@error('buyerEmail'){{$message}}@enderror</span>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label>Password*</label>
													<input type="password" name="buyerPassword" placeholder="Enter Password" class="pass_log_id" required>
													<span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_68.svg" alt=""></span></span>
													<span class="text-danger">@error('buyerPassword'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="agreement-checkbox d-flex justify-content-between align-items-center">
													{{-- <div>
														<input type="checkbox" id="remember">
														<label for="remember">Keep me logged in</label>
													</div>
													<a href="#">Forget Password?</a> --}}
												</div> <!-- /.agreement-checkbox -->
											</div>
											<div class="col-12">
												<button class="btn-two w-100 text-uppercase d-block mt-20">Login</button>
												@if (Session::has('buyerSuccess'))
													<div class="alert alert-success some-space-upNdown" role="alert">
														<center style="">
															{{ session("buyerSuccess") }}
															<br>
														</center> 
													</div>
												@endif

												@if (Session::has('buyerFail'))
													<div class="alert alert-danger some-space-upNdown" role="alert">
														<center style="">
															{{ session("buyerFail") }}
															<br>
														</center> 
													</div>
												@endif
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane {{ $buyerTab == "buyerSignup" ? "show active" : " " }}" role="tabpanel" id="fc4">
									<div class="text-center mb-20">
										<h2>Register</h2>
									</div>
									<form action=" {{route("buyers.store")}} " method="POST">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Name*</label>
													<input type="text" placeholder="Mr. Fish n Chips" name="buyerName" required>
													<span class="text-danger">@error('buyerName'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Email*</label>
													<input type="email" placeholder="fishnchips@example.com" name="buyerEmail" required>
													<span class="text-danger">@error('buyerEmail'){{$message}}@enderror</span>
												</div>
											</div>
                                            <div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label>Phone*</label>
													<input type="tel" id="phoneInput" placeholder="+44 xx xxxx xxxx" name="buyerPhone" required>
													<span class="text-danger">@error('buyerPhone'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label>Password*</label>
													<input type="password" placeholder="Enter Password" class="pass_log_id" name="buyerPassword" required>
													<span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_68.svg" alt=""></span></span>
													<span class="text-danger">@error('buyerPassword'){{$message}}@enderror</span>
												</div>
											</div>
											<div class="col-12">
												<div class="agreement-checkbox d-flex justify-content-between align-items-center">
													<div>
														<input type="checkbox" id="remember3" required>
														<label for="remember3">
															By hitting the "Register" button, you agree to the 
															<a href="#">Terms conditions</a> 
															& 
															<a href="#">Privacy Policy</a>
														</label>
													</div>
												</div> <!-- /.agreement-checkbox -->
											</div>
											<div class="col-12">
												<button class="btn-two w-100 text-uppercase d-block mt-20">Sign Up</button>
												
												@if (Session::has('buyerSuccess'))
													<div class="alert alert-success some-space-upNdown" role="alert">
														<center style="">
															{{ session("buyerSuccess") }}
															<br>
														</center> 
													</div>
												@endif

												@if (Session::has('buyerFail'))
													<div class="alert alert-danger some-space-upNdown" role="alert">
														<center style="">
															{{ session("buyerFail") }}
															<br>
														</center> 
													</div>
												@endif

											</div>

										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							
						</div>
						<!-- /.form-wrapper -->
                    </div>
                    <!-- /.user-data-form -->
                </div>
            </div>
        </div>


		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>


		<!-- Optional JavaScript _____________________________  -->
		@if (Session::has('success') || Session::has('fail'))
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var myModal = new bootstrap.Modal(document.getElementById('loginModal'))
					myModal.show();
				});
			</script>
		@endif
		@if (Session::has('buyerSuccess') || Session::has('buyerFail'))
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var myModal = new bootstrap.Modal(document.getElementById('buyerLoginModal'))
					myModal.show();
				});
			</script>
		@endif

		<!-- jQuery first, then Bootstrap JS -->
		<!-- jQuery -->
		<script src=" {{ asset("vendor/jquery.min.js") }} "></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<!-- Bootstrap JS -->
		<script src=" {{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }} "></script>
		<!-- WOW js -->
		<script src=" {{ asset("vendor/wow/wow.min.js") }} "></script>
		<!-- Slick Slider -->
		<script src=" {{ asset("vendor/slick/slick.min.js") }} "></script>
		<!-- Fancybox -->
		<script src=" {{ asset("vendor/fancybox/fancybox.umd.js") }} "></script>
		<!-- Lazy -->
		<script src=" {{ asset("vendor/jquery.lazy.min.js") }} "></script>
		<!-- js Counter -->
		<script src=" {{ asset("vendor/jquery.counterup.min.js") }} "></script>
		<script src=" {{ asset("vendor/jquery.waypoints.min.js") }} "></script>
		<!-- Nice Select -->
		<script src=" {{ asset("vendor/nice-select/jquery.nice-select.min.js") }} "></script>
		<!-- validator js -->
		<script src=" {{ asset("vendor/validator.js") }} "></script>

		<!-- Theme js -->
		<script src=" {{ asset("js/theme.js") }} "></script>
	</div> <!-- /.main-page-wrapper -->
</body>

</html>