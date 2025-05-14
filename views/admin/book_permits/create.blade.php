@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة تصريح</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('book_permits') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.selectOption', ['label' => 'نوع التصريح', 'name' => 'Book_permit_typeid','disName'=>'Perm_name_ar', 'options' => permits_type::CustCustomer()->get()])
                                    @include('.forms.inputDate', ['label' => 'تاريخ البداية', 'name' => 'Book_start'])
                                    @include('.forms.inputDate', ['label' => 'تاريخ النهاية', 'name' => 'Book_end'])
                                    @include('.forms.selectOption', ['label' => 'الادارة', 'name' => 'book_dept_id','disName'=>'dept_name_ar', 'options' => department::CustCustomer()->get()])
                                    @include('.forms.selectOption', ['label' => 'المستخدم صاحب التصريح', 'name' => 'book_visitor_userid','disName'=>'name', 'options' => user::get()])
{{--                                    @include('.forms.select', ['label' => 'تجديد التصريح', 'name' => 'book_is_Renewed','disName'=>'value', 'options' => book_permit::bookIsRenewedOptions()])--}}
                                  {{--  @include('.forms.select', ['label' => 'استخدام  التصريح', 'name' => 'book_is_use','disName'=>'value', 'options' => book_permit::bookIsUseOptions()])--}}
{{--                                    @include('.forms.select', ['label' => 'الموافقه علي  التصريح', 'name' => 'book_is_approval', 'options' => book_permit::bookIsApprovalOptions()])--}}
{{--                                    @include('.forms.inputDate', ['label' => 'تاريخ الموافقة علي التصريح', 'name' => 'book_approval_datetime'])--}}
                                    @include('.forms.inputTextArea', ['label' => 'ملاحظات التصريح', 'name' => 'book_notes'])
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
                                        <a href="{{ route('book_permits.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
