@extends('landlords.layouts.parent')

@section('title', "Inspection Report | Move Right®")

@section('content')

    <!-- =============================================
        Dashboard Body
    ============================================== -->
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <x-landlords.header :landlord="$landlord" />
            <!-- End Header -->

            <h2 class="main-title d-block d-lg-none">Inspection Report</h2>

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

            <form action="{{route("landlords.inspections.store")}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="bg-white card-box border-20 ">
                    <h4 class="dash-title-three m0 pb-5">Instructions</h4>
                    <ul class="style-none d-flex flex-wrap filter-input" style="flex-direction: column;">
                        <li style="width: unset; list-style:auto">The landlord is instructed to carefully create an inspection report, listing items that need the tenant's attention.</li>
                        <li style="width: unset; list-style:auto">This report will help spot any problems or damages that the tenant must fix before leaving.</li>
                        <li style="width: unset; list-style:auto">Write down the condition of the property, pointing out where the tenant might have to pay for fixes.</li>
                        <li style="width: unset; list-style:auto">Following these steps ensures that you checks everything thoroughly, making it clear what the tenant needs to do to keep the property in good shape.</li>
                    </ul>
                </div>

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three m0 pb-5">Items</h4>
                    <ul class="style-none d-flex flex-wrap filter-input" style="flex-direction: column;height: 180px;overflow: auto;">
                        @php
                            $items = [
                                "A/C & Heating", "Garage", "Swimming Pool", "Parking Area", "Lake Items", "Garden", "Disabled Access", "Pets Area", "Ceiling", "Outdoor Shower", "Refrigerator", "Fireplace", "Wifi", "TV", "Barbeque", "Laundry", "Dryer", "Lawn", "Elevator"
                            ];
                        @endphp
                        @foreach ($items as $item)

                            <li>
                                <input type="checkbox" disabled name="items[]" {{ in_array($item, $inspection->items) ? "checked" : '' }} value="{{$item}}">
                                <label>{{$item}}</label>
                            </li>

                        @endforeach
                        
                    </ul>
                </div>
                <!-- /.card-box -->

                <div class="" style="margin-top: 40px">
                    <div class="bg-white card-box border-20">
                        <h4 class="dash-title-three">Comments</h4>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Comment*</label>
                            <textarea class="size-lg" placeholder="Any comments..." name="comments" disabled>{{ $inspection->comments }}</textarea>
                            <span class="text-danger">@error('comments'){{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-box -->
            
            </form>
        </div>
    </div>
    <!-- /.dashboard-body -->

@endsection