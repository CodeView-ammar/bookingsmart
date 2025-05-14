@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة الصلاحية </strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('sys_role') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.inputText', ['label' => '  الاسم باللغه الانجليزيه ', 'name' => 'role_name_en'])
                                    @include('.forms.inputText', ['label' => '   الاسم باللغه العربية', 'name' => 'role_name_ar'])
                                    @include('.forms.inputChekBox', ['checkboxLabel' => ' نشط', 'name' => 'role_is_active'])
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
                                        <a href="{{ route('sys_role.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
