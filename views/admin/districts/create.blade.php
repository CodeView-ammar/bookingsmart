@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة حي</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('districts') }}" method="post"  enctype="multipart/form-data">
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
                                            <select name="district_city_id" id="citySelect" class="form-control">
                                                <option>اختر المدينة</option>
                                            </select>
                                        </div>
                                    </div>
                                    @include('.forms.inputText', ['label' => 'اسم الحي باللغه العربيه', 'name' => 'district_name_ar'])
                                    @include('.forms.inputText', ['label' => 'اسم الحي باللغه الانجليزيه', 'name' => 'district_name_eng'])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'district_isactive'])
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
                                        <a href="{{ route('districts.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
@endpush
