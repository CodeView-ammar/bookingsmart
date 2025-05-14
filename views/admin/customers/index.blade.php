@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>شاشة </strong> العملاء</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <div class="btn-group">
                                    <a href="{{url('customers/create')}}"  class="btn btn-danger">
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
                                            <div class='text-center'>العملاء</div>
                                                 <table class='table table-striped table-hover dataTable' id='table-editable'>
                                                     <thead>
                                                         <tr role='row'>
                                                             <th>م</th>
                                                             <th>اسم العميل باللغه العربية </th>
                                                             <th>اسم العميل باللغه الانجليزيه</th>
                                                             <th>تاريخ الانشاء</th>
                                                             <th>كود العميل</th>
                                                             <th>البريد الالكتروني</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>";
                                             foreach($content as $key=>$item) {
                                                 $print .= "
                                                     <tr>
                                                         <td width='35'>". $key+1 ."</td>
                                                         <td>". $item->cust_name_ar ."</td>
                                                         <td>". $item->cust_name_en ."</td>
                                                         <td>". $item->created_at  ."</td>
                                                         <td>". $item->cust_code ."</td>
                                                         <td>". $item->cust_email ."</td>
                                                     </tr>";
                                             }

                                             $print .= "
                                                     </tbody>
                                                 </table>";
                                        @endphp
                                        <li><a id="" href="{{ url('pdf') }}?print={{ urlencode($print) }}&name=العملاء.pdf">احفظ كملف pdf</a></li>

                                        </li>
                                        <li><a id="export-btn" href="#">استخراج شيت اكسيل</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
                                @if($content->count())
                                    <table class="table table-striped table-hover dataTable" id="table-editable" border=0>
                                        <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th >اسم العميل باللغه العربية </th>
                                            <th >اسم العميل باللغه الانجليزيه </th>
                                            <th>تاريخ الانشاء</th>
                                            <th>كود العميل</th>
                                            <th> البريد الالكتروني</th>
                                            <th>حاله الحساب</th>
                                            <th> تاريخ انتهاء الترخيص</th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $item)
                                        <tr>
                                            <td width="35"><b>{{ $item->id }}</td>
                                            <td><b>{{ $item->cust_name_ar }}</td>
                                            <td><b>{{ $item->cust_name_en }}</td>
                                            <td><b>{{ $item->created_at }}</td>
                                            <td><b>{{ $item->cust_code }}</td>
                                            <td><b>{{ $item->cust_email }}</td>
                                            <td><b>{{ $item->cust_isactive==1?"مفعل":"غير مفعل" }}</td>
                                            <td><b>
                                            <?php
                                            $data=App\Models\Licenses::where("Lic_cust_code",$item->cust_code)->where("Lic_isactive",1)->first();
                                            if($data)
                                            {
                                                echo $data["Lic_end_at"];
                                            }
                                            else
                                            {
                                                echo "لا يوجد ترخيص مفعل";
                                            }

                                            ?>
                                            </td>


                                            <td class="text-center">
                                                <a class="edit btn btn-dark" style="color:white" href="{{ URL::to('customers/' . $item->id . '/edit') }}">
                                                    <i class="fa fa-pencil-square-o"></i>تعديل</a>
                                               {{-- <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-times-circle"></i>
                                                    Remove
                                                </a>--}}
                                                <form style="display: contents" action="{{ url('customers', [$item->id]) }}" method="POST">
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

