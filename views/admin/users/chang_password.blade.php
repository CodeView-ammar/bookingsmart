@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong> تعديل كلمة المرور المستخدم [{{$content->name}}]</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('change_password')}}" method="post"  enctype="multipart/form-data">
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

                                    @include('.forms.inputPassword', ['label' => 'كلمة المرور القديمة', 'name' => 'OldPassword','content' => $content])
                                    @include('.forms.inputPassword', ['label' => 'كلمة المرور الجديدة', 'name' => 'password','content' => null])
                                    @include('.forms.inputPassword', ['label' => 'تاكيد كلمة المرور الجديدة', 'name' => 'confirmPassword','content' => $content])

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
