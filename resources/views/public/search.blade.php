@extends('public.layouts.parent')

@section('title', "Listings | Move Right®")

@section('content')

    <!--
    =====================================================
        Property Listing Six
    =====================================================
    -->
    <div class="property-listing-six bg-pink-two pt-110 md-pt-80 pb-170 xl-pb-120 mt-100 xl-mt-120">
        <div class="container">
            <div class="listing-header-filter d-sm-flex justify-content-between align-items-center mb-40 lg-mb-30">
                <div>Showing <span class="color-dark fw-500">{{ count($properties) }}</span> results</div>
            </div>
            <!-- /.listing-header-filter -->

            {!! count($properties) == 0 ? '<h1>No Properties Found</h1>' : '' !!}

            @foreach ($properties as $propNumber => $property)

                <div class="listing-card-seven border-20 p-20 mb-50 wow fadeInUp">
                    <div class="d-flex flex-wrap layout-one">
                        @php
							$url = isset($property->media[0]) ? Storage::url($property->media[0]) : asset('images/icon/image-placeholder.svg');
						@endphp
                        <div class="img-gallery position-relative z-1 border-20 overflow-hidden" style="background-image: url('{{ $url }}');">

                            <div class="tag border-20 {{ $property->list_in == "rent" ? "" : "sale"}}">FOR {{ ucfirst($property->list_in) }}</div>
                            <div class="img-slider-btn">
                                {{ count($property->media) }} <i class="fa-regular fa-image"></i>
                                @foreach ($property->media as $mediaNum => $media)
                                    <a href="{{ isset($media) ? Storage::url($media) : asset('images/icon/image-placeholder.svg') }}" class="d-block" data-fancybox="img{{$propNumber}}" ></a>
                                    
                                @endforeach
                            </div>
                        </div>
                        <!-- /.img-gallery -->
                        <div class="property-info">
                            <a href="{{ route("public.property", $property->id) }}" class="title tran3s mb-15">{{ $property->title }}</a>
                            <div class="address">{{ $property->address }}, {{ $property->location->area->name }}, {{ $property->location->city->name }}, UK</div>
                            <div class="feature mt-30 mb-30 pt-30 pb-5">
                                <ul class="style-none d-flex flex-wrap align-items-center justify-content-between">
                                    <li><strong>{{ $property->sq_yard }}</strong> sqyard</li>
                                    <li><strong>{{ $property->bedrooms }}</strong> bed</li>
                                    <li><strong>{{ $property->bathrooms }}</strong> bath</li>
                                    <li><strong>{{ $property->kitchens }}</strong> Kitchen</li>
                                    <li><strong>{{ $property->garages }}</strong> Garages</li>
                                </ul>
                            </div>
                            <div class="pl-footer d-flex flex-wrap align-items-center justify-content-between">
                                <strong class="price fw-500 color-dark me-auto">£{{ $property->price }}</strong>
                                {{-- <ul class="style-none d-flex action-icons on-top">
                                    <li><a href="#"><i class="fa-light fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa-light fa-bookmark"></i></a></li>
                                    <li><a href="#"><i class="fa-light fa-circle-plus"></i></a></li>
                                </ul> --}}
                                <a href="{{ route("public.property", $property->id) }}" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                            </div>
                        </div>
                        <!-- /.property-info -->
                    </div>
                </div>
                <!-- /.listing-card-seven -->
            
            @endforeach

        </div>
    </div>
    <!-- /.property-listing-six -->

@endsection