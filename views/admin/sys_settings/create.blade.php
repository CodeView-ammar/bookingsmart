@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تسجيل الايام مع ساعات العمل المتاحة</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('sys_settings') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.selectOption', ['label' => 'نوع الحجز', 'name' => 'sys_booking_type','disName'=>'btype_name', 'options' => booking_type::CustCustomer()->get()])
                                    @include('.forms.selectOption', ['label' => 'اليوم', 'name' => 'sys_day_id','disName'=>'day_name', 'options' => sys_day::get()])
                                    <input type="hidden" name="sys_hall_permit_code" value="{{ isset($_GET['hall_code']) && !empty($_GET['hall_code']) ? $_GET['hall_code'] : '' }}">
                                    {{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>القاعه </label>--}}
{{--                                            <select name="sys_hall_permit_code" class="form-control">--}}
{{--                                                @foreach (hall::CustCustomer()->get() as $option)--}}
{{--                                                    <option value="{{ $option->hall_code }}" @if ($option->hall_code == old("sys_hall_permit_code")) selected @endif>{{ $option->hall_code }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            @if($errors->has("sys_hall_permit_code"))--}}
{{--                                                <div class="text-danger" role="alert">--}}
{{--                                                    <strong>{{ $errors->first("sys_hall_permit_code") }}</strong>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    @include('.forms.inputHour', ['label' => 'من الساعه', 'name' => 'sys_from_hour'])
                                    @include('.forms.inputHour', ['label' => 'الي الساعه', 'name' => 'sys_to_hour'])
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
                                        <a href="{{ route('sys_settings.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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

