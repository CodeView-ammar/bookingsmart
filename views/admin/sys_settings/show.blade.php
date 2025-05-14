@extends('layouts.admin')

@section('content')
    {{--@foreach($hall->bookingHallCode as $booking)
        {{dd($booking)}}
    @endforeach--}}
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تسجيل ساعات وايام الحجز للقاعات </strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2 class="text-center">اختر القاعه</h2>
                            @foreach(hall::CustCustomer()->get() as $hall)
                                <a href="{{ URL::to('halls/days/' . $hall->id . '') }}" type="button" class="btn btn-lg btn-block btn-success">{{ $hall->hall_code }} _ {{ $hall->hallBulid ? $hall->hallBulid->build_no : null }} -  الإدارة: {{ $hall->hallDept ? $hall->hallDept->dept_name_ar : null }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <a href="{{ route('bookings.index') }}" class="col-md-6  btn btn-danger btn-rounded">الغاء</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
