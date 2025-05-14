@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة عميل</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('customers') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.inputText', ['label' => 'اسم العميل عربي', 'name' => 'cust_name_ar'])
                                    @include('.forms.inputText', ['label' => 'اسم العميل باللغه الانجليزيه', 'name' => 'cust_name_en'])
                                    <div class="col-md-6">
    <div class="form-group">
<label>   كود العميل</label>
<input name="cust_code" class="form-control" type="text"  value="{{isset($customerNumber)?$customerNumber:''}}" readonly >

@if($errors->has('cust_code'))
    <div class="text-danger" role="alert">
        <strong>{{ $errors->first('cust_code') }}</strong>
    </div>
@endif
    </div>
</div>
                                    @include('.forms.inputText', ['label' => 'هاتف العميل', 'name' => 'cust_tel'])
                                    @include('.forms.inputText', ['label' => ' رقم سجل التجاري للعميل', 'name' => 'cust_tr_no'])
                                    @include('.forms.inputEmail', ['label' => 'البريد الالكتروني', 'name' => 'cust_email'])
                                    @include('.forms.inputText', ['label' => 'رقم الجوال', 'name' => 'cust_Mobile_no'])
                                    @include('.forms.inputText', ['label' => 'كود ترخيص العميل', 'name' => 'cust_License_code'])
                                    @include('.forms.inputFile', ['label' => 'لوجو العميل', 'name' => 'cust_logo'])
                                    @include('.forms.inputText', ['label' => 'الرقم الضريبي للعميل', 'name' => 'cust_vat_no'])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'cust_isactive'])
{{--                                    @include('.forms.inputText', ['label' => 'رمز العميل', 'name' => 'cities_cust_code'])--}}
                                    @include('.forms.inputText', ['label' => 'Email_Host', 'name' => 'cust_smtp_server'])
                                    @include('.forms.inputNumper', ['label' => 'Email_Port', 'name' => 'cust_port_no'])
                                    @include('.forms.inputText', ['label' => 'Email_user', 'name' => 'cust_email_user'])
                                    @include('.forms.inputText', ['label' => 'Email_Password', 'name' => 'cust_mail_password'])

                                    @include('.forms.inputText', ['label' => 'Sms_Gateway', 'name' => 'cust_sms_gateway'])
                                    @include('.forms.inputText', ['label' => 'Sms_Sender_Name', 'name' => 'cust_sms_sender_name'])
                                    @include('.forms.inputText', ['label' => 'Sms_User', 'name' => 'cust_sms_user'])
                                    @include('.forms.inputText', ['label' => 'Sms_Password', 'name' => 'cust_sms_password'])
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
                                        <a href="{{ route('customers.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
