<!--
		=====================================================
			Footer Three
		=====================================================
		-->
		<div class="footer-three">
			<div class="container container-large">
				<div class="bg-wrapper position-relative z-1">
					<div class="row">
						<div class="col-xl-3 mb-40 lg-mb-60">
							<div class="footer-intro pe-xxl-5 pe-xl-3">
								<div class="logo mb-15">
									<a href="{{ route("public.home") }}">
										<img src="{{  asset("images/logo/logo_06.svg") }}" alt="">
									</a>
								</div> 
								<!-- logo -->
								<p class="mb-45 lg-mb-30">Musha Road, Manchester, UK</p>
								<ul class="style-none d-flex align-items-center social-icon">
									<li><a ><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a ><i class="fa-brands fa-twitter"></i></a></li>
									<li><a ><i class="fa-brands fa-instagram"></i></a></li>
								</ul>
								<img src="images/lazy.svg" data-src="images/shape/shape_52.svg" alt="" class="lazy-img ms-auto d-none d-xl-block">
							</div>
						</div>
						<div class="col-lg-2 col-md-6 mb-30">
							<div class="footer-nav">
								<h5 class="footer-title">Links</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="{{ route("public.home") }}">Home</a></li>
									<li><a href="{{ route("public.listings") }}">Best Sellings</a></li>
									<li><a href="{{ route("public.contact") }}">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xl-2 col-lg-3 col-md-6 mb-30">
							<div class="footer-nav">
								<h5 class="footer-title">Buy</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="{{ route("public.listings", ['type' => 'apartments', 'list_in' => "sell"]) }}">​Buy Apartments</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'condos', 'list_in' => "sell"]) }}">Buy Condos</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'house', 'list_in' => "sell"]) }}">Buy Houses</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'Industrial', 'list_in' => "sell"]) }}">Buy Industrial</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'villas', 'list_in' => "sell"]) }}">Buy Villas</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'lofts', 'list_in' => "sell"]) }}">Buy Lofts</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xl-2 col-lg-3 col-md-6 mb-30">
							<div class="footer-nav">
								<h5 class="footer-title">Rent</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="{{ route("public.listings", ['type' => 'apartments', 'list_in' => "rent"]) }}">Rent Apartments</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'condos', 'list_in' => "rent"]) }}">Rent Condos</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'house', 'list_in' => "rent"]) }}">Rent Houses</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'Industrial', 'list_in' => "rent"]) }}">Rent Industrial</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'villas', 'list_in' => "rent"]) }}">Rent Villas</a></li>
									<li><a href="{{ route("public.listings", ['type' => 'lofts', 'list_in' => "rent"]) }}">Rent Lofts</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /.bg-wrapper -->
				<div class="bottom-footer">
					<div class="d-md-flex justify-content-center justify-content-md-between align-items-center">
						<ul class="style-none bottom-nav d-flex justify-content-center">
							<li><a href="{{ route("public.contact") }}">Contact Us</a></li>
						</ul>
						<p class="mb-15 text-center text-lg-start fs-16 order-md-first">Copyright @2024 Move Right inc.</p>
					</div>
				</div>
			</div>
		</div> <!-- /.footer-three -->