@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> المباني</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('buildings/create')}}"  class="btn btn-danger">
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
                                            <div class='text-center'>المباني</div>
                                                 <table class='table table-striped table-hover dataTable' id='table-editable'>
                                                     <thead>
                                                         <tr role='row'>
                                                             <th>م</th>
                                                             <th>الدولة</th>
                                                             <th>المدينة</th>
                                                             <th>الحي</th>
                                                             <th>رقم المبني</th>
                                                             <th>الموقع الجغرافي </th>
                                                             <th>تاربخ الاضافة  </th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>";
                                             foreach($content as $key=>$item) {
                                                 $print .= "
                                                     <tr>
                                                         <td width='35'>". $key+1 ."</td>
                                                         <td>". @$item->buildDist->districtCity->citiesCountry->country_ar_name ."</td>
                                                         <td>". @$item->buildDist->districtCity->cities_ar_name ."</td>
                                                         <td>". $item->buildDist->district_name_ar  ."</td>
                                                         <td>". $item->build_no ."</td>
                                                         <td>". $item->build_location ."</td>
                                                         <td>". $item->created_at ."</td>

                                                     </tr>";
                                             }

                                             $print .= "
                                                     </tbody>
                                                 </table>";
                                        @endphp
                                        <li><a id="" href="{{ url('pdf') }}?print={{ urlencode($print) }}&name=Builidings.pdf">احفظ كملف pdf</a></li>

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
                                            <th> الدولة </th>
                                            <th> المدينة </th>
                                            <th> الحي </th>
                                            <th> رقم المبني </th>
                                            <th>الموقع الجغرافي </th>
                                            <th>تاربخ الاضافة </th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $key=>$item)
                                        <tr>
                                            <td width="35">{{ $key+1 }}</td>
                                            <td>{{ @$item->buildDist->districtCity->citiesCountry->country_ar_name ?? '' }}</td>
                                            <td>{{ @$item->buildDist->districtCity->cities_ar_name?? '' }}</td>
                                            <td>{{ @$item->buildDist ? $item->buildDist->district_name_ar : null }}</td>
                                            <td>{{ $item->build_no }}</td>
                                            <td><a href="{{$item->build_location}}" style="color: blue" target="_blank" >{{ $item->build_location }}</a></td>
                                            <td>{{ $item->created_at }}</td>

                                            <td class="text-center">
                                                {{--<a class="edit btn btn-dark" href="{{ URL::to('buildings/' . $item->id . '/edit') }}">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                    تعديل
                                                </a>--}}
                                                <form style="display: contents" action="{{ url('buildings/edit') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button  type="submit" class="edit btn btn-dark" data-check-delete="true"><i class="fa fa-pencil-square-o"></i>تعديل</button>
                                                </form>

                                                <form style="display: contents" action="{{ url('buildings', [$item->id]) }}" method="POST">
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

@section('custom-scripts')
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
    <script src="{{ url('assets/js/pdf.js') }}"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>--}}


    <script>
        document.getElementById('print-button').addEventListener('click', function () {
            // استدعاء دالة الطباعة
            window.print();
        });
    </script>

@endsection
