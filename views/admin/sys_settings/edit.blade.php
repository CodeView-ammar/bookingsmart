@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل مدينة</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('sys_settings', [$content->id])}}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.selectOption', ['label' => 'نوع الحجز', 'name' => 'sys_booking_type','disName'=>'btype_name', 'options' => booking_type::CustCustomer()->get()])
{{--                                    @include('.forms.selectOption', ['label' => 'اليوم', 'name' => 'sys_day_id','disName'=>'day_name', 'options' => sys_day::get()])--}}
{{--                                    <input type="hidden" name="sys_hall_permit_code" value="{{ $_GET['hall_code'] }}">--}}
                                    @include('.forms.inputHour', ['label' => 'من الساعه', 'name' => 'sys_from_hour','content'=>$content])
                                    @include('.forms.inputHour', ['label' => 'الي الساعه', 'name' => 'sys_to_hour','content'=>$content])
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
