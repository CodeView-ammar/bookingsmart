@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل قاعة</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('halls', [$content->id])}}" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">

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
                                    @include('.forms.selectOption', ['label' => 'المبني', 'name' => 'hall_bulid_id','disName'=>'build_no', 'options' => building::CustCustomer()->get(),'content' => $content])
                                    @include('.forms.selectOption', ['label' => 'الادارة', 'name' => 'hall_dept_id','disName'=>'dept_name_ar', 'options' => department::CustCustomer()->get(),'content' => $content])
                                    @include('.forms.inputNumper', ['label' => 'سعة القاعه', 'name' => 'hall_capacity','content' => $content])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'hall_isactive','content' => $content])
{{--                                    @include('.forms.inputText', ['label' => 'رمز القاعه', 'name' => 'hall_cust_code','content' => $content])--}}

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <button type="submit" class="col-md-12 btn btn-success btn-rounded">
                                            تحديث
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
