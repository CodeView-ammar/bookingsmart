@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> الايام والساعات المتاحة </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('sys_settings/create?hall_code='.$hall->hall_code)}}"  class="btn btn-danger">
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
                                            <th>نوع الحجز</th>
                                            <th>اليوم</th>
                                            <th>القاعه </th>
                                            <th>من </th>
                                            <th>الي </th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $index=>$item)
                                        <tr>
                                            <td width="35">{{ $index+1 }}</td>
                                            <td>{{ $item->sysBookingType ? $item->sysBookingType->btype_name : null }}</td>
                                            <td>{{ $item->sysDay ? $item->sysDay->day_name : null }}</td>
                                            <td>                                            {{ $item->sysHallPermitCode->hall_code }} _ {{ $item->sysHallPermitCode->hallBulid ? $item->sysHallPermitCode->hallBulid->build_no : null }} -  الإدارة: {{ $item->sysHallPermitCode->hallDept ? $item->sysHallPermitCode->hallDept->dept_name_ar : null }}
                                            </td>

                                            <td>{{ $item->sys_from_hour }}</td>
                                            <td>{{ $item->sys_to_hour }}</td>

                                            <td class="text-center">
                                                <a style="color: white" class="edit btn btn-dark" href="{{ URL::to('sys_settings/' . $item->id . '/edit??hall_code='.$hall->hall_code) }}">
                                                    <i class="fa fa-pencil-square-o"></i>تعديل</a>
                                               {{-- <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-times-circle"></i>
                                                    Remove
                                                </a>--}}
                                                <form style="display: contents" action="{{ url('sys_settings', [$item->id]) }}" method="POST">
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

