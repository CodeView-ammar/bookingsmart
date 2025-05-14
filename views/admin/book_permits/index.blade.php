@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <!-- END MAIN CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة  </strong> التصاريح</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('book_permits/create')}}"  class="btn btn-danger">
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
                                            <table class='table table-striped dataTable' id='table2' aria-describedby='example2_info'>
                                                <thead>
                                                    <tr role='row'>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 42px;' aria-label=': activate to sort column ascending'></th>
                                                        <th class='sorting_asc' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 279px;' aria-sort='ascending' aria-label='Rendering engine: activate to sort column descending'>
                                                            نوع التصريح
                                                        </th>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 350px;' aria-label='Browser: activate to sort column ascending'>
                                                            اسم صاحب التصريح
                                                        </th>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 322px;' aria-label='Platform(s): activate to sort column ascending'>
                                                            كود التصريح
                                                        </th>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 241px;' aria-label='Engine version: activate to sort column ascending'>
                                                            تاريخ النهاية
                                                        </th>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 171px;' aria-label='CSS grade: activate to sort column ascending'>
                                                            الادارة
                                                        </th>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 171px;' aria-label='CSS grade: activate to sort column ascending'>
                                                            الموافقه علي التصريح
                                                        </th>
                                                        <th class='sorting' role='columnheader' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' style='width: 171px;' aria-label='CSS grade: activate to sort column ascending'>
                                                            تأكيد التصريح
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody role='alert' aria-live='polite' aria-relevant='all'>";
                                                        foreach($content as $item){
                                                           $print .= "
                                                            <tr class='gradeA odd'>
                                                                <td class='center'></td>
                                                                <td class='sorting_1'>". ($item->bookPermitTypeid ? $item->bookPermitTypeid->Perm_name_ar : null) ."</td>
                                                                <td>". ($item->bookVisitorUserid ? $item->bookVisitorUserid->name : null) ."</td>
                                                                <td>". $item->book_permit_code ."</td>
                                                                <td class='center'>". $item->Book_end ."</td>
                                                                <td class='center'>". ($item->bookDept ? $item->bookDept->dept_name_ar : null) ."</td>
                                                                <td class='text-center'>
                                                                    <div class='form-group'>
                                                                        <select name='book_is_approval' class='form-control'>
                                                                            <option value='3' style='color: #212020'>لم يحدد</option>
                                                                            <option value='1' ". ($item->book_is_approval == 1 ? 'selected' : '') ." style='color: #212020'>مقبول</option>
                                                                            <option value='0' ". ($item->book_is_approval == 0 ? 'selected' : '') ." style='color: #212020'>مرفوض</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td class='text-center'>
                                                                    <div class='form-group'>
                                                                        <select form='form2{{$item->id}}' name='book_is_Confirmed' class='form-control'>
                                                                            <option value='1' ". ($item->book_is_Confirmed == 1 ? 'selected' : '') ." style='color: #212020'>مؤكد</option>
                                                                            <option value='0' ". ($item->book_is_Confirmed == 0 ? 'selected' : '') ." style='color: #212020'>غير مؤكد </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>";
                                                        }
                                            $print .= "
                                                </tbody>
                                            </table>";
                                        @endphp
                                        <li><a id="" href="{{ url('pdf') }}?print={{ urlencode($print) }}&name=City.pdf">احفظ كملف pdf</a></li>
                                        </li>
                                        <li><a id="export-btn" href="#">استخراج شيت اكسيل</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <table class="table table-striped dataTable" id="table2" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 42px;" aria-label=": activate to sort column ascending"></th>
                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 279px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                            نوع التصريح
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 350px;" aria-label="Browser: activate to sort column ascending">
                                            اسم صاحب التصريح
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 322px;" aria-label="Platform(s): activate to sort column ascending">
                                            كود التصريح</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 241px;" aria-label="Engine version: activate to sort column ascending">
                                            تاريخ النهاية
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 171px;" aria-label="CSS grade: activate to sort column ascending">
                                            الادارة
                                        </th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 171px;" aria-label="CSS grade: activate to sort column ascending">
                                            الموافقه علي التصريح
                                        </th>

                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 171px;" aria-label="CSS grade: activate to sort column ascending">
                                             تأكيد التصريح
                                        </th>

                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 171px;" aria-label="CSS grade: activate to sort column ascending">
                                             تفعيل التصريح
                                        </th>

                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" style="width: 171px;" aria-label="CSS grade: activate to sort column ascending">
                                            الحذف
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    @foreach($content as $item)
                                        <tr class="gradeA odd">
                                            <td class="center ">
                                            <?php
                                                        if(!($item->book_is_use==1||$item->Book_end<now()))
                                                        {?>
                                                <i style="color: #C75757" class="fa fa-plus-square-o" onclick="toggleDetails(this)"></i>
                                                <?php } ?>
                                            </td>
                                            <td class=" sorting_1">{{ $item->bookPermitTypeid ? $item->bookPermitTypeid->Perm_name_ar : null }}</td>
                                            <td class=" ">{{  $item->bookVisitorUserid ? $item->bookVisitorUserid->name : null  }}</td>
                                            <td class=" ">{{ $item->book_permit_code }}</td>
                                            <td class="center ">{{ $item->Book_end }}</td>
                                            <td class="center ">{{ $item->bookDept ? $item->bookDept->dept_name_ar : null }}</td>
                                            <td class="text-center">
                                                <form id="form1{{$item->id}}" action="{{url('book_permits', [$item->id])}}" method="post"  enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    {{ csrf_field() }}
                                                </form>
                                                <div class="form-group">
                                                    <select form="form1{{$item->id}}" onchange="submitForm('{{ $item->id }}', '')" name="book_is_approval" class="form-control">
                                                        <option value="3"  style="color: #212020">لم يحدد</option>
                                                        <option value="1" @if($item->book_is_approval==1)selected @endif style="color: #212020">مقبول</option>
                                                        <option value="0" @if($item->book_is_approval==0)selected @endif style="color: #212020">مرفوض</option>
                                                    </select >
                                                    {{--                                                        </div>--}}
                                                </div>
                                                <script>
                                                    function submitForm(itemId, method) {
                                                        var form = $('#form1' + itemId);
                                                        // إضافة حقل إخفاء لتحديد الطريقة (phone أو email)
                                                        $('<input>').attr({
                                                            type: 'hidden',
                                                            name: 'submit_method',
                                                            value: method
                                                        }).appendTo(form);
                                                        // إرسال النموذج
                                                        form.submit();
                                                    }
                                                </script>
                                            </td>

                                            <td class="text-center">
                                                <form id="form2{{$item->id}}" action="{{url('book_permits', [$item->id])}}" method="post"  enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    {{ csrf_field() }}
                                                </form>
                                                <div class="form-group">
                                                    <select form="form2{{$item->id}}" onchange="submitForm2('{{ $item->id }}', '')" name="book_is_Confirmed" class="form-control">
                                                        <option value="1" @if($item->book_is_Confirmed==1)selected @endif style="color: #212020">مؤكد</option>
                                                        <option value="0" @if($item->book_is_Confirmed==0)selected @endif style="color: #212020">غير مؤكد </option>
                                                    </select >
                                                    {{--                                                        </div>--}}
                                                </div>
                                                <script>
                                                    function submitForm2(itemId, method) {
                                                        var form = $('#form2' + itemId);
                                                        // إضافة حقل إخفاء لتحديد الطريقة (phone أو email)
                                                        $('<input>').attr({
                                                            type: 'hidden',
                                                            name: 'submit_confirm_method',
                                                            value: method
                                                        }).appendTo(form);
                                                        // إرسال النموذج
                                                        form.submit();
                                                    }
                                                </script>
                                            </td>

                                            <td class="text-center">
                                                <form id="form3{{$item->id}}" action="{{url('book_permits', [$item->id])}}" method="post"  enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    {{ csrf_field() }}
                                                </form>
                                                <div class="form-group">
                                                    <select form="form3{{$item->id}}" onchange="submitForm3('{{ $item->id }}', '')" name="book_isactive" class="form-control">
                                                        <option value="1" @if($item->book_isactive==1)selected @endif style="color: #212020">مفعل</option>
                                                        <option value="0" @if($item->book_isactive==0)selected @endif style="color: #212020">غير مفعل </option>
                                                    </select >
                                                    {{--                                                        </div>--}}
                                                </div>
                                                <script>
                                                    function submitForm3(itemId, method) {
                                                        var form = $('#form3' + itemId);
                                                        // إضافة حقل إخفاء لتحديد الطريقة (phone أو email)
                                                        $('<input>').attr({
                                                            type: 'hidden',
                                                            name: 'submit_active_method',
                                                            value: method
                                                        }).appendTo(form);
                                                        // إرسال النموذج
                                                        form.submit();
                                                    }
                                                </script>
                                            </td>
{{--                                            <td>@include('.forms.inputChekBox', ['label' => '','form'=>'form'.$item->id,'checkboxLabel'=>'', 'name' => 'book_is_approval','content'=>$item])</td>--}}
                                            {{--@push('scripts')
                                                <script>
                                                    $(document).ready(function() {
                                                        $('.smuntform{{$item->id}}').click(function() {
                                                            var checkbox = $(this).find('input[name="book_is_approval"]');
                                                             // checkbox.prop('checked', !checkbox.prop('checked'));
                                                            $('#form{{$item->id}}').submit();
                                                        });
                                                    });
                                                </script>

                                            @endpush--}}
                                            <td class="text-center">
                                                <form style="display: contents" action="{{ url('book_permits', [$item->id]) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button onclick="return confirm('هل انته متاكد من الحذف ?')" type="submit" class="btn btn-sm btn-icon btn-rounded btn-danger" data-check-delete="true"><i class="fa fa-times-circle"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                        <tr class="details">
                                        <?php
                                                        if(!($item->book_is_use==1||$item->Book_end<now()))
                                                        {?>
                                            <td colspan="6">

                                                <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
                                                    <div class="panel-body">


                                                        <form id="form{{$item->id}}" action="{{url('book_permits', [$item->id])}}" method="post"  enctype="multipart/form-data">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            {{ csrf_field() }}
                                                            @include('.forms.inputDate', ['label' => 'تاريخ ووقت البداية', 'name' => 'Book_start','content'=>$item])
                                                            @include('.forms.inputDate', ['label' => 'تاريخ ووقت النهاية', 'name' => 'Book_end','content'=>$item])
                                                            @include('.forms.select', ['label' => 'تجديد التصريح', 'name' => 'book_is_Renewed','disName'=>'value', 'options' => book_permit::bookIsRenewedOptions(),'content'=>$item])
                                                            <div class="row">
                                                                <div class="col-md-6  text-center">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="col-md-12 btn btn-danger">
                                                                            تحديث
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </table>
                                            </td>
                                            <?php } ?>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    function toggleDetails(icon) {
                                        var detailsRow = icon.closest('tr').nextElementSibling;
                                        detailsRow.classList.toggle('details');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables/dataTables.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables/dataTables.tableTools.css') }}">
    <style>
        .details {
            display: none;
        }
    </style>
@endsection

@section('custom-scripts')

   {{-- <script>
        $(document).ready(function() {
            console.log("any");
            $('.switch-toggle').click(function() {
                var checkbox = $(this).find('input[name="book_is_approval"]');

                // Toggle the checkbox state
                checkbox.prop('checked', !checkbox.prop('checked'));

                var selectedValue = checkbox.val();
                $('<input>').attr({
                    type: 'hidden',
                    name: 'selected_value',
                    value: selectedValue
                }).appendTo('form');

                // إرسال النموذج
                $('form').submit();
            });
        });
    </script>--}}


    <script src="{{ url('assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables/dataTables.tableTools.js') }}"></script>
{{--    <script src="{{ url('assets/plugins/datatables/table.editable.html') }}"></script>--}}
    {{--    <script src="{{ url('assets/js/table_dynamic.js') }}"></script>--}}


   <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

   <script>
       document.getElementById('export-btn').addEventListener('click', function () {
           // احصل على جدول البيانات
           var table = document.getElementById('table2');

           // استخدم مكتبة xlsx لتحويل الجدول إلى ملف Excel
           var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
           var wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });

           // حفظ الملف
           saveAs(new Blob([s2ab(wbout)], { type: 'application/octet-stream' }), 'book_permits.xlsx');
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
