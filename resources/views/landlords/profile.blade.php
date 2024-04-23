@extends('landlords.layouts.parent')

@section('title', "Profile | Move Right®")

@section('content')

<div class="dashboard-body">
    <div class="position-relative">
        <!-- ************************ Header **************************** -->
        <x-landlords.header :landlord="$landlord"/>
        <!-- End Header -->

        <h2 class="main-title d-block d-lg-none">Profile</h2>

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

        <form action="{{ route("landlords.profile.update", $landlord->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white card-box border-20">
                
                <div class="user-avatar-setting d-flex align-items-center mb-30">
                    <img id="profilePicture" src="{{ asset("/images/lazy.svg") }}" data-src="{{ $landlord->profile_picture ? Storage::url($landlord->profile_picture) : Storage::url("profile-pictures/default.svg") }}
                    " alt="" class="lazy-img user-img">
                    <div class="upload-btn position-relative tran3s ms-4 me-3">
                        Upload new photo
                        <input type="file" id="uploadImg" name="profile_picture" placeholder="" >
                    </div>
                </div>
                <!-- /.user-avatar-setting -->
                <div class="row">
                    <div class="col-12">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Name*</label>
                            <input type="text" placeholder="John Doe" value="{{ $landlord->name }}" name="name">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-sm-6">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Email*</label>
                            <input type="email" placeholder="user@gmail.com" name="email" value="{{ $landlord->email }}" >
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-sm-6">
                        <div class="dash-input-wrapper mb-30">
                            <label for="">Phone Number*</label>
                            <input type="tel" placeholder="+69 666999" name="phone" value="{{ $landlord->phone }}">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-12">
                        <div class="dash-input-wrapper">
                            <label for="">About*</label>
                            <textarea class="size-lg"
                                placeholder="Tell about yourself.." name="about">{{ $landlord->about }}</textarea>
                            <div class="alert-text">Brief description of yourself. URLs are hyperlinked.</div>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                </div>


            </div>
            <!-- /.card-box -->

            <div class="bg-white card-box border-20 mt-40">
                <h4 class="dash-title-three">Location</h4>
                <div class="row">
                    {{-- <div class="col-12">
                        <div class="dash-input-wrapper mb-25">
                            <label for="">Address*</label>
                            <input type="text" placeholder="19 Yawkey Way">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div> --}}
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-25">
                            <label for="city">City*</label>
                            <select class="nice-select" name="city_id" id="city">
                                <option value="" style="display: none;">Select city</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $landlord->location->city->id  == $city->id ? 'selected' : '' }} >{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('city_id'){{$message}}@enderror</span>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-25">
                            <label for="area">Area*</label>
                            <select class="nice-select" name="area_id" id="area">
                                <option value="" style="display: none;">Select Area</option>
                            </select>
                            <span class="text-danger">@error('area_id'){{$message}}@enderror</span>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                    {{-- <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-25">
                            <label for="">Zip Code*</label>
                            <input type="number" placeholder="1708">
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div> --}}
                    {{-- <div class="col-lg-3">
                        <div class="dash-input-wrapper mb-25">
                            <label for="">State*</label>
                            <select class="nice-select">
                                <option>Maine</option>
                                <option>Tokyo</option>
                                <option>Delhi</option>
                                <option>Shanghai</option>
                                <option>Mumbai</option>
                                <option>Bangalore</option>
                            </select>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div> --}}
                    {{-- <div class="col-12">
                        <div class="dash-input-wrapper mb-25">
                            <label for="">Map Location*</label>
                            <div class="position-relative">
                                <input type="text" placeholder="XC23+6XC, Moiran, N105">
                                <button class="location-pin tran3s"><img src="../images/lazy.svg"
                                        data-src="images/icon/icon_16.svg" alt="" class="lazy-img m-auto"></button>
                            </div>
                            <div class="map-frame mt-30">
                                <div class="gmap_canvas h-100 w-100">
                                    <iframe class="gmap_iframe h-100 w-100"
                                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=dhaka%20collage&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div> --}}
                </div>
            </div>
            <!-- /.card-box -->

            <div class="button-group d-inline-flex align-items-center mt-30">
                <button type="submit" class="dash-btn-two tran3s me-3">Save </button>
                <button type="reset" class="dash-cancel-btn tran3s">Cancel </button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#city').change(function () {
            var cityId = $(this).val();

            $.ajax({
                type: 'GET',
                url: '{{ route("landlords.properties.getAreasByCity") }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: { city_id: cityId },
                success: function (data) {
                    console.log(data);
                    $('#area').empty();

                    $.each(data, function (index, area) {
                        $('#area').append('<option value="' + area.id + '">' + area.name + '</option>');
                    });

                    $('#area').niceSelect('update');
                }
            });
        });
            var cityId = {{ $landlord->location->city->id }};

            $.ajax({
                type: 'GET',
                url: '{{ route("landlords.properties.getAreasByCity") }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: { city_id: cityId },
                success: function (data) {
                    console.log(data);
                    $('#area').empty();

                    var selectedAreaId = {{ $landlord->location->area->id ?? 'null' }};
                    
                    $.each(data, function (index, area) {
                        $('#area').append('<option value="' + area.id + '" ' + (selectedAreaId == area.id ? 'selected' : '') + '>' + area.name + '</option>');
                    });

                    $('#area').niceSelect('update');
                }
            });
    });
</script>

<script>
    document.getElementById('uploadImg').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePicture').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

</script>

@endsection