@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة قاعه</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('halls') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.selectOption', ['label' => 'المبني', 'name' => 'hall_bulid_id','disName'=>'build_no', 'options' => building::CustCustomer()->get()])
                                    @include('.forms.selectOption', ['label' => 'الادارة', 'name' => 'hall_dept_id','disName'=>'dept_name_ar', 'options' => department::CustCustomer()->get()])
                                    @include('.forms.inputNumper', ['label' => 'سعة القاعه', 'name' => 'hall_capacity'])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'hall_isactive'])
                              @include('.forms.inputText', ['label' => 'رمز القاعه', 'name' => 'hall_cust_code'])

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
                                        <a href="{{ route('halls.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
