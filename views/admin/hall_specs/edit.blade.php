@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل موصفات القاعه</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('hall_specs', [$content->id])}}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.selectOption', ['label' => 'رمز القاعه', 'name' => 'hallspecs_hall_code','disName'=>'hall_code', 'options' => hall::CustCustomer()->get(),'content' => $content])
                                    @include('.forms.selectOption', ['label' => 'اسم المواصفه', 'name' => 'hallspecs_specsid','disName'=>'specs_name_ar', 'options' => specification::CustCustomer()->get(),'content' => $content])
                                    @include('.forms.inputText', ['label' => 'عدد الوحدات', 'name' => 'hallspecs_specs_no','content' => $content])
{{--                                    @include('.forms.inputText', ['label' => 'الكود', 'name' => 'hallspecs_cust_code','content' => $content])--}}
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
