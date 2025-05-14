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


    </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
    @foreach($content as $item)
        <tr class="gradeA odd">
            <td class="center ">
            </td>
            <td class=" sorting_1">{{ $item->bookPermitTypeid ? $item->bookPermitTypeid->Perm_name_ar : null }}</td>
            <td class=" ">{{  $item->bookVisitorUserid ? $item->bookVisitorUserid->name : null  }}</td>
            <td class=" ">{{ $item->book_permit_code }}</td>
            <td class="center ">{{ $item->Book_end }}</td>
            <td class="center ">{{ $item->bookDept ? $item->bookDept->dept_name_ar : null }}</td>
            <td class="text-center">
                <form id="form1{{$item->id}}" action="{{url('book_permits', [$item->id])}}" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                </form>
                <div class="form-group">
                    <select  name="book_is_approval" class="form-control">
                        <option value="3"  style="color: #212020">لم يحدد</option>
                        <option value="1" @if($item->book_is_approval==1)selected @endif style="color: #212020">مقبول</option>
                        <option value="0" @if($item->book_is_approval==0)selected @endif style="color: #212020">مرفوض</option>
                    </select >
                </div>

            </td>
            <td class="text-center">
                <form id="form2{{$item->id}}" action="{{url('book_permits', [$item->id])}}" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                </form>
                <div class="form-group">
                    <select form="form2{{$item->id}}" name="book_is_Confirmed" class="form-control">
                        <option value="1" @if($item->book_is_Confirmed==1)selected @endif style="color: #212020">مؤكد</option>
                        <option value="0" @if($item->book_is_Confirmed==0)selected @endif style="color: #212020">غير مؤكد </option>
                    </select >
                </div>

            </td>





        </tr>

    @endforeach
    </tbody>
</table>

