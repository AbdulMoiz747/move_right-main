@extends('buyers.layouts.parent')

@section('title', "Contracts | Move Right®")

@section('content')
    
    <!-- =============================================
        Dashboard Body
    ============================================== -->
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <x-buyers.header :buyer="$buyer"/>
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
                                <th scope="col">Landlord</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">For</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">

                            @foreach ($contracts as $contract)
                                @php
                                    $property = $contract->property;
                                    $landlord = $contract->landlord;

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
                                    <td> 
                                        <a href="{{ route("public.landlord", $landlord->id) }}" target="_blank" style="cursor: pointer;" >{{ $landlord->name }}</a> 
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($contract->from)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($contract->to)->format('d-m-Y') }}</td>
                                    <td>{{ ucfirst($contract->list_in) }}</td>
                                    <td>
                                        @php
                                            $isValid = $contract->status == "valid" ? true : false
                                        @endphp
                                        
                                        <div class="property-status {{ !$isValid ? "pending" : "" }} ">
                                            {{ $isValid ? "Valid" : "Null & Void" }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route("public.contract.rent", $contract->id) }}" target="_blank"><img src="../images/lazy.svg" data-src="{{ asset("dashboard/images/icon/icon_18.svg") }} " alt="" class="lazy-img"> View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route("buyers.contracts.nullNvoid", [$contract->id, "landlord_id" => $landlord->id, "property_id" => $property->id]) }}"><img src="../images/lazy.svg" data-src="{{ asset("dashboard/images/icon/icon_21.svg") }}" alt="" class="lazy-img"> Null & Void</a>
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
