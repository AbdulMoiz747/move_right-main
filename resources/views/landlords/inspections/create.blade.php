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
                <input type="hidden" name="landlord_id" value="{{$landlord_id}}">
                <input type="hidden" name="buyer_id" value="{{$buyer_id}}">
                <input type="hidden" name="property_id" value="{{$property_id}}">
                <input type="hidden" name="from" value="landlord">

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
                        <li>
                            <input type="checkbox" name="items[]" value="A/C & Heating">
                            <label>A/C & Heating</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Garage" placeholder="">
                            <label>Garage</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Swimming Pool">
                            <label>Swimming Pool</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Parking Area">
                            <label>Parking Area</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Lake Items">
                            <label>Lake Items</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Garden">
                            <label>Garden</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Disabled Access">
                            <label>Disabled Access</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Pets Area">
                            <label>Pet Area</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Ceiling">
                            <label>Ceiling</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Outdoor Shower">
                            <label>Outdoor Shower</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Refrigerator">
                            <label>Refrigerator</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Fireplace">
                            <label>Fireplace</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Wifi">
                            <label>Wifi</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="TV">
                            <label>TV</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Barbeque">
                            <label>Barbeque</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Laundry">
                            <label>Laundry</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Dryer">
                            <label>Dryer</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Lawn">
                            <label>Lawn</label>
                        </li>
                        <li>
                            <input type="checkbox" name="items[]" value="Elevator">
                            <label>Elevator</label>
                        </li>
                    </ul>
                </div>
                <!-- /.card-box -->

                <div class="" style="margin-top: 40px">
                    <div class="bg-white card-box border-20">
                        <h4 class="dash-title-three">Comments</h4>
                        <!-- /.dash-input-wrapper -->
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Comment*</label>
                            <textarea class="size-lg" placeholder="Any comments..." name="comments" ></textarea>
                            <span class="text-danger">@error('comments'){{$message}}@enderror</span>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                </div>
                <!-- /.card-box -->
                <div class="button-group d-inline-flex align-items-center mt-30">
                    <button type="submit" class="dash-btn-two tran3s me-3">Send Report</button>
                    <button type="reset" class="dash-cancel-btn tran3s">Cancel</button>
                </div>				
            
            </form>
        </div>
    </div>
    <!-- /.dashboard-body -->

@endsection