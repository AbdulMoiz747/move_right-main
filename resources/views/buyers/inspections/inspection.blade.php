@extends('buyers.layouts.parent')

@section('title', "Inspection Report | Move Right®")

@section('content')

    <!-- =============================================
        Dashboard Body
    ============================================== -->
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <x-buyers.header :buyer="$buyer" />
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

            <form action="{{route("buyers.inspections.store")}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="bg-white card-box border-20 ">
                    <h4 class="dash-title-three m0 pb-5">Instructions</h4>
                    <ul class="style-none d-flex flex-wrap filter-input" style="flex-direction: column;">
                        <li style="width: unset; list-style:auto">This report helps you identify any issues or damages that you're responsible for addressing before moving out of the property.</li>
                        <li style="width: unset; list-style:auto">As a tenant, you're required to carefully review the condition of the property and pay attention to the items listed in the report..</li>
                        <li style="width: unset; list-style:auto">Take note of any areas where you may be required to cover repair costs.</li>
                        <li style="width: unset; list-style:auto">By following these steps, you ensure that you thoroughly review the report and understand your responsibilities for maintaining the property in good condition.</li>
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