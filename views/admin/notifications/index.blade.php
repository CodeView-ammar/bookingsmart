@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> الاشعارات</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('notifications/create')}}"  class="btn btn-danger">
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
                                            <th>م</th>
                                            <th>اسم الاشعار باللغه العربيى</th>
                                            <th>اسم الاشعار باللغه الانجليزية</th>
                                            <th>حالة التفعيل</th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $key=>$item)
                                        <tr>
                                            <td width="35">{{ $key+1 }}</td>
                                            <td>{{ $item->Notifi_name_ar }}</td>
                                            <td>{{ $item->Notifi_name_eng }}</td>
                                            <td>{{ $item->Notifi_isactive?'مفعل':'غير مفعل' }}</td>
                                            <td class="text-center">
                                                <a style="color: white" class="edit btn btn-dark" href="{{ URL::to('notifications/' . $item->id . '/edit') }}">
                                                    <i class="fa fa-pencil-square-o"></i>تعديل</a>
                                               {{-- <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-times-circle"></i>
                                                    Remove
                                                </a>--}}
                                                <form style="display: contents" action="{{ url('notifications', [$item->id]) }}" method="POST">
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
            saveAs(new Blob([s2ab(wbout)], { type: 'application/octet-stream' }), 'notifications.xlsx');
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

    <script>
        $(document).ready(function() {
            // قم بتحميل jsPDF
            window.jsPDF = window.jspdf.jsPDF;

            document.getElementById('export-pdf-btn').addEventListener('click', function () {
                // احصل على جدول البيانات
                var table = document.getElementById('table-editable');
                const myFont ="https://code.jquery.com/jquery-1.10.2.min.js"
                // استخدم مكتبة jsPDF لتحويل الجدول إلى ملف PDF
                var pdf = new jsPDF('p', 'pt', 'a4');
                pdf.addFileToVFS("Arial.ttf", myFont);

                // استخدام خط اللغة العربية (utf-8)
                pdf.addFont('Arial.ttf','Arial', 'normal');

                // أو يمكنك تحديد خط مخصص يدعم اللغة العربية
                // pdf.setFont('your-arabic-font', 'normal');

                pdf.autoTable({html: table});

                // حفظ الملف
                pdf.save('notifications.pdf');
            });
        });
    </script>
    <script>
        document.getElementById('print-button').addEventListener('click', function () {
            // استدعاء دالة الطباعة
            window.print();
        });
    </script>

@endsection
