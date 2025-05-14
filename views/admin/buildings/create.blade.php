@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة مبني</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('buildings') }}" method="post"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="row">
                                <div class="col-md-12">
                                    @include('.forms.inputText', ['label' => 'رقم المبني', 'name' => 'build_no'])
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الدولة</label>
                                            <select name="country" id="countrySelect" class="form-control">
                                                <option>اختر الدولة</option>
                                                @foreach (country::CustCustomer()->get() as $option)
                                                    <option value="{{ $option->id }}">{{ $option->country_ar_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>المدينة</label>
                                            <select name="city" id="citySelect" class="form-control">
                                                <option>اختر المدينة</option>
												@foreach (city::CustCustomer()->get() as $option)
                                                    <option value="{{ $option->id }}">{{ $option->cities_ar_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> الحي</label>
                                            <select name="build_dist_id" id="distSelect" class="form-control">
                                                <option>اختر الحي</option>
												@foreach (district::CustCustomer()->get() as $option)
                                                    <option value="{{ $option->id }}">{{ $option->district_name_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @include('.forms.inputText', ['label' => 'الموقع علي الخريطه', 'name' => 'build_location'])
                                    <div id="map"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <button type="submit" class="col-md-12 btn btn-success btn-rounded">
                                            اضافة
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <a href="{{ route('buildings.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .text-center {
            text-align: center;
        }

        #map {
            width: 60%;
            height: 400px;
        }
    </style>
@endsection
@section('custom-scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ7dKqYprN1efu0naDMlGspBH3WyrTQqU&callback=initMap" async></script>
    <script>
        let map, activeInfoWindow, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 24.75230169925467,
                    lng: 46.85042428002153,
                },
                zoom: 15,
            });

            map.addListener("click", function (event) {
                mapClicked(event);
            });

            initMarkers();
        }

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            // ... (your existing code for initializing markers)
        }

        /* ------------------------- Handle Map Click Event ------------------------- */
        function mapClicked(event) {
            // Extract latitude and longitude from the event
            const latitude = event.latLng.lat();
            const longitude = event.latLng.lng();

            // Set the value of the build_location input
            const buildLocationInput = document.querySelector('[name="build_location"]');
            buildLocationInput.value = `https://www.google.com/maps/place/${latitude},${longitude}`;
            // Log the coordinates to the console (optional)
            console.log("Latitude:", latitude);
            console.log("Longitude:", longitude);
        }

        /* ------------------------ Handle Marker Click Event ----------------------- */
        function markerClicked(marker, index) {
            console.log(map);
            console.log(marker.position.lat());
            console.log(marker.position.lng());
        }

        /* ----------------------- Handle Marker DragEnd Event ---------------------- */
        function markerDragEnd(event, index) {
            console.log(map);
            console.log(event.latLng.lat());
            console.log(event.latLng.lng());
        }


    </script>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Set up event listener for country select change
            $('#countrySelect').change(function() {
                var countryId = $(this).val();

                // Make an Ajax request to get cities based on the selected country
                $.ajax({
                    url: '/get-cities', // Replace with your actual route for getting cities
                    method: 'GET',
                    data: { country_id: countryId },
                    success: function(response) {
                        console.log(response);

                        // Update the city select box with the fetched cities
                        var citySelect = $('#citySelect');
                        citySelect.empty(); // Clear existing options
                        citySelect.append('<option>اختر المدينة</option>');

                        // Append new options based on the response
                        $.each(response.cities, function(index, city) {
                            citySelect.append('<option value="' + city.id + '">' + city.cities_ar_name + '</option>');
                        });

                        // Refresh the Bootstrap Selectpicker
                        citySelect.selectpicker('refresh');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Set up event listener for country select change
            $('#citySelect').change(function() {
                var cityId = $(this).val();

                // Make an Ajax request to get cities based on the selected country
                $.ajax({
                    url: '/get-dist', // Replace with your actual route for getting cities
                    method: 'GET',
                    data: { city_id: cityId },
                    success: function(response) {
                        console.log(response);

                        // Update the city select box with the fetched cities
                        var distSelect = $('#distSelect');
                        distSelect.empty(); // Clear existing options
                        distSelect.append('<option>اخترالحي</option>');

                        // Append new options based on the response
                        $.each(response.dists, function(index, dist) {
                            distSelect.append('<option value="' + dist.id + '">' + dist.district_name_ar + '</option>');
                        });

                        // Refresh the Bootstrap Selectpicker
                        distSelect.selectpicker('refresh');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
