@extends('public.layouts.parent')

@section('title', "Landlord | Move Right®")

@section('content')

    <!--
    =====================================================
        Agent Details Details
    =====================================================
    -->
    <div class="agent-details theme-details-one mt-130 xl-mt-100 pb-150 xl-pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="info-pack-one mb-80 xl-mb-50">
                        <div class="row">
                            <div class="col-xl-6 d-flex">
                                @php
                                    $url = isset($landlord->profile_picture) ? Storage::url($landlord->profile_picture) : Storage::url("profile-pictures/default.svg");
                                @endphp
                                <div class="media position-relative z-1 w-100 me-xl-4" 
                                style="background-image: url({{ $url }});">
                                    <div class="tag bg-white position-absolute text-uppercase">{{ count($properties) }} Listing</div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="ps-xxl-3 pe-xxl-3 pe-xl-0 ps-xl-0 pe-3 ps-3 pt-40 lg-pt-30 pb-45 lg-pb-30">
                                    <h4>{{ $landlord->name }}</h4>
                                    <div class="designation fs-16">Sales & Broker</div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Location: </td>
                                                    <td> {{ $landlord->location->area->name }},  {{ $landlord->location->city->name }}, UK  </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone: </td>
                                                    <td> {{ $landlord->phone }} </td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td> {{ $landlord->email }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="style-none d-flex align-items-center social-icon">
                                        <li><a><i class="fa-brands fa-whatsapp"></i></a></li>
                                        <li><a><i class="fa-brands fa-x-twitter"></i></a></li>
                                        <li><a><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a><i class="fa-brands fa-viber"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.info-pack-one -->
                    <div class="agent-overview bottom-line-dark pb-40 mb-80 xl-mb-50">
                        <h4 class="mb-20">Overview</h4>
                        <p class="fs-20 lh-lg pb-15"> {{ $landlord->about }} </p>
                    </div>
                    <!-- /.agent-overview -->


                    <div class="agent-property-listing bottom-line-dark pb-20 mb-80 xl-mb-50">
                        <div class="d-sm-flex justify-content-between align-items-center mb-40 xs-mb-20">
                            <h4 class="mb-10">Listings</h4>
                            <div class="filter-nav-one xs-mt-40">
                                <ul class="style-none d-flex justify-content-center flex-wrap isotop-menu-wrapper">
                                    <li class="is-checked" data-filter="*">All</li>
                                    <li data-filter=".sell">Sell</li>
                                    <li data-filter=".rent">Rent</li>
                                </ul>
                            </div>
                        </div>
                        <div id="isotop-gallery-wrapper" class="grid-2column">
                            <div class="grid-sizer"></div>

                            @foreach ($properties as $propNumber => $property)
                                
                                <div class="isotop-item {{ $property->list_in == "rent" ? "rent" : "sell" }}">
                                    <div class="listing-card-one shadow-none style-two mb-50">
                                        <div class="img-gallery">
                                            <div class="position-relative overflow-hidden">
                                                <div class="tag bg-white text-dark fw-500">FOR {{ ucfirst( $property->list_in) }}</div>
                                                <img src="{{ isset($property->media[0]) ? Storage::url($property->media[0]) : Storage::url("property_media/image-placeholder.png") }}" class="w-100" alt="...">
                                                
                                                <div class="img-slider-btn">
                                                    {{ count($property->media) }} <i class="fa-regular fa-image"></i>
                                                    @foreach ($property->media as $media)
                                                        <a href="{{ isset($media) ? Storage::url($media) : Storage::url("property_media/image-placeholder.png") }}" class="d-block" data-fancybox="img{{ $propNumber }}" ></a>
                                                        
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->
                                        <div class="property-info d-flex justify-content-between align-items-end pt-30">
                                            <div>
                                                <strong class="price fw-500 color-dark">£{{$property->price}}</strong>
                                                <div class="address pt-5 m0"> {{ $property->address }} </div>
                                            </div>
                                            <a href="{{ route("public.property", $property->id) }}" class="btn-four mb-5"><i class="bi bi-arrow-up-right"></i></a>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>
                                
                            @endforeach
                        </div>
                    </div>
                    <!-- /.agent-property-listing -->
                </div>
                <div class="col-lg-4">
                    <div class="theme-sidebar-one dot-bg p-30 ms-xxl-3 md-mt-60">
                        
                    </div>
                    <!-- /.theme-sidebar-one -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.agent-details -->

@endsection