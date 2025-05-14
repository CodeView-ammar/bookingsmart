@extends('layouts.admin')

@section('content')
    <section class="content py-4  ">
        <nav aria-label="breadcrumb  hidden-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('book_permits.index') }}">التصاريح</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل التصريح</li>
                <a class="btn btn-default" id="printButton" title="View print view" onclick="printContent()"><span>طباعة</span></a>

            </ol>
        </nav>
        <?php if(!isset($not_approve)&&!isset($not_found)){?>
        <div class="container ">
            <div class="row">
                <div class="col-xs-4">
                    <li class="list-group-item">
                        <span class="badge bg-primary rounded-pill">تاريخ الموافقة على التصريح</span>
                        {{ $content->book_approval_datetime }}
                    </li>
                </div>
                <div class="col-xs-4 text-center" >
                    @php
                        $qrCodeContent = "
                            نوع التصريح: " . ($content->bookPermitTypeid ? $content->bookPermitTypeid->Perm_name_ar : null) . "
                            تاريخ البداية: " . $content->Book_start . "
                            الإدارة: " . ($content->bookDept ? $content->bookDept->dept_name_ar : null) . "
                            نهاية التصريح: " . $content->Book_end . "
                            كود التصريح: " . $content->book_permit_code . "
                            المستخدم صاحب التصريح: " . ($content->bookVisitorUserid ? $content->bookVisitorUserid->name : null) . "
                            استخدام التصريح: " . $content->bookIsUseValue() . "
                            الموافقة على التصريح: " . $content->bookIsApprovalValue() . "
                            تأكيد التصريح: " . ($content->book_is_Confirmed ? 'Yes' : 'No') . "
                            التصريح متجدد: " . $content->bookIsRenewedValue();
                    @endphp
{{--                    {!! QrCode::size(200)->encoding('UTF-8')->generate($qrCodeContent) !!}--}}
                    {!!  \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->encoding('UTF-8')->generate($qrCodeContent) !!}

                </div>
                <div class="col-xs-4">
                    <li class="list-group-item">
                        <span class="badge bg-primary rounded-pill">بداية التصريح</span>
                        <span>{{ $content->Book_start }}</span>
                    </li>
                    <li class="list-group-item">
                    <div style="display:flex;flex-direction:row;gap:10px;">
                        <span class="badge bg-primary rounded-pill">نهاية التصريح</span>
                        <span>{{ $content->Book_end }}</span>
                    </div>
                    </li>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <li class="list-group-item text-center">
                    <div style="display:flex;flex-direction:row;gap:10px;">

</div>
                    </li>
                </div>
            </div>

<div class="text-center">{{ $content->book_permit_code }}</div>
            <ul class="list-group list-group-flush hidden-print">

              {{--
                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">نوع التصريح</span>
                    <span>{{ $content->bookPermitTypeid ? $content->bookPermitTypeid->Perm_name_ar : null }}</span>
</div>
                </li>





                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">الادارة</span>
                    <span>{{ $content->bookDept ? $content->bookDept->dept_name_ar : null }}</span>
</div>
                </li>





                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">كود التصريح</span>
                    <span>{{ $content->book_permit_code }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">المستخدم صاحب التصريح</span>
                    <span> {{ $content->bookVisitorUserid ? $content->bookVisitorUserid->name : null }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">استخدام التصريح</span>
                    <span>{{ $content->bookIsUseValue() }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">الموافقه علي التصريح</span>
                    <span>{{ $content->bookIsApprovalValue() }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">معرف مستخدم الموافقة على التصريح</span>
                    <span>{{ $content->bookApprovalUserid ? $content->bookApprovalUserid->name : null }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">تاريخ الموافقة على التصريح</span>
                    <span>{{ $content->book_approval_datetime }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">تاكيد الحجز</span>
                   <span> {{ $content->book_is_Confirmed ? 'Yes' : 'No' }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">الحجز متجدد</span>
                    <span>{{ $content->bookIsRenewedValue() }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">الحجز نشط</span>
                    <span>{{ $content->book_isactive ? 'Yes' : 'No' }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">ملاحظات التصريح</span>
                   <span> {{ $content->book_notes }}</span>
</div>
                </li>


                <li class="list-group-item">
                <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">احجز بواسطة معرف المستخدم</span>
                    <span>{{ $content->bookByUserid ? $content->bookByUserid->name : null }}</span>
</div>
                </li>
<li class="list-group-item">
                    <div style="display:flex;flex-direction:row;gap:10px;">
                    <span class="badge bg-primary rounded-pill">حجز كود الحجز</span>
<span>{{ $content->book_cust_code }}</span>
                    </div>

                </li>

              --}}

                <li class="list-group-item">
                <div style="display:flex;flex-direction:column;gap:10px;">
{{--                    <span class="badge bg-primary rounded-pill">هوية المستخدم</span>--}}
                    <img src="{{ Storage::url(optional($content->bookVisitorUserid)->user_userid_copy ?? null) }}">
</div>
                </li>
            </ul>
        </div>
        <?php } else if(isset($not_approve)) {?>
            <div class="text-center">
                <h2 class="text-center">لم يتم الموافقة علي التصريح</h2>
            </div>
            <?php } else{?>
                <div class="text-center">
                <h2 class="text-center">    لا يوجد تصريح </h2>
            </div>
                <?php }?>
    </section>
    @stack('scripts')
    <script>

        @if(isset($_GET['action'])&& $_GET['action']=='print')
            window.onload = function() {
                printContent();
            };
        @endif
        function printContent() {
            window.print();
        }
    </script>
@endsection
