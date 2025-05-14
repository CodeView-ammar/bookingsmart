@extends('layouts.admin')

@section('content')
    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>استعلام تصريح</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="inquery" method="post"  enctype="multipart/form-data">
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
                                    <div id="ModalShow">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <a href="{{ route('book_permits.index') }}"  class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</a>
                                                    <h4 class="modal-title"><strong>الاستعلام عن</strong> تصريح</h4>
                                                </div>
                                                <div class="modal-body h3">

                                                    <table class="table table-striped table-hover dataTable" id="table-editable" aria-describedby="table-editable_info">
                                                        <tbody>
                                                        <tr id="specContainer">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input name="bar_code" placeholder="باركود التصريح" class="form-control" type="text" value="{{ old('bar_code', isset($content) ? $content->bar_code : '') }}" >
                                                                    @if($errors->has('bar_code'))
                                                                        <div class="text-danger" role="alert">
                                                                            <strong>{{ $errors->first('bar_code') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input name="user_id" placeholder="الاثبات" class="form-control" type="text" value="{{ old('user_id', isset($content) ? $content->user_id : '') }}" >
                                                                    @if($errors->has('user_id'))
                                                                        <div class="text-danger" role="alert">
                                                                            <strong>{{ $errors->first('user_id') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input name="mobile" placeholder="الجوال" class="form-control" type="text" value="{{ old('mobile', isset($content) ? $content->mobile : '') }}" >
                                                                    @if($errors->has('mobile'))
                                                                        <div class="text-danger" role="alert">
                                                                            <strong>{{ $errors->first('mobile') }}</strong>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    {{--                                                <button type="button" onclick="addSpecField()" class="btn btn-primary">إضافة مميزات خاصة</button>--}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button  type="submit" class="btn btn-default close-modal" data-dismiss="modal">الاستعلام عن تصريح</button>
                                                    <button  type="submit" name="action" value="print" class="btn btn-success close-modal" data-dismiss="modal">طباعة التصريح</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
