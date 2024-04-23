@extends('landlords.layouts.parent')

@section('title', "Inspection Reports | Move Right®")

@section('content')
    
    <!-- =============================================
        Dashboard Body
    ============================================== -->
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <x-landlords.header :landlord="$landlord" />
            <!-- End Header -->

            <h2 class="main-title d-block d-lg-none">My Contracts</h2>

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
            
            <div class="bg-white card-box p0 border-20">
                <div class="table-responsive pt-25 pb-25 pe-4 ps-4">
                    <table class="table property-list-table">
                        <thead>
                            <tr>
                                <th scope="col">Property</th>
                                <th scope="col">Buyer</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">

                            @foreach ($inspections as $inspection)
                                @php
                                    $property = $inspection->property;
                                    $landlord = $inspection->landlord;
                                    $buyer = $inspection->buyer;

                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-lg-flex align-items-center position-relative">
                                            <img src="{{ isset($property->media[0]) ? Storage::url($property->media[0]) : asset('images/icon/image-placeholder.svg') }}" alt="" class="p-img">
                                            <div class="ps-lg-4 md-pt-10">
                                                <a href="{{ route("public.property", $property->id) }}" target="_blank" class="property-name tran3s color-dark fw-500 fs-20 stretched-link" > {{ $property->title }} </a>
                                                <div class="address">{{ $property->address }}, {{ $property->location->area->name }}, {{ $property->location->city->name }}, UK</div>
                                                <strong class="price color-dark">£{{ $property->price }}</strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 0px 0px;">
                                        <div class="d-lg-flex align-items-center position-relative">
                                            <div class="ps-lg-4 md-pt-10">
                                                <a class="property-name tran3s color-dark fw-500 fs-20 stretched-link" > {{ $buyer->name }} </a>
                                                <div class="address">{{ $buyer->location->area->name }}, {{ $buyer->location->city->name }}, UK</div>
                                                <div class="address">{{ $buyer->phone }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="property-status " >
                                            {{ $inspection->from == "landlord" ? "Landlord" : "Buyer" }}
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <div class="property-status pending" >
                                            {{ $inspection->from == "landlord" ? "Buyer" : "Landlord"  }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route("landlords.inspections.inspection", $inspection->id) }}" target="_blank"><img src="../images/lazy.svg" data-src="{{ asset("dashboard/images/icon/icon_18.svg") }} " alt="" class="lazy-img"> View Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                    </td>
                                </tr>
                                
                                @endforeach
                        </tbody>
                    </table>
                    <!-- /.table property-list-table -->
                </div>                    
            </div>
            <!-- /.card-box -->

        </div>
    </div>
    <!-- /.dashboard-body -->
    
@endsection
