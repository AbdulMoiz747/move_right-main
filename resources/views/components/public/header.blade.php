<header class="theme-main-menu menu-overlay menu-style-four sticky-menu">
    <div class="inner-content gap-two">
        <div class="top-header position-relative">
            <div class="d-flex align-items-center">
                <div class="logo order-lg-0">
                    <a href="{{ route("public.home") }}" class="d-flex align-items-center">
                        <img src=" {{ asset("images/logo/logo_06.svg") }} " alt="">
                    </a>
                </div>
                <!-- logo -->
                <div class="right-widget ms-auto me-3 me-lg-0 order-lg-3">
                    <ul class="d-flex align-items-center style-none">
                        @if (session()->has("LoggedLandlord"))
                            <li class="nav-item dashboard-menu">
                                <a class="nav-link" href="{{ route("landlords.dashboard") }}" >Landlord Dashboard</a>
                            </li>
                        @endif

                        @if (session()->has("LoggedBuyer"))
                            <li class="nav-item dashboard-menu">
                                <a class="nav-link" href="{{ route("buyers.dashboard") }}" >Buyer Dashboard</a>
                            </li>
                        @endif

                        @if (!session()->has("LoggedLandlord"))
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="login-btn-two rounded-circle tran3s d-flex align-items-center justify-content-center">
                                    <img src="{{ asset("images/icon/landlord.svg") }}" style="filter: invert(100%) sepia(0%) saturate(0) hue-rotate(0deg) brightness(100%) contrast(100%);    max-width: 62%;" alt="">
                                </a>
                            </li>
                        @endif

                        @if (!session()->has("LoggedBuyer"))
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#buyerLoginModal" class="search-btn-one rounded-circle tran3s d-flex align-items-center justify-content-center">
                                    <img src="{{ asset("images/icon/buyer.svg") }}" style="filter: invert(100%) sepia(0%) saturate(0) hue-rotate(0deg) brightness(100%) contrast(100%);    max-width: 53%;" alt="">
                                </a>
                            </li>
                        @endif
                        
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#searchModal" class="search-btn-one rounded-circle tran3s d-flex align-items-center justify-content-center"><i class="bi bi-search"></i></a>
                        </li>
                    </ul>
                </div>
                <nav class="navbar navbar-expand-lg p0 ms-lg-5 order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse ms-xl-5" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center">
                            <li class="d-block d-lg-none"><div class="logo"><a href="index.html" class="d-block"><img src="images/logo/logo_06.svg" alt=""></a></div></li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route("public.home") }}" >Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Buy
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route("public.listings", ['type' => 'house', 'list_in' => "sell"]) }}" class="dropdown-item"><span>House</span></a></li>
                                    <li><a href="{{ route("public.listings", ['type' => 'apartments', 'list_in' => "sell"]) }}" class="dropdown-item"><span>Apartments</span></a></li>
                                    <li><a href="{{ route("public.listings", ['type' => 'condos', 'list_in' => "sell"]) }}" class="dropdown-item"><span>Condos</span></a></li>
                                    <li><a href="{{ route("public.listings", ['type' => 'villas', 'list_in' => "sell"]) }}" class="dropdown-item"><span>Villas</span></a></li>
                                    <li><a href="{{ route("public.listings", ['type' => 'lofts', 'list_in' => "sell"]) }}" class="dropdown-item"><span>Lofts</span></a></li>
                                    <li><a href="{{ route("public.listings", ['type' => 'plots', 'list_in' => "sell"]) }}" class="dropdown-item"><span>Plot</span></a></li>
                                    <li><a href="{{ route("public.listings", ['type' => 'industrial', 'list_in' => "sell"]) }}" class="dropdown-item"><span>Industrial</span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Rent
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'house', 'list_in' => "rent"]) }}" class="dropdown-item"><span>House</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'apartments', 'list_in' => "rent"]) }}" class="dropdown-item"><span>Apartments</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'condos', 'list_in' => "rent"]) }}" class="dropdown-item"><span>Condos</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'villas', 'list_in' => "rent"]) }}" class="dropdown-item"><span>Villas</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'lofts', 'list_in' => "rent"]) }}" class="dropdown-item"><span>Lofts</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'plots', 'list_in' => "rent"]) }}" class="dropdown-item"><span>Plot</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("public.listings", ['type' => 'industrial', 'list_in' => "rent"]) }}" class="dropdown-item"><span>Industrial</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route("public.listings") }}" >Best Selling</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route("public.contact") }}" >Contact Us</a>
                            </li>
                            <li class="d-md-none d-flex align-items-center justify-content-center login-btn-one ps-2 pe-2 mt-40">
                                <span class="pe-3 fw-500">Call Now:</span>
                                <a href="tel:+757-699-4478" class="tran3s">+757 699-4478</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div> <!--/.top-header-->
    </div> <!-- /.inner-content -->
</header> 