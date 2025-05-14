@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل حجز</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('bookings', [$content->id])}}" method="post"  enctype="multipart/form-data">
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
                                   {{-- @include('.forms.selectOption', ['label' => 'نوع التصريح', 'name' => 'Book_permit_typeid','disName'=>'Perm_name_ar', 'options' => permits_type::get()])
                                    @include('.forms.inputDate', ['label' => 'تاريخ البداية', 'name' => 'Book_start'])
                                    @include('.forms.inputDate', ['label' => 'تاريخ النهاية', 'name' => 'Book_end'])
                                    @include('.forms.selectOption', ['label' => 'الادارة', 'name' => 'book_dept_id','disName'=>'dept_name_ar', 'options' => department::get()])
                                    --}}{{--                                @include('.forms.inputText', ['label' => 'كود التصريح', 'name' => 'book_permit_code'])--}}{{--
                                    @include('.forms.selectOption', ['label' => 'المستخدم صاحب التصريح', 'name' => 'book_visitor_userid','disName'=>'name', 'options' => user::get()])
                                    @include('.forms.select', ['label' => 'تجديد التصريح', 'name' => 'book_is_Renewed','disName'=>'value', 'options' => book_permit::bookIsRenewedOptions()])
                                    @include('.forms.select', ['label' => 'استخدام  التصريح', 'name' => 'book_is_use','disName'=>'value', 'options' => book_permit::bookIsUseOptions()])
                                    @include('.forms.select', ['label' => 'الموافقه علي  التصريح', 'name' => 'book_is_approval', 'options' => book_permit::bookIsApprovalOptions()])
                                    @include('.forms.inputDate', ['label' => 'تاريخ الموافقة علي التصريح', 'name' => 'book_approval_datetime'])
                                    @include('.forms.inputChekBox', ['label' => 'تاكيد الحجز','checkboxLabel'=>'تاكيد الحجز', 'name' => 'book_is_Confirmed'])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'book_isactive'])
                                    @include('.forms.inputTextArea', ['label' => 'ملاحظات التصريح', 'name' => 'book_notes'])
                                    @include('.forms.inputText', ['label' => 'رمز العميل  ', 'name' => 'book_cust_code'])
--}}                                </div>
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
                                        <a href="{{ route('bookings.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
