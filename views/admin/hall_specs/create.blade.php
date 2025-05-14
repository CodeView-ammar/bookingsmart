@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة مواصفات القاعه</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('hall_specs') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.selectOption', ['label' => 'رمز القاعه', 'name' => 'hallspecs_hall_code','disName'=>'hall_code', 'options' => hall::CustCustomer()->get()])
                                    @include('.forms.selectOption', ['label' => 'اسم لمواصفه', 'name' => 'hallspecs_specsid','disName'=>'specs_name_ar', 'options' => specification::CustCustomer()->get()])
                                    @include('.forms.inputText', ['label' => 'عدد الوحدات', 'name' => 'hallspecs_specs_no'])
{{--                                    @include('.forms.inputText', ['label' => 'الكود', 'name' => 'hallspecs_cust_code'])--}}
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
                                        <a href="{{ route('hall_specs.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
