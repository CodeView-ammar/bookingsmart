@extends('layouts.admin')

@section('content')

    <div id="main-content" class="dashboard"  >

        <div class="row m-t-20">
            <div class="col-md-4 m-t-20">
                <a href="{{ route('halls.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <!-- العمود الثاني: العنوان -->
                        <div class="col-xs-10" style="width: 80%;margin-top: 1rem;">
                            <span class="mt-3">القاعات المدرجة</span>
                        </div>
                        <!-- العمود الأول: الأيقونة والعدد -->
                        <div class="col-xs-2" style="width: 20%;text-align: right">
                            <div>
                                <i class="fa fa-desktop mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ hall::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-4 m-t-20">
                <a href="{{ route('booking_types.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">انواع الحجز</span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-sitemap mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ booking_type::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 m-t-20">
                <a href="{{ route('bookings.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">موافقات حجز القاعات</span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-cogs mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ booking::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 m-t-20">
                <a href="{{ URL::to('users') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">المستخدين</span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-group mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ user::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 m-t-20">
                <a href="{{ route('role_w_permission.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">منح الصلاحيات</span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-user mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ role_w_permission::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-md-4 m-t-20">
                <a href="{{ route('country.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">الدول المدرجة     </span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-globe mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ country::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-md-4 m-t-20">
                <a href="{{ route('country.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">المدن المدرجه    </span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-spinner"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ country::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-md-4 m-t-20">
                <a href="{{ route('districts.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">الاحياء المدرجة </span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-map-marker mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ district::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
			
			
			 <div class="col-md-4 m-t-20">
                <a href="{{ route('buildings.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">المباني المدرجه    </span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-home fa-fw" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ building::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
			
			
			
			
			 <div class="col-md-4 m-t-20">
                <a href="{{ route('departments.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">الادرات المدرجه   </span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-book fa-fw" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ department::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


          <div class="col-md-4 m-t-20">
                <a href="{{ route('specifications.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">المواصفات المدرجه    </span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{specification::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-md-4 m-t-20">
                <a href="{{ route('usage_policies.index') }}" class="btn btn-lg btn-block custom-btn d-flex flex-column align-items-center justify-content-center text-right">
                    <div class="d-flex w-100">
                        <div class="col-xs-10" style="width: 80%; margin-top: 1rem;">
                            <span class="mt-3">سياسة استخدام القاعات</span>
                        </div>
                        <div class="col-xs-2" style="width: 20%; text-align: right;">
                            <div>
                                <i class="fa fa-picture-o mb-2"></i>
                            </div>
                            <div>
                                <span class="badge custom-badge">{{ usage_policies::count() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>

@endsection


@push('scripts')

@endpush
