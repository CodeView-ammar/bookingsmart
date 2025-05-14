@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة دوله</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('country') }}" method="post"  enctype="multipart/form-data">
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
{{--                                    <div className="form-group">--}}
                                        @include('.forms.inputText', ['label' => 'اسم الدولة باللغه العربية', 'name' => 'country_ar_name'])
                                        @include('.forms.inputText', ['label' => 'اسم الدوله باللغه الانجليزية ', 'name' => 'country_en_name'])
                                        @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'country_isactive'])
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
                                        <a href="{{ route('country.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
