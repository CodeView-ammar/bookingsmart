@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-red">
                        <h3 class="panel-title"><strong>مشاهدة  حجز</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('bookings', [$content->id])}}" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
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
                                                <button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>تفاصيل</strong> الحجز</h4>
                                            </div>
                                            <div class="modal-body h3">
                                                <li class="">
                                                    <span class="badge bg-primary rounded-pill">منسق الحجز</span>
                                                    {{ $content->bookingCoordinator->name  }}
                                                </li>
                                                <li class="">
                                                    <span class="badge bg-primary rounded-pill">تم تأكيد الحجز</span>
                                                    {{ $content->booking_is_confirmed ? 'Yes' : 'No' }}
                                                </li>
                                                <li class="">
                                                    <span class="badge bg-primary rounded-pill">تمت الموافقة على الحجز</span>
                                                    {{ $content->bookingIsApprovValue()==null?"No":$content->bookingIsApprovValue() }}
                                                </li>
                                                <li class="">
                                                    <span class="badge bg-primary rounded-pill">تاريخ الموافقة على الحجز</span>
                                                    {{ $content->booking_Approv_datetime }}
                                                </li>
                                                <li class="">
                                                    <span class="badge bg-primary rounded-pill">تم ارسال الاشعار</span>
                                                    {{ $content->bookingIssendNoticeValue()==null?"No":$content->bookingIssendNoticeValue() }}
                                                </li>
                                                <li class="">
                                                    <span class="badge bg-primary rounded-pill">الحجز نشط</span>
                                                    {{ $content->booking_isactive ? 'Yes' : 'No' }}
                                                </li>

                                                <div class="clear-fix"></div>
                                                <br>
                                                <h2>توقيتات الحجز</h2>
                                                <table class="table table-striped table-hover dataTable" id="table-editable" aria-describedby="table-editable_info">
                                                    <tbody>
                                                    <tr id="usersContainer">
                                                        <td>م</td>
                                                        <td>ساعة  الحجز</td>
                                                        <td>التاريخ</td>
                                                    </tr>
                                                    @foreach($content->bookingHours  as $key=>$hour)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $hour->booking_start->format('h A') }}</td>
                                                            <td>{{ $hour->booking_end->format('d/m/Y') }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <table class="table table-striped table-hover dataTable" id="table-editable" aria-describedby="table-editable_info">
                                                <div class="clear-fix"></div>
                                                    <br>
                                                    <h2> المستخدمين المسجلين</h2>
                                                        <tbody>
                                                        <tr id="usersContainer">
                                                            <td>م</td>
                                                            <td>العنوان</td>
                                                            <td>الاسم</td>
                                                            <td>البريد</td>
                                                            <td>الهاتف</td>
                                                        </tr>
                                                        @foreach($content->hallUsers  as $key=>$user)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $user->hall_user_title }}</td>
                                                                <td>{{ $user->hall_user_name }}</td>
                                                                <td>{{ $user->hall_user_email }}</td>
                                                                <td>{{ $user->hall_user_Mobile }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                <table class="table table-striped table-hover dataTable" id="table-editable" aria-describedby="table-editable_info">
                                                    <div class="clear-fix"></div>
                                                    <br>
                                                    <h2> المميزات لااضافية</h2>
                                                    <tbody>
                                                    <tr id="usersContainer">
                                                        <td>م</td>
                                                        <td>اسم الميزة </td>
                                                        <td>العدد</td>
                                                    </tr>
                                                    @foreach($content->hallSpecialSpecs  as $key=>$spec)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $spec->specialSpecs->specs_name_ar }}</td>
                                                            <td>{{ $spec->Special_want_no }}</td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                    <div class="clear-fix"></div>
                                                <!-- زر إضافة مستخدم -->
{{--                                                <button type="button" onclick="addUserField()" class="btn btn-dark">إضافة مستخدم</button>--}}

                                                <table class="table table-striped table-hover dataTable" id="table-editable" aria-describedby="table-editable_info">
                                                    <tbody>
                                                    <tr id="specContainer">

                                                    </tr>
                                                    </tbody>
                                                </table>
{{--                                                <button type="button" onclick="addSpecField()" class="btn btn-dark">إضافة مميزات خاصة</button>--}}
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('bookings.index') }}" type="button" class="btn btn-default close-modal" data-dismiss="modal">رجوع الي شاشة الموافقات</a>
                                                <a href="{{ URL::to('halls/booking/' . $content->booking_hall_code . '') }}" type="button"  class="btn btn-success save-event">رجوع الي عرض حجوزات القاعه</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <section class="content py-5">
                                    <div class="card ">
                                        <ul class="">



















                                        </ul>
                                    </div>
                                </section>

                            </div>
                           <div class="row">
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <button type="submit" class="col-md-12 btn btn-success btn-rounded">
                                            تحديث
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6  text-center">
                                    <div class="form-group">
                                        <a href="{{ route('bookings.index') }}" class="col-md-12 btn btn-danger btn-rounded">الغاء</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
