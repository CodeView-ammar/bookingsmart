@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>اضافة تراخيص</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('licenses') }}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.inputDate', ['label' => '   تاريخ بداية الترخيص', 'name' => 'Lic_start_at'])
                                    @include('.forms.inputDate', ['label' => 'تاريخ نهاية الترخيص ', 'name' => 'Lic_end_at'])
                                    @include('.forms.inputNumper', ['label' => ' عدد القاعات', 'name' => 'Lic_hall_no'])
                                    @include('.forms.inputNumper', ['label' => ' 	عدد المستخدمين  ','name' => 'Lic_user_no'])
                                    @include('.forms.inputChekBox', ['checkboxLabel' => '   تفعيل الترخيص', 'name' => 'Lic_isactive'])
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
                                        <a href="{{ route('licenses.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
