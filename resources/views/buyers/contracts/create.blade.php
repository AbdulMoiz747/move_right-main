
@extends('landlords.layouts.parent')

@section('title', "Add Property | Move Right®")

@section('content')
    <!-- 
    =============================================
        Dashboard Body
    ============================================== 
    -->
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <x-landlords.header :buyer="$buyer"/>
            <!-- End Header -->

            <h2 class="main-title d-block d-lg-none">Add New Property</h2>

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

            <form action="{{route("landlords.properties.store")}}" method="post" enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="landlord_id" value="{{$landlord->id}}">

                <div class="bg-white card-box border-20">
                    <h4 class="dash-title-three">Overview</h4>
                    <div class="dash-input-wrapper mb-30">
                        <label for="">Property Title*</label>
                        <input type="text" placeholder="Your Property Name" name="title" >
                        <span class="text-danger">@error('title'){{$message}}@enderror</span>
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="dash-input-wrapper mb-30">
                        <label for="">Description*</label>
                        <textarea class="size-lg" placeholder="Write about property..." name="description" ></textarea>
                        <span class="text-danger">@error('description'){{$message}}@enderror</span>
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Type*</label>
                                <select class="nice-select" name="type" >
                                    <option value="" style="display: none;">Select Type</option> 
                                    <option value="house">House</option>
                                    <option value="plot">Plot</option>
                                    <option value="apartments">Apartments</option>
                                    <option value="industrial">Industrial</option>
                                    <option value="condos">Condos</option>
                                    <option value="villas">Villas</option>
                                    <option value="lofts">Lofts</option>
                                </select>
                                <span class="text-danger">@error('type'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Listed in*</label>
                                <select class="nice-select" name="list_in" >
                                    <option value="" style="display: none;">List As</option>
                                    <option value="sell">Sell</option>
                                    <option value="rent">Rent</option>
                                    <span class="text-danger">@error('list_in'){{$message}}@enderror</span>
                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Price*</label>
                                <input type="number" placeholder="Your Price" name="price" >
                                <span class="text-danger">@error('price'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="allow_sublet" value="0">
                            <input type="checkbox" name="allow_sublet" value="1">
                            <label>Allow Sublet?</label>
                            <div class="dash-input-wrapper mb-30">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                    </div>
                </div>
                <!-- /.card-box -->
                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Listing Details</h4>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Size in yard*</label>
                                <input type="number" placeholder="Ex: 180 sqyard" name="sq_yard" >
                                <span class="text-danger">@error('sq_yard'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Bedrooms*</label>
                                <select class="nice-select" name="bedrooms" required>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <span class="text-danger">@error('bedrooms'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Bathrooms*</label>
                                <select class="nice-select" name="bathrooms" required>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <span class="text-danger">@error('bathrooms'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Kitchens*</label>
                                <select class="nice-select" name="kitchens" required>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <span class="text-danger">@error('kitchens'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Garages</label>
                                <select class="nice-select" name="garages" required>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <span class="text-danger">@error('garages'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Year Built*</label>
                                <input type="number" placeholder="Type Year" name="built_year" >
                                <span class="text-danger">@error('built_year'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        
                    </div>
                </div>
                <!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Photo & Video Attachment</h4>
                    <div class="dash-input-wrapper mb-20" id="attachedFilesContainer">
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <button type="button" class="dash-btn-one d-inline-block position-relative me-3" onclick="attachFile()">
                        <i class="bi bi-plus"></i>
                        Upload File
                    </button>
                    <small>Upload file .jpg .jpeg .png .mp4</small>
                    <span class="text-danger" id="mediaError"></span>
                </div>

                <!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three m0 pb-5">Select Amenities</h4>
                    <ul class="style-none d-flex flex-wrap filter-input">
                        <li>
                            <input type="checkbox" name="amenities[]" value="A/C & Heating">
                            <label>A/C & Heating</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Garages" placeholder="">
                            <label>Garages</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Swimming Pool">
                            <label>Swimming Pool</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Parking">
                            <label>Parking</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Lake View">
                            <label>Lake View</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Garden">
                            <label>Garden</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Disabled Access">
                            <label>Disabled Access</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Pet Friendly">
                            <label>Pet Friendly</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Ceiling Height">
                            <label>Ceiling Height</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Outdoor Shower">
                            <label>Outdoor Shower</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Refrigerator">
                            <label>Refrigerator</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Fireplace">
                            <label>Fireplace</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Wifi">
                            <label>Wifi</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="TV Cable">
                            <label>TV Cable</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Barbeque">
                            <label>Barbeque</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Laundry">
                            <label>Laundry</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Dryer">
                            <label>Dryer</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Lawn">
                            <label>Lawn</label>
                        </li>
                        <li>
                            <input type="checkbox" name="amenities[]" value="Elevator">
                            <label>Elevator</label>
                        </li>
                    </ul>
                </div>
                <!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Address & Location</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-input-wrapper mb-25">
                                <label for="">Address*</label>
                                <input type="text" placeholder="145/A, Ranchview" name="address" >
                                <span class="text-danger">@error('address'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-lg-4">
                            <div class="dash-input-wrapper mb-25">
                                <label for="city">City*</label>
                                <select class="nice-select" name="city_id" id="city">
                                    <option value="" style="display: none;">Select city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('city_id'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-lg-4">
                            <div class="dash-input-wrapper mb-25">
                                <label for="area">Area*</label>
                                <select class="nice-select" name="area_id" id="area">
                                    <option value="" style="display: none;">Select Area</option>
                                </select>
                                <span class="text-danger">@error('area_id'){{$message}}@enderror</span>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                    </div>
                </div>
                <!-- /.card-box -->
                <div class="button-group d-inline-flex align-items-center mt-30">
                    <button type="submit" class="dash-btn-two tran3s me-3">Submit Property</button>
                    <button type="reset" class="dash-cancel-btn tran3s">Cancel</button>
                </div>				
            
            </form>
        </div>
    </div>
    <!-- /.dashboard-body -->

    <!-- Optional JavaScript _____________________________  -->
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
        });
    </script>

    <script>
        const attachedFilesContainer = document.getElementById('attachedFilesContainer');
        let count = 1

        function attachFile() {
            let filesContainer = document.querySelector("#attachedFilesContainer")
            let inputId = Math.random().toString(36).substring(2, 10) + new Date().getTime().toString(36);

            const fileContainer = document.createElement('div');
            fileContainer.classList.add('attached-file', 'd-flex', 'align-items-center', 'justify-content-between', 'mb-15');

            const fileNameSpan = document.createElement('label');
            fileNameSpan.textContent = `Media File ${count}`;
            fileNameSpan.htmlFor = inputId
            fileNameSpan.style = `height: 100%;width: 100%;line-height: 5;`

            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.type = "button"
            removeBtn.innerHTML = '<i class="bi bi-x"></i>';
            removeBtn.addEventListener('click', () => removeFile(fileContainer));

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.onchange = () => updateLabel(inputId);
            fileInput.accept = '.jpg, .jpeg, .png, .mp4';
            fileInput.id = inputId;
            fileInput.name = 'media[]';
            fileInput.style.display = 'none'; 

            fileContainer.appendChild(fileNameSpan);
            fileContainer.appendChild(removeBtn);
            fileContainer.appendChild(fileInput);

            if (count == 6) {
                alert("You can max add 5 media for each listing.")
            }else{
                attachedFilesContainer.appendChild(fileContainer);
                count++
            }

        }

        function updateLabel(id) {
            const fileInput = document.getElementById(id);
            const fileLabel = document.querySelector(`label[for="${id}"]`);

            const files = fileInput.files;

            for (const file of files) {
                fileLabel.textContent = `${file.name}   |   ${file.type}`
            }

        }

        function removeFile(fileContainer) {
            attachedFilesContainer.removeChild(fileContainer);
            count--
        }

    </script>
@endsection