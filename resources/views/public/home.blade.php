		
@extends('public.layouts.parent')

@section('title', "Move Right® | The right move!")

@section('content')

	<!-- 
	=============================================
		Hero Banner
	============================================== 
	-->
	<div class="hero-banner-four position-relative">
		<div class="position-relative main-bg position-relative z-1 pt-150 xl-pt-120 md-pt-60 pb-150 xl-pb-120 md-pb-80">
			<div class="hero-slider-one m0">
				<div class="item m0"><div class="hero-img" style="background-image: url({{ asset("images/media/img_32.jpg") }});"></div></div>
				<div class="item m0"><div class="hero-img" style="background-image: url({{ asset("images/media/img_27.jpg") }} );"></div></div>
				<div class="item m0"><div class="hero-img" style="background-image: url({{ asset("images/media/img_28.jpg") }});"></div></div>
			</div>
			<!-- /.hero-slider-one -->
			<div class="container position-relative z-2">
				<div class="row">
					<div class="col-lg-6 wow fadeInLeft">
						<div class="mt-45">
							<h1 class="hero-heading text-white fw-500">
								Buy, Sell & Rent.
								<span class="d-block d-lg-inline-flex">
									<img src="images/lazy.svg" data-src="{{ asset("images/media/img_33.jpg") }}" alt="" class="lazy-img avatar">
									<img src="images/lazy.svg" data-src="{{ asset("images/media/img_34.jpg") }}" alt="" class="lazy-img avatar">
									<img src="images/lazy.svg" data-src="{{ asset("images/media/img_35.jpg") }}" alt="" class="lazy-img avatar">
									<img src="images/lazy.svg" data-src="{{ asset("images/media/img_36.jpg") }}" alt="" class="lazy-img avatar">
								</span>
							</h1>
							<p class="fs-24 text-white pt-40 pb-30 md-pb-20 pe-xl-5">Explore our vast listings of apartments, condos, villas, lofts, houses and plots.</p>
							<div class="d-inline-flex flex-wrap align-items-center">
								<a href="{{ route("public.listings") }}" class="btn-two rounded-0 border-0 mt-15 me-4"><span>Explore All</span></a>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-lg-6 ms-auto wow fadeInRight">
						<div class="search-wrapper-two position-relative ms-xl-5 ms-lg-4 ps-xxl-4 md-mt-60">
							<nav class="search-filter-nav-two d-inline-flex">
								<div class="nav nav-tabs border-0" role="tablist">
									<button class="nav-link active" id="buy-tab" data-bs-toggle="tab" data-bs-target="#buy" type="button" role="tab" aria-controls="buy" aria-selected="true">Buy</button>
									<button class="nav-link" id="rent-tab" data-bs-toggle="tab" data-bs-target="#rent" type="button" role="tab" aria-controls="rent" aria-selected="false">Rent</button>
								</div>
							</nav>
							<div class="bg-wrapper position-relative z-1">
								<h4 class="mb-35 xl-mb-30">Find & Buy Now!</h4>
								<div class="tab-content">
									<div class="tab-pane show active" id="buy" role="tabpanel" aria-labelledby="buy-tab" tabindex="0">
										<form action="{{ route("public.listings") }}" method="GET">
											<input type="hidden" name="list_in" value="sell">
											<div class="row gx-0 align-items-center">
												<div class="col-12">
													<div class="input-box-one bottom-border mb-25">
														<div class="label">I’m looking to...</div>
														<select class="nice-select fw-normal" name="type">
															<option value="apartments">Buy Apartments</option>
															<option value="villas">Buy Villas</option>
															<option value="condos">Buy Condos</option>
															<option value="lofts">Buy Lofts</option>
															<option value="house">Buy Houses</option>
															<option value="Industrial">Buy Industrial</option>
															<option value="plot">Buy Plots</option>
														</select>
													</div>
													<!-- /.input-box-one -->
												</div>
												<div class="col-12">
													<div class="input-box-one bottom-border mb-50 lg-mb-30">
														<div class="label">Price Range</div>
														<select class="nice-select fw-normal" name="price_range">
															<option value="£500 - £50,000">£10,000 - £50,000</option>
															<option value="£50,000 - £100,000">£50,000 - £100,000</option>
															<option value="£100,000 - £500,000">£100,000 - £500,000</option>
														</select>
													</div>
													<!-- /.input-box-one -->
												</div>
												<div class="col-12">
													<div class="input-box-one">
														<button class="btn-five text-uppercase rounded-0 w-100">Search</button>
													</div>
													<!-- /.input-box-one -->
												</div>
											</div>
										</form>
									</div>
									<div class="tab-pane" id="rent" role="tabpanel" aria-labelledby="rent-tab" tabindex="0">
										<form action="{{ route("public.listings") }}" method="GET">
											<input type="hidden" name="list_in" value="rent">
											<div class="row gx-0 align-items-center">
												<div class="col-12">
													<div class="input-box-one bottom-border mb-25">
														<div class="label">I’m looking to...</div>
														<select class="nice-select fw-normal" name="type">
															<option value="apartments">Buy Apartments</option>
															<option value="villas">Buy Villas</option>
															<option value="condos">Buy Condos</option>
															<option value="lofts">Buy Lofts</option>
															<option value="house">Buy Houses</option>
															<option value="Industrial">Buy Industrial</option>
															<option value="plot">Buy Plots</option>
														</select>
													</div>
													<!-- /.input-box-one -->
												</div>
												<div class="col-12">
													<div class="input-box-one bottom-border mb-50 lg-mb-30">
														<div class="label">Price Range</div>
														<select class="nice-select fw-normal" name="price_range">
															<option value="£500 - £1,000">£500 - £1,000</option>
															<option value="£1,000 - £2,000">£1,000 - £2,000</option>
															<option value="£2,000 - £5,000">£2,000 - £5,000</option>
														</select>
													</div>
													<!-- /.input-box-one -->
												</div>
												<div class="col-12">
													<div class="input-box-one">
														<button class="btn-five text-uppercase rounded-0 w-100">Search</button>
													</div>
													<!-- /.input-box-one -->
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- /.tab-content -->
							</div>
						</div>
						<!-- /.search-wrapper-two -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.hero-banner-four -->

	<!-- 
	=============================================
		Property Listing Two
	============================================== 
	-->
	<div class="property-listing-five mt-170 xl-mt-120">
		<div class="container container-large">
			<div class="position-relative">
				<div class="title-one mb-25 lg-mb-10 wow fadeInUp">
					<h3>New Listings</h3>
					<p class="fs-22">Explore latest and featured properties for sale & rent.</p>
				</div>
				<!-- /.title-one -->

				<div class="row gx-xxl-5">

					@foreach ($latestProperties as $propNumber => $property)

						<div class="col-lg-4 col-md-6 d-flex mt-40 wow fadeInUp">
							<div class="listing-card-one style-two shadow-none h-100 w-100">
								<div class="img-gallery">
									<div class="position-relative overflow-hidden">
										<div class="tag fw-500">FOR {{ ucfirst($property->list_in) }}</div>
										<div id="carousel{{$propNumber}}" class="carousel slide">
											<div class="carousel-indicators">
												<button type="button" data-bs-target="#carousel{{$propNumber}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
												<button type="button" data-bs-target="#carousel{{$propNumber}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
												<button type="button" data-bs-target="#carousel{{$propNumber}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
											</div>
											<div class="carousel-inner">
												@foreach ($property->media as $index => $media)
													<div class="carousel-item {{ $index == 0 ? "active" : "" }} " data-bs-interval="1000000">
														<a href="{{ route("public.property", $property->id) }}" class="d-block"><img src="{{ Storage::url($media) }}" class="w-100" alt="..."></a>
													</div>
													
												@endforeach
											</div>
										</div>
									</div>
								</div>
								<!-- /.img-gallery -->
								<div class="property-info pt-20">
									<a href="{{ route("public.property", $property->id) }}" class="title tran3s">{{ $property->title }}</a>
									<div class="address">{{ $property->location->area->name }}, {{ $property->location->city->name }}, UK</div>
									<ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between pb-15 pt-5">
										<li class="d-flex align-items-center">
											<img src="images/lazy.svg" data-src="{{ asset("images/icon/icon_32.svg") }}" alt="" class="lazy-img icon me-2">
											<span class="fs-16"><span class="color-dark">{{ $property->sq_yard }}</span> sqyard</span>
										</li>
										<li class="d-flex align-items-center">
											<img src="images/lazy.svg" data-src="{{ asset("images/icon/icon_33.svg") }}" alt="" class="lazy-img icon me-2">
											<span class="fs-16"><span class="color-dark">{{ $property->bedrooms }}</span> bedrooms</span>
										</li>
										<li class="d-flex align-items-center">
											<img src="images/lazy.svg" data-src="{{ asset("images/icon/icon_34.svg") }}" alt="" class="lazy-img icon me-2">
											<span class="fs-16"><span class="color-dark">{{ $property->bathrooms }}</span> bathrooms</span>
										</li>
									</ul>
									<div class="pl-footer top-border bottom-border d-flex align-items-center justify-content-between">
										<strong class="price fw-500 color-dark">£{{ $property->price }}</strong>
										<a href="{{ route("public.property", $property->id) }}" class="btn-four"><i class="bi bi-arrow-up-right"></i></a>
									</div>
								</div>
								<!-- /.property-info -->
							</div>
							<!-- /.listing-card-one -->
						</div>
					
					@endforeach
				</div>

				<div class="section-btn text-center md-mt-60">
					<a href="{{ route("public.listings") }}" class="btn-eight"><span>Explore All</span> <i class="bi bi-arrow-up-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.property-listing-five -->


	<!-- 
	=============================================
		Property Listing One
	============================================== 
	-->
	<div class="property-listing-one mt-170 xl-mt-120">
		<div class="container container-large">
			<div class="position-relative">
				<div class="title-one mb-25 lg-mb-10 wow fadeInUp">
					<h3>Best Selling</h3>
					<p class="fs-22 mt-xs">These are our best listings of the week.</p>
				</div>
				<!-- /.title-one -->

				<div class="row gx-xxl-5">
					@foreach ($bestProperties as $propNumber => $bestProperty)
						@php
							$url = isset($bestProperty->media[0]) ? Storage::url($bestProperty->media[0]) : asset('images/icon/image-placeholder.svg');
						@endphp
						
						<div class="col-lg-4 col-md-6 mt-40 wow fadeInUp">
							<div class="listing-card-four overflow-hidden d-flex align-items-end position-relative z-1" style="background-image: url( '{{ asset($url) }}' );">
								<div class="tag fw-500">{{ $bestProperty->list_in }}</div>
								<div class="property-info tran3s w-100">
									<div class="d-flex align-items-center justify-content-between">
										<div class="pe-3">
											<a href="listing_details_04.html" class="title fw-500 tran4s">{{ $bestProperty->title }}.</a>
										</div>
										<a href="{{ route("public.property", $bestProperty->id) }}" class="btn-four inverse"><i class="bi bi-arrow-up-right"></i></a>
									</div>
									
									<div class="pl-footer tran4s">
										<ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
											<li>
												<strong class="color-dark fw-500">{{ $bestProperty->sq_yard }}</strong> 
												<span class="fs-16">sqyard</span>
											</li>
											<li>
												<strong class="color-dark fw-500">{{ $bestProperty->bedrooms }}</strong> 
												<span class="fs-16">bedrooms</span>
											</li>
											<li>
												<strong class="color-dark fw-500">{{ $bestProperty->kitchens }}</strong> 
												<span class="fs-16">kitchens</span>
											</li>
											<li>
												<strong class="color-dark fw-500">{{ $bestProperty->bathrooms }}</strong> 
												<span class="fs-16">bathrooms</span>
											</li>
										</ul>
									</div>
								</div>
								<!-- /.property-info -->
							</div>
							<!-- /.listing-card-four -->
						</div>
						
					@endforeach
					
				</div>

				<div class="section-btn text-center md-mt-60">
					<a href="{{ route("public.listings") }}" class="btn-eight"><span>Explore All</span> <i class="bi bi-arrow-up-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.property-listing-one -->

	<!--
	=====================================================
		BLock Feature Nine
	=====================================================
	-->
	<div class="block-feature-nine bg-pink-two image-bg position-relative z-1 mt-170 xl-mt-120 pt-85 pb-110 xl-pb-80">
		<div class="container container-large">
			<div class="position-relative">
				<div class="row">
					<div class="col-xxl-6 col-xl-7 col-lg-8">
						<div class="title-one mb-30 lg-mb-20 wow fadeInUp">
							<h3>We’r here help to you  find right and verified properties.</h3>
							<p class="fs-22">Over 745K listings of apartments, lofts, plots - available today.</p>
						</div>
						<!-- /.title-one -->
					</div>
				</div>

				<div class="row gx-xxl-5">
					<div class="col-lg-4 col-md-6 mt-30 d-flex wow fadeInUp">
						<div class="card-style-six d-inline-flex flex-column align-items-start tran3s h-100 w-100">
							<div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="images/lazy.svg" data-src="{{ asset("images/icon/icon_35.svg") }}" alt="" class="lazy-img"></div>
							<h5 class="mt-35 mb-20">Buy a home</h5>
							<p class="mb-40">Explore our 2 million+ homes and uncover your ideal living space.</p>
							<a href="{{ route("public.listings", ['list_in' => 'sell', 'type' => 'house']) }}" class="btn-twelve rounded-0 sm mt-auto">Buy Home</a>
						</div>
						<!-- /.card-style-six -->
					</div>
					<div class="col-lg-4 col-md-6 mt-30 d-flex wow fadeInUp" data-wow-delay="0.1s">
						<div class="card-style-six d-inline-flex flex-column align-items-start tran3s h-100 w-100">
							<div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="images/lazy.svg" data-src="{{ asset("images/icon/icon_36.svg") }}" alt="" class="lazy-img"></div>
							<h5 class="mt-35 mb-20">Rent a home</h5>
							<p class="mb-40">Discover a rental you'll love here, thanks to wide range of filters.</p>
							<a href="{{ route("public.listings", ['list_in' => 'rent', 'type' => 'house']) }}" class="btn-twelve rounded-0 sm mt-auto">Rent Home</a>
						</div>
						<!-- /.card-style-six -->
					</div>
					<div class="col-lg-4 col-md-6 mt-30 d-flex wow fadeInUp" data-wow-delay="0.2s">
						<div class="card-style-six d-inline-flex flex-column align-items-start tran3s h-100 w-100">
							<div class="icon d-flex align-items-center justify-content-center rounded-circle tran3s"><img src="images/lazy.svg" data-src="{{ asset("images/icon/icon_37.svg") }}" alt="" class="lazy-img"></div>
							<h5 class="mt-35 mb-20">Sell Home</h5>
							<p class="mb-40">List, sell, thrive – with our top-notch real estate agency. It’s super easy & fun.</p>
							<a href="{{ route("landlords.properties.create") }}" class="btn-twelve rounded-0 sm mt-auto">Sell Home</a>
						</div>
						<!-- /.card-style-six -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.block-feature-nine -->



	<!-- 
	=============================================
		Category Section Two
	============================================== 
	-->
	<div class="category-section-two mt-170 xl-mt-120">
		<div class="container container-large">
			<div class="position-relative">
				<div class="title-one text-center text-lg-start mb-60 xl-mb-40 lg-mb-20 wow fadeInUp">
					<h3>Popular Categories.</h3>
				</div>
				<!-- /.title-one -->
				
				<div class="wrapper flex-wrap d-flex justify-content-center justify-content-md-between align-items-center">
					<div class="card-style-seven position-relative z-1 rounded-circle overflow-hidden d-flex align-items-center justify-content-center wow fadeInUp" style="background-image: url({{ asset('images/media/img_38.jpg') }});">
						<a href="{{ route("public.listings", ['type' => 'apartments']) }}" class="title stretched-link"><h4 class="text-white tran3s">Apartments</h4></a>
					</div>
					<!-- /.card-style-seven -->
					<div class="card-style-seven position-relative z-1 rounded-circle overflow-hidden d-flex align-items-center justify-content-center wow fadeInUp" style="background-image: url({{ asset('images/media/img_39.jpg') }});" data-wow-delay="0.1s">
						<a href="{{ route("public.listings", ['type' => 'house']) }}" class="title stretched-link"><h4 class="text-white tran3s">House</h4></a>
					</div>
					<!-- /.card-style-seven -->
					<div class="card-style-seven position-relative z-1 rounded-circle overflow-hidden d-flex align-items-center justify-content-center wow fadeInUp" style="background-image: url({{ asset('images/media/img_40.jpg') }});" data-wow-delay="0.2s">
						<a href="{{ route("public.listings", ['type' => 'lofts']) }}" class="title stretched-link"><h4 class="text-white tran3s">Lofts</h4></a>
					</div>
					<!-- /.card-style-seven -->
					<div class="card-style-seven position-relative z-1 rounded-circle overflow-hidden d-flex align-items-center justify-content-center wow fadeInUp" style="background-image: url({{ asset('images/media/img_41.jpg') }});" data-wow-delay="0.3s">
						<a href="{{ route("public.listings", ['type' => 'villas']) }}" class="title stretched-link"><h4 class="text-white tran3s">Villa</h4></a>
					</div>
					<!-- /.card-style-seven -->
				</div>
			</div>
		</div>
	</div>
	<!-- /.category-section-two -->


	<!--
	=====================================================
		Address Banner
	=====================================================
	-->
	<div class="address-banner wow fadeInUp mt-120 lg-mt-80">
		<div class="container container-large">
			<div class="d-flex flex-wrap justify-content-center justify-content-lg-between">
				<div class="block position-relative z-1 mt-25">
					<div class="d-xl-flex align-items-center">
						<div class="icon rounded-circle d-flex align-items-center justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_39.svg" alt="" class="lazy-img"></div>
						<div class="text">
							<p class="fs-22">We’r always happy to help.</p>
							<a href="#" class="tran3s">ask@move_right.com</a>
						</div>
						<!-- /.text -->
					</div>
				</div>
				<!-- /.block -->
				<div class="block position-relative skew-line z-1 mt-25">
					<div class="d-xl-flex align-items-center">
						<div class="icon rounded-circle d-flex align-items-center justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_39.svg" alt="" class="lazy-img"></div>
						<div class="text">
							<p class="fs-22">Our hotline number</p>
							<a href="#" class="tran3s">+757 699 4478,</a>
							<a href="#" class="tran3s">&nbsp; +991 377 9731</a>
						</div>
						<!-- /.text -->
					</div>
				</div>
				<!-- /.block -->
				<div class="block position-relative z-1 mt-25">
					<div class="d-xl-flex align-items-center">
						<div class="icon rounded-circle d-flex align-items-center justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_39.svg" alt="" class="lazy-img"></div>
						<div class="text">
							<p class="fs-22">Live chat</p>
							<a href="#" class="tran3s">www.move_right.com</a>
						</div>
						<!-- /.text -->
					</div>
				</div>
				<!-- /.block -->
			</div>
		</div>
	</div>
	<!-- /.address-banner -->




	<!--
	=====================================================
		Fancy Banner Eight
	=====================================================
	-->
	<div class="fancy-banner-eight wow fadeInUp mt-160 xl-mt-120">
		<div class="container container-large">
			<div class="bg-wrapper bg-pink-two overflow-hidden position-relative z-1">
				<div class="row align-items-end">
					<div class="col-xl-6 col-lg-7 col-md-7">
						<div class="pb-80 lg-pb-40">
							<h3>Start your Journey as <span class="fw-normal fst-italic">A Landlord.</span></h3>
							<div class="d-inline-flex flex-wrap align-items-center position-relative mt-15">
								<a href="{{ route('landlords.dashboard') }}" class="btn-eight mt-10 me-4"><span>Become an Agent</span></a>
								<a href="{{ route('public.contact') }}" class="btn-two rounded-0 border-0 mt-10"><span>Contact us</span></a>
								<img src="images/lazy.svg" data-src="images/shape/shape_51.svg" alt="" class="lazy-img shapes shape_02 wow fadeInRight">
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-5 col-md-5 text-center text-md-end">
						<div class="media-wrapper position-relative z-1 d-inline-block">
							<img src="images/lazy.svg" data-src="images/media/img_44.png" alt="" class="lazy-img">
							<img src="images/lazy.svg" data-src="images/shape/shape_50.svg" alt="" class="lazy-img shapes shape_01">
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- /.fancy-banner-eight -->

@endsection
