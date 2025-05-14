@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة مستخدم</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('users') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.inputFile', ['label' => 'صورة هوية المستخدم', 'name' => 'user_userid_copy'])
                                    @include('.forms.inputText', ['label' => 'اسم المستخدم', 'name' => 'name'])
                                    @include('.forms.inputChekBox', ['checkboxLabel' => ' نشط', 'name' => 'user_isactive'])
{{--                                    @include('.forms.select', ['label' => 'الاثبات', 'name' => 'user_user_id'])--}}
                                    @include('.forms.selectOption', ['label' => 'الاثبات', 'name' => 'user_user_id','disName'=>'name', 'options' => user::CustCustomer()->get()])
                                    @include('.forms.inputText', ['label' => 'الجوال', 'name' => 'user_mobile'])
                                    @include('.forms.inputEmail', ['label' => 'البريد الالكتروني للمستخدم', 'name' => 'email'])
                                    @include('.forms.inputText', ['label' => 'كلمة المرور', 'name' => 'password'])
                                    @include('.forms.inputText', ['label' => 'تأكيد كلمةالمرور ', 'name' => 'password_confirmation'])
                                    @include('.forms.selectOption', ['label' => 'نوع المستخدم', 'name' => 'user_type_id','disName'=>'user_type_name_ar', 'options' => type::get()])
                                    @include('.forms.selectOption', ['label' => 'دور المستخدم', 'name' => 'user_role_id','disName'=>'role_name_ar', 'options' => sys_role::get()])

                                    <div class="col-md-6">
                                        @if(auth()->user()->type=="admin")
                                            <div class="form-group">
                                                <label>رمز العميل </label>
                                                <select name="user_cust_code" class="form-control">
                                                    @foreach (customer::get() as $option)
                                                        <option value="{{ $option->cust_code }}" @if ($option->cust_code == old("user_cust_code")) selected @endif>{{ $option->cust_name_ar }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has("user_cust_code"))
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $errors->first("user_cust_code") }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

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
                                        <a href="{{ route('users.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
