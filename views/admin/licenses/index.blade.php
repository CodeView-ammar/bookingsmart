@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> تراخيص</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('licenses/create')}}"  class="btn btn-danger">
                                       اضف الان <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">القائمة <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a id="print-button" href="#">طباعة</a>
                                        </li>
                                        <li><a  id="export-pdf-btn" href="#">احفظ كملف pdf</a>
                                        </li>
                                        <li><a id="export-btn" href="#">استخراج شيت اكسيل</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                @if($content->count())
                                    <table class="table table-striped table-hover dataTable" id="table-editable">
                                        <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>   اسم العميل</th>
                                            <th>  كود العميل</th>
                                            <th>تاريخ بدايةالتراخيص</th>
                                            <th>تاريخ انتهاء التراخيص </th>
                                            <!-- <th>عدد المستخدمين</th>
                                            <th>عدد القاعات</th>
                                            <th> حالةالترخيص</th> -->
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $item)
                                        <tr>
                                            <td width="35">{{ $item->id }}</td>
                                            <td>{{$item->cust->cust_name_ar}}</td>
                                            <td>{{$item->Lic_cust_code}}</td>
                                            <td>{{ $item->Lic_start_at }}</td>
                                            <td>{{ $item->Lic_end_at }}</td>
                                         
                                            

                                            <td class="text-center">
                                                <a class="edit btn btn-dark" style="color:white" href="{{ URL::to('licenses/' . $item->id . '/edit') }}">
                                                    <i class="fa fa-pencil-square-o"></i>تعديل</a>
                                               {{-- <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-times-circle"></i>
                                                    Remove
                                                </a>--}}
                                                <form style="display: contents" action="{{ url('licenses', [$item->id]) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button onclick="return confirm('هل انته متاكد من الحذف ?')" type="submit" class="delete btn btn-danger" data-check-delete="true"><i class="fa fa-times-circle"></i></i>حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="card-footer clearfix">
                                        @if($content->count())
                                            {{ $content->links() }}
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
@endsection

