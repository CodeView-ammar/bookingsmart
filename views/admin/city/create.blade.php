@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة مدينة</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('city') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.inputText', ['label' => 'اسم المدينة باللغه العربية', 'name' => 'cities_ar_name'])
                                    @include('.forms.inputText', ['label' => 'اسم المدينة باللغه الانجليزيه', 'name' => 'cities_en_name'])
                                    @include('.forms.selectOption', ['label' => 'الدولة', 'name' => 'cities_country_id','disName'=>'country_ar_name', 'options' => country::CustCustomer()->get()])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'cities_isactive'])
{{--                                    @include('.forms.inputText', ['label' => 'رمز المدينة', 'name' => 'cities_cust_code'])--}}
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
                                        <a href="{{ route('city.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
