@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> القاعات</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('halls/create')}}"  class="btn btn-danger">
                                       اضف الان <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">القائمة <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a id="print-button" href="#">طباعة</a>
                                        </li>
                                        @php
                                            $print = "
                                            <div class='text-center'>القاعات</div>
                                                 <table class='table table-striped table-hover dataTable' id='table-editable'>
                                                     <thead>
                                                         <tr role='row'>
                                                             <th>م</th>
                                                             <th> كود القاعة</th>
                                                             <th> الحي</th>
                                                             <th> اسم المبني</th>
                                                             <th>اسم الادارة </th>
                                                             <th>سعة القاعة </th>
                                                             <th>تاريخ الانشاء </th>

                                                         </tr>
                                                     </thead>
                                                     <tbody>";
                                             foreach($content as $key=>$item) {
                                                 $print .= "
                                                     <tr>
                                                         <td width='35'>". $key+1 ."</td>
                                                         <td>". $item->hall_code  ."</td>
                                                         <td>". @$item->hallBulid->buildDist->district_name_ar  ."</td>
                                                         <td>". @$item->hallBulid->build_no   ."</td>
                                                         <td>". @$item->hallDept->dept_name_ar  ."</td>
                                                         <td>". $item->hall_capacity  ."</td>
                                                         <td>". $item->created_at  ."</td>

                                                     </tr>";
                                             }

                                             $print .= "
                                                     </tbody>
                                                 </table>";
                                        @endphp
                                        <li><a id="" href="{{ url('pdf') }}?print={{ urlencode($print) }}&name=l,القاعات.pdf">احفظ كملف pdf</a></li>                                        </li>
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
                                            <th>م</th>
                                            <th>كود القاعة</th>
                                            <th>الحي</th>
                                            <th>اسم المبني</th>
                                            <th>اسم الادارة </th>
                                            <th>سعة القاعة </th>
                                            <th>تاريخ الانشاء </th>
                                            <th>حالة التفعيل </th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $key=>$item)
                                        <tr>
                                            <td width="35">{{ $key+1 }}</td>
                                            <td>{{ $item->hall_code }}</td>
                                            <td>{{ @$item->hallBulid->buildDist->district_name_ar??"" }}</td>
                                            <td>{{ $item->hallBulid ? $item->hallBulid->build_no : null}}</td>
                                            <td>{{ $item->hallDept ? @$item->hallDept->dept_name_ar:""}}</td>
                                            <td>{{$item->hall_capacity }}</td>
                                            <td>{{$item->created_at }}</td>
                                            <td>{{ $item->hall_isactive ? 'مفعل' : 'غير مفعل' }}</td>
                                            <td class="text-center">
                                <a class="btn btn-dark" href="{{ URL::to('halls/' . $item->id . '/edit') }}">
                                    <i class="fa fa-pencil-square-o"></i> تعديل
                                </a>
                                
                                <form style="display: inline-block;" action="{{ url('halls', [$item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('هل أنت متأكد من الحذف؟')" type="submit" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i> حذف
                                    </button>
                                </form>
                                
                                <a class="btn btn-info" href="{{ URL::to('halls/booking/' . $item->id . '') }}">
                                    <i class="fa fa-eye"></i> مشاهدة الحجز
                                </a>
                                
                                <a class="btn btn-secondary" href="{{ URL::to('halls/days/' . $item->id . '') }}">
                                    <i class="fa fa-clock-o"></i> الأيام المتاحة
                                </a>
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

@section('custom-scripts')

    <script src="{{ url('assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dataTables.tableTools.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

    <script>
        document.getElementById('export-btn').addEventListener('click', function () {
            // احصل على جدول البيانات
            var table = document.getElementById('table-editable');

            // استخدم مكتبة xlsx لتحويل الجدول إلى ملف Excel
            var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
            var wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });

            // حفظ الملف
            saveAs(new Blob([s2ab(wbout)], { type: 'application/octet-stream' }), 'cities.xlsx');
        });

        // تحويل البيانات إلى مصفوفة من البايت
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

        // شيفرة لحفظ الملف
        function saveAs(blob, filename) {
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = filename;
            link.click();
        }
    </script>

    <script>
        document.getElementById('print-button').addEventListener('click', function () {
            // استدعاء دالة الطباعة
            window.print();
        });
    </script>
@endsection

