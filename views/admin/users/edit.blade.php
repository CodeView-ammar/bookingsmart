@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل مستخدم</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('users', [$content->id])}}" method="post"  enctype="multipart/form-data">
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

                                    @include('.forms.inputFile', ['label' => 'صورة هوية المستخدم', 'name' => 'user_userid_copy','content' => $content])
                                    @include('.forms.inputText', ['label' => 'الاثبات', 'name' => 'user_user_id','content' => $content])
                                    @include('.forms.inputChekBox', ['checkboxLabel' => ' نشط', 'name' => 'user_isactive','content' => $content])

                                    @include('.forms.inputText', ['label' => 'اسم المستخدم', 'name' => 'name','content' => $content])
                                    @include('.forms.inputEmail', ['label' => 'البريد الالكتروني للمستخدم', 'name' => 'email','content' => $content])
                                    @include('.forms.selectOption', ['label' => 'نوع المستخدم', 'name' => 'user_type_id','disName'=>'user_type_name_ar', 'options' => type::get(),'content' => $content])
                                    @include('.forms.selectOption', ['label' => 'دور المستخدم', 'name' => 'user_role_id','disName'=>'role_name_ar', 'options' => sys_role::get(),'content' => $content])

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
