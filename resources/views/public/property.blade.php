
@extends('public.layouts.parent')

@section('title', "Property | Move Right®")

@section('content')
    
    <style>
        img{
            max-width: 70%;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <!--
    =====================================================
        Property Listing Details
    =====================================================
    -->
    <div id="printable">

        <div class="listing-details-one theme-details-one bg-pink pt-180 lg-pt-150 pb-150 xl-pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="property-titlee">{{ $property->title }}</h3>
                        <div class="d-flex flex-wrap mt-10">
                            <div class="list-type text-uppercase border-20 mt-15 me-3">FOR {{ ucfirst($property->list_in) }}</div>
                            <div class="address mt-15"><i class="bi bi-geo-alt"></i> {{ $property->address }}, {{ $property->location->area->name }}, {{ $property->location->city->name }}, UK</div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-block md-mt-40">
                            <div class="price color-dark fw-500">{{ $property->list_in == "rent" ? "Rent/month" : "Price" }}: £{{ $property->price }} </div>
                            <div class="est-price fs-20 mt-25 mb-35 md-mb-30">
                            </div>
                            <ul class="style-none d-flex align-items-center action-btns">
                                <li>
                                    <a href="javascript:genPdf()" id="downloadButton" class="d-flex align-items-center justify-content-center rounded-circle tran3s" title="Download Report">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="media-gallery mt-100 xl-mt-80 lg-mt-60">
                    <div id="media_slider" class="carousel slide row">
                        <div class="col-lg-10">
                            <div class="bg-white shadow4 border-20 p-30 md-mb-20">
                                <div class="position-relative z-1 overflow-hidden border-20">
                                    <div class="img-fancy-btn border-10 fw-500 fs-16 color-dark">
                                        See all {{ count($property->media) }} media
                                        @if (count($property->media) == 0 )
                                            <a href=" {{ Storage::url("property_media/image-placeholder.png") }} " class="d-block" data-fancybox="mainImg" ></a>
                                        @endif

                                        @foreach ($property->media as $media)
                                            <a href=" {{ Storage::url($media) }} " class="d-block" data-fancybox="mainImg" ></a>
                                        @endforeach
                                        
                                    </div>
                                    <div class="carousel-inner">
                                        @if (count($property->media) == 0 )
                                            <div class="carousel-item active">
                                                <img src=" {{ Storage::url("property_media/image-placeholder.png") }} " alt="" class="border-20 w-100">
                                            </div>
                                            
                                        @endif

                                        @foreach ($property->media as $index => $media)
                                            
                                            @if (pathinfo($media, PATHINFO_EXTENSION) !== 'mp4')
                                                
                                                <div class="carousel-item {{ $index === 0 ? ' active' : '' }}">
                                                    <img src=" {{ Storage::url($media) }} " alt="" class="border-20 w-100">
                                                </div>

                                            @endif
                                            
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#media_slider" data-bs-slide="prev">
                                        <i class="bi bi-chevron-left"></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#media_slider" data-bs-slide="next">
                                        <i class="bi bi-chevron-right"></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="carousel-indicators position-relative border-15 bg-white shadow4 p-15 w-100 h-100">
                                @if (count($property->media) == 0 )
                                    <button type="button" data-bs-target="#media_slider" data-bs-slide-to="0" class="0" aria-current="true" aria-label="Slide 0">
                                        <img src=" {{ Storage::url("property_media/image-placeholder.png") }} " alt="" class="border-10 w-100">
                                    </button>
                                @endif

                                @foreach ($property->media as $index => $media)
                                    
                                    <button type="button" data-bs-target="#media_slider" data-bs-slide-to="{{$index }}" class="{{ $index === 0 ? ' active' : '' }}" aria-current="true" aria-label="Slide {{$index}}">
                                        <img src=" {{ Storage::url($media) }} " alt="" class="border-10 w-100">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.media-gallery -->

                <div class="property-feature-list bg-white shadow4 border-20 p-40 mt-50 mb-60">
                    <h4 class="sub-title-one mb-40 lg-mb-20">Property Overview</h4>
                    <ul class="style-none d-flex flex-wrap align-items-center justify-content-between">
                        <li>
                            <img src=" {{ asset("images/lazy.svg") }} " data-src=" {{ asset("images/icon/icon_47.svg") }} " alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Sqyard . {{$property->sq_yard}}</span>
                        </li>
                        <li>
                            <img src="{{ asset("images/lazy.svg") }}" data-src=" {{ asset("images/icon/icon_48.svg") }} " alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Bed . {{ $property->bedrooms }} </span>
                        </li>
                        <li>
                            <img src="{{ asset("images/lazy.svg") }}" data-src=" {{ asset("images/icon/icon_49.svg") }} " alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Bath . {{ $property->bathrooms }} </span>
                        </li>
                        <li>
                            <img src="{{ asset("images/lazy.svg") }}" data-src=" {{ asset("images/icon/icon_50.svg") }} " alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Kitchen . {{ $property->kitchens }} </span>
                        </li>
                        <li>
                            <img src="{{ asset("images/lazy.svg") }}" data-src=" {{ asset("images/icon/icon_51.svg") }} " alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Type . {{  ucfirst($property->type) }} </span>
                        </li>
                    </ul>
                </div>
                <!-- /.property-feature-list -->

                <div class="row">
                    <div class="col-xl-8">
                        <div class="property-overview bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Overview</h4>
                            <p class="fs-20 lh-lg"> {{ $property->description }} </p>
                        </div>
                        <!-- /.property-overview -->
                        <div class="property-feature-accordion bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Property Features</h4>
                            <p class="fs-20 lh-lg">Following are property features</p>

                            <div class="accordion-style-two mt-45">
                                <div class="accordion" id="accordionTwo">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneA" aria-expanded="false" aria-controls="collapseOneA">
                                                Property Details
                                            </button>
                                        </h2>
                                        <div id="collapseOneA" class="accordion-collapse collapse show" data-bs-parent="#accordionTwo">
                                            <div class="accordion-body">
                                                <div class="feature-list-two">
                                                    <ul class="style-none d-flex flex-wrap justify-content-between">
                                                        <li><span>Bedrooms: </span> <span class="fw-500 color-dark"> {{ $property->bedrooms }} </span></li>
                                                        <li><span>Bathrooms: </span> <span class="fw-500 color-dark"> {{ $property->bathrooms }} </span></li>
                                                        <li><span>Year Built: </span> <span class="fw-500 color-dark"> {{ $property->built_year }} </span></li>
                                                        <li><span>Garages: </span> <span class="fw-500 color-dark"> {{ $property->garages }} </span></li>
                                                        <li><span>Property Type: </span> <span class="fw-500 color-dark"> {{ ucfirst($property->type)  }} </span></li>
                                                        <li><span>Status: </span> <span class="fw-500 color-dark"> {{ ucfirst($property->status)  }} </span></li>
                                                        <li><span>Sublet: </span> <span class="fw-500 color-dark"> {{ $property->status ? "Allowed" : "Not Allowed"  }} </span></li>
                                                    </ul>
                                                </div>
                                                <!-- /.feature-list-two -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-feature-accordion -->
                        <div class="property-amenities bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Amenities</h4>
                            <p class="fs-20 lh-lg pb-25">Following are the amenities</p>
                            <ul class="style-none d-flex flex-wrap justify-content-between list-style-two">
                                @foreach ( $property->amenities as $amenity)
                                    <li>{{ $amenity }}</li>  
                                    
                                @endforeach
                            </ul>
                            <!-- /.list-style-two -->
                        </div>
                        <!-- /.property-amenities -->

                        <div class="property-nearby bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">What’s Nearby</h4>
                            <ul class="style-none d-flex flex-wrap justify-content-between nearby-list-item">
                                <li>School & Collage: <span class="fw-500 color-dark">0.9km</span></li>
                                <li>Grocery Center: <span class="fw-500 color-dark">0.2km</span></li>
                                <li>Metro Station:  <span class="fw-500 color-dark">0.7km</span></li>
                                <li>Gym: <span class="fw-500 color-dark">2.3km</span></li>
                                <li>University: <span class="fw-500 color-dark">2.7km</span></li>
                                <li>Hospital: <span class="fw-500 color-dark">1.7km</span></li>
                                <li>Shopping Mall: <span class="fw-500 color-dark">1.1m</span></li>
                                <li>Police Station: <span class="fw-500 color-dark">1.2m</span></li>
                                <li>Bus Station:  <span class="fw-500 color-dark"> 1.1m</span></li>
                                <li>River: <span class="fw-500 color-dark">3.1km</span></li>
                                <li>Market: <span class="fw-500 color-dark">3.4m</span></li>
                            </ul>
                            <!-- /.nearby-list-item -->
                        </div>
                        <!-- /.property-nearby -->

                        <div class="property-score bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Walk Score</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-50 sm-mb-30">
                                        <img src="images/lazy.svg" data-src="images/icon/icon_52.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>Transit Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">63</span>/100 (Moderate Distance Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-50 sm-mb-30">
                                        <img src="images/lazy.svg" data-src="images/icon/icon_53.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>School Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">70</span>/100 (Short Distance Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-20 sm-mb-30">
                                        <img src="images/lazy.svg" data-src="images/icon/icon_54.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>Medical Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">77</span>/100 (Short Distance Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-20">
                                        <img src="images/lazy.svg" data-src="images/icon/icon_55.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>Shopping Mall Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">42</span>/100 (Long Distance Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-score -->

                        <div class="property-location mb-50">
                            <h4 class="mb-40">Location</h4>
                            <div class="bg-white shadow4 border-20 p-30">
                                <div class="map-banner overflow-hidden border-15">
                                    <div class="gmap_canvas h-100 w-100">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9581899.285296928!2d-15.002061284783236!3d54.10333797549424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2s!4v1708873013316!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-location -->
                    </div>

                    <div class="col-xl-4 col-lg-8 me-auto ms-auto">
                        <div class="theme-sidebar-one dot-bg p-30 ms-xxl-3 lg-mt-80">
                            <div class="agent-info bg-white border-20 p-30 mb-40">
                                <img src="{{ asset("images/lazy.svg") }}" data-src="{{ $property->landlord->profile_picture ?? Storage::url("profile-pictures/default.svg") }}" alt="" class="lazy-img rounded-circle ms-auto me-auto mt-3 avatar">
                                <div class="text-center mt-25">
                                    <h6 class="name"> {{ $property->landlord->name }} </h6>
                                    <p class="fs-16">Property Agent & Broker</p>
                                </div>
                                <div class="divider-line mt-40 mb-45 pt-20">
                                    <ul class="style-none">
                                        <li>Email: <span><a href="mailto:{{ $property->landlord->email }}"> {{ $property->landlord->email }} </a></span></li>
                                        <li>Phone: <span><a href="tel:{{ $property->landlord->phone }}"> {{ $property->landlord->phone }} </a></span></li>
                                    </ul>
                                </div>

                                <!-- /.divider-line -->
                                <a href="{{ route("public.landlord", $property->landlord->id) }}" class="btn-nine text-uppercase rounded-3 w-100 mb-10">Landlord Profile</a>
                                <a href="{{ $property->list_in == "rent" ? route("public.contract.rent.create", ["property_id" => $property->id]) : route("public.contract.sell.create", ["property_id" => $property->id]) }}" class="btn-nine text-uppercase rounded-3 w-100 mb-10">{{ $property->list_in == "rent" ? "Rent" : "Sell" }} this Property</a>
                            </div>
                            <!-- /.agent-info -->
                        </div>
                        <!-- /.theme-sidebar-one -->
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    <!-- /.listing-details-one -->



    <!--
    =====================================================
        Fancy Banner Two
    =====================================================
    -->
    <div class="fancy-banner-two position-relative z-1 pt-90 lg-pt-50 pb-90 lg-pb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="title-one text-center text-lg-start md-mb-40 pe-xl-5">
                        <h3 class="text-white m0">Start your <span>Journey<img src="images/lazy.svg" data-src="{{ asset("images/shape/title_shape_06.svg") }}" alt="" class="lazy-img"></span> As a Landlord.</h3>
                    </div>
                    <!-- /.title-one -->
                </div>
                <div class="col-lg-6">
                    <div class="form-wrapper me-auto ms-auto me-lg-0">
                        {{-- <form >
                            <input type="email" placeholder="Email address">
                            <button data-bs-toggle="modal" data-bs-target="#loginModal">Get Started</button>
                        </form> --}}
                        <div class="fs-16 mt-10 text-white">
                            Already a Landlord? 
                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.fancy-banner-two -->

    <script>
        
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>

        <script>

            document.addEventListener("DOMContentLoaded", function () {
            
                const downloadButton = document.getElementById("downloadButton");
            
                downloadButton.addEventListener("click", function () {
                    html2canvas(document.querySelector('#printable')).then((canvas) => {
                        let base64image = canvas.toDataURL('image/png');
                        let pdf = new jsPDF('p', 'px', [4268.62, 1675]); 
                        pdf.addImage(base64image, 'PNG', 15, 15, 1675, 4268.62);
                        pdf.save("{{$property->title}}");
                    });
                    
                });
            });

        </script>
    
@endsection