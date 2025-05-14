@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>تعديل دوله</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('country', [$content->id])}}" method="post"  enctype="multipart/form-data">
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
                                    @include('.forms.inputText', ['label' => 'اسم الدولة باللغه العربية', 'name' => 'country_ar_name','content' => $content])
                                    @include('.forms.inputText', ['label' => 'اسم الدوله باللغه الانجليزية', 'name' => 'country_en_name','content' => $content])
                                    @include('.forms.inputChekBox', ['label' => 'حالة التفعيل','checkboxLabel'=>'حالة التفعيل', 'name' => 'country_isactive','content' => $content])
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
                                        <a href="{{ route('country.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
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
