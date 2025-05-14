<!DOCTYPE html>
 <html class="no-js sidebar-large"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
{{--    &lt;!&ndash; BEGIN META SECTION &ndash;&gt;--}}
    <meta charset="utf-8">
    <title>SmartBooking2025</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />


    <link href="{{ url('assets/css/icons/icons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/plugins.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/css/style.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/css/NewStyle.css') }}" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="/assets/css/favicon.ico" />
  <link rel="icon" href="{{ url('assets/css/favicon.ico') }}">
  
  <link href="{{ url('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
  <link href="{{ url('assets/plugins/metrojs/metrojs.css') }}" rel="stylesheet">
  
  <script src="{{ url('assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
  
  <link href="{{ url('assets/css/app.css') }}" rel="stylesheet">


<style>
    :root {
    /* الألوان الأساسية */
    --primary-color: #00685E;    /* RGB: (0, 104, 94) */
    --secondary-color: #8BAA99;  /* RGB: (139, 170, 153) */
    --dark-color: #101820;       /* RGB: (16, 24, 32) */

    /* الألوان الفرعية */
    --accent-color-1: #F2C75C;   /* RGB: (242, 199, 92) */
    --accent-color-2: #E59256;   /* RGB: (229, 146, 86) */
    --accent-color-3: #A13525;   /* RGB: (161, 53, 37) */
    --accent-color-4: #006797;   /* RGB: (0, 103, 151) */
    --accent-color-5: #00A399;   /* RGB: (0, 163, 153) */
    --accent-color-6: #B98346;   /* RGB: (185, 131, 70) */
}
body{
    background-color: #fff;
}
#main-content {
    background-color: #fff;
}

.container-fluid {
    background: var(--primary-color);
}
.bg-red {
    background-color: var(--primary-color) !important;
}
#sidebar {
    background-color: var(--primary-color);
}
.sidebar-nav li.current a {
    background-color:var(--primary-color);
    
}
#sidebar ul.submenu a {
    background-color: var(--secondary-color);
    color: var(--dark-color);
    
}
.navbar-header{

    width: fit-content;
}
.sidebar-thin #sidebar ul.submenu a {
    background-color: var(--secondary-color);
    color:var(--dark-color);
}
.footer-widget {
    background-color: var(--primary-color);
    color: var(--dark-color);
 
}
:before {
    color: white;
}
.btn-group.pull-right .dropdown-toggle {
    background-color: var(--accent-color-2); /* لون الزر */
    color: white; /* لون النص */
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px; /* لجعل الزر ذو حواف مدورة */
    transition: background-color 0.3s; /* تأثير عند التمرير */
}

.button:hover {
    background-color: var(--accent-color-1); /* تغيير اللون عند التمرير */
}
    @media (min-width: 480px) {
    .navbar > .container .navbar-brand, .navbar > .container-fluid .navbar-brand {
        margin-left: 52px;
    }
}

.btn-danger,.btn-dark {
    background-color: var(--secondary-color);
    border-radius: 0;
}
.btn-danger:hover ,.btn-dark:hover{
    background-color: var(--accent-color-4);
}
.custom-btn {
    border-radius: 15px;
    border: 2px solid #1d563e;
    background-color: white;
    color: var(--accent-color-4);
    display: flex;
    align-items: center;
    justify-content: center;
}
.custom-btn:hover {
    background-color: #1d563e;
    color: white;
    font-weight: bold;
    border-color:var(--accent-color-1);
}
.custom-btn:hover i::before {
    background-color: #1d563e;
    color: white;
    font-weight: bold;
    border-color:var(--accent-color-1);
}
.custom-btn i::before {
    color: var(--primary-color);
    font-weight: bold;
}
.btn.btn-lg {
    padding: 12px 48px;
    font-weight: bold;
}
.btn-group.pull-right .dropdown-toggle:hover {
    background-color: var(--primary-color);
}
.dropdown-menu.pull-right {
    border-radius: 1px;
    border: 2px solid var(--accent-color-5);
    margin-right: -53px;
}
a{
    color: #ffffff;
}
.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    color: #fff;
    background-color: var(--secondary-color);
}
.btn-dark:hover, .btn-dark:focus, .btn-dark:active, .btn-dark.active, .open .dropdown-toggle.btn-dark {
        color: #fff;
        background-color: white;
        border-color: var(--primary-color);
    }
.navbar-collapse .collapse{
    background-color: var(--secondary-color);

}
.navbar-inverse {
    background-color: var(--secondary-color);
}

.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
        color: #fff;
        background-color: var(--secondary-color);
    }
    .sidebar-medium #sidebar ul.submenu a {
        background-color: var(--secondary-color);
        
    }
    #scheduleTable tbody tr:first-child {
    background-color: var(--accent-color-6);
    color: #ffffff;
}
.btn-dark:hover, .btn-dark:focus, .btn-dark:active, .btn-dark.active, .open .dropdown-toggle.btn-dark {
    color: #fff;
    background-color: #006a60;
    border-color: var(--primary-color);
}
.btn-danger:hover, .btn-dark:hover {
    background-color: var(--primary-color);
}

/* 
1-style top header
*/ 
.container-fluid {
    background: #ffffff;
    border-bottom: 1px solid;
    border-top: 1px solid;
}
.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a {
    color:  #100808;
    background-color: while;
}
.sidebar-toggle {
    float: left;
    border-left: 0px solid #27292d;
}
 
.fa-angle-down:before  ,.fa-user:before ,.fa-dedent:before, .fa-outdent:before {
    color: #00685e;
}
.container-fluid {
    padding-right: 249px;
    }
.mCS_destroyed{
    padding-right: 0px;
}
.mCustomScrollbar ._mCS_4{

}
.sidebar-large #sidebar {

}

</style>
    @yield('custom-css')

    @stack('styles')
</head>
<body data-page="tables_dynamic" dir="rtl" bgcolor="ddddd" >
 
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style=" background-color:#e3f2fd;box-shadow: -5px 0rem 9px rgb(0 104 94);">
        <div class="container-fluid">
            <div  class="navbar navbar-light navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="menu-medium" class="sidebar-toggle tooltips">
                <i class="fa fa-outdent" style="font-size: 21px;"></i>
    
                </a>
                

            </div>
            <div class="navbar-center">@yield('title', '')</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">

                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-solid fa-user"></i>
                            <span class="username" style="color: black;">المستخدم</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('change_password') }}">
                                    <i class="glyph-icon flaticon-account"></i> تغيير كلمه المرور  
                                </a>
                            </li>


                            <li class="dropdown-footer clearfix">
                                <a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
                                    <i class="glyph-icon flaticon-fullscreen3"></i>
                                </a>
                                <a href="{{ route('logout') }}" title="Lock Screen">
                                    <i class="glyph-icon flaticon-padlock23"></i>
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="تسجيل خروج">
                                    <i class="fa fa-power-off"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->

                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </nav>

    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
 
<nav id="sidebar">
    <div id="main-menu">
        <ul class="sidebar-nav">
        <li style="height: 30px;">
                <a class="navbar-brand" href="{{ URL::to('/') }}">
                    <img src="{{ url('assets/img/logo2.svg') }}" alt="logo" width="250" height="46">
                </a>
            </li><br><br><br>
                    <li class="current active hasSub">
                    <a href="{{ URL::to('/') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="sidebar-text">لوحة التحكم</span>
                        </a>
                    </li>
                    @if(auth()->user()->type=="temp"&& auth()->user()->id=="1")
                    <li>
                        <a href="#"><i class="fa fa-user"></i><span class="sidebar-text">العملاء</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li><a href="{{ route('customers.index') }}"><span class="sidebar-text"><i class=" fa fa-calendar"></i>بيانات العملاء</span></a></li>
                            <li><a href="{{ route('licenses.index') }}"><span class="sidebar-text"><i class="fa fa-check-square"></i>تراخيص العملاء</span></a></li>
                        </ul>
                    </li>
                     
                    @endif
                <li>
                        <a href="#"><i class="fa fa-cogs"></i><span class="sidebar-text">الاعدادات</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="{{ route('country.index') }}"><span class="sidebar-text"><i class="fa fa-globe"></i>الدول</span></a>
                            </li>
                            <li>
                                <a href="{{ route('city.index') }}"><span class="sidebar-text"><i class="fa fa-flag-o"></i>المدن</span></a>
                            </li>
                            <li>
                                <a href="{{ route('districts.index') }}"><span class="sidebar-text"><i class="fa fa-map-marker"></i>الاحياء</span></a>
                            </li>
                            <li>
                                <a href="{{ route('buildings.index') }}"><span class="sidebar-text"><i class="fa fa-home"></i>المباني</span></a>
                            </li>
                            <li>
                                <a href="{{ route('departments.index') }}"><span class="sidebar-text"><i class="fa fa-gears"></i>الادارات</span></a>
                            </li>
                            <li>
                                <a href="{{ route('specifications.index') }}"><span class="sidebar-text"><i class="fa fa-leaf"></i> الموصفات</span></a>
                            </li>
                            <li>
                                <a href="{{ route('notifications.index') }}"><span class="sidebar-text"><i class="fa fa-external-link-square"></i>الاشعارات</span></a>
                            </li>
                            <li>
                                <a href="{{ route('sys_days.index') }}"><span class="sidebar-text"><i class="fa fa-dashboard"></i>الايام</span></a>
                            </li>
                            <li>
                                <a href="{{ route('booking_types.index') }}"><span class="sidebar-text"><i class="fa fa-exchange"></i>انواع الحجز</span></a>
                            </li>
                            <li>
                                <a href="{{ route('sys_settings.index') }}"><span class="sidebar-text"><i class="fa fa-calendar"></i>تسجيل الايام مع المواعيد</span></a>
                            </li>

                        </ul>
                </li>
                    <li>
                        <a href="#"><i class="fa fa-group"></i><span class="sidebar-text">المستخدمين</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li><a href="{{ route('users.index') }}"><span class="sidebar-text"><i class="fa fa-folder-open"></i>بيانات المستخدمين</span></a></li>
                            <li><a href="{{ route('user_type.index') }}"><span class="sidebar-text"><i class="fa fa-leaf"></i>انواع المستخدمين</span></a></li>
                            <li><a href="{{ route('sys_role.index') }}"><span class="sidebar-text"><i class="fa fa-key"></i>الادوار</span></a></li>
                            <li><a href="{{ url('/user_permission') }}"><span class="sidebar-text"><i class="fa fa-filter"></i>الصلاحيات</span></a></li>
                            <li><a href="{{ route('role_w_permission.index') }}"><span class="sidebar-text"><i class="fa fa-exclamation-triangle"></i>منح الصلاحيات</span></a></li>
                            <li><a href="{{ url('change_password') }}"><span class="sidebar-text"><i class="fa fa-exclamation-triangle"></i>تغيير كلمة المرور </span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i><span class="sidebar-text">القاعات -الحجوزات</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="{{ route('halls.index') }}"><span class="sidebar-text"><i class="fa fa-crosshairs"></i> بيانات القاعات</span></a>
                            </li>
                            <li>
                                <a href="{{ route('hall_specs.index') }}"><span class="sidebar-text"><i class="fa fa-edit"></i>مواصفات القاعات </span></a>
                            </li>
                            <li>
                                <a href="{{ route('bookings.create') }}"><span class="sidebar-text"><i class="fa fa-cloud-download"></i> حجز القاعات</span></a>
                            </li>
                            <li>
                                <a href="{{ route('bookings.index') }}"><span class="sidebar-text"><i class="fa fa-folder-open-o"></i>   موافقات حجز القاعات والالغاء<i class="fa fa-"></i></span></a>
                            </li>
                            <li>
                                <a href="{{ route('usage_policies.index') }}"><span class="sidebar-text"><i class="fa fa-picture-o"></i>  سياسة استخدام القاعات</span></a>
                            </li>
                        </ul>
                    </li>
{{--                    اخفاء قسم لتصاريح--}}
                    <li>
                       
                                <li>
                                    <a href="{{ url('/errors') }}"><span class="sidebar-text"><i class="fa fa-download"></i>سجلات الاخطاء</span></a>
                                </li>
                                     </li> 

               {{--     <li>
                        <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Account</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="sidebar-text">تسجيل خروج</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                            <li>
                                <a href="password_forgot.html"><span class="sidebar-text">Password recover</span></a>
                            </li>
                            <li>
                                <a href="lockscreen.html"><span class="sidebar-text">Lockscreen</span></a>
                            </li>

                        </ul>
                    </li>--}}


                </ul>
            </div>
            <div class="footer-widget">

                <div class="sidebar-footer clearfix">
                    <a class="pull-left toggle_fullscreen" href="#" rel="tooltip" data-placement="top" data-original-title="Fullscreen"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                    <a class="pull-left" href="{{ route('logout') }}" rel="tooltip" data-placement="top" data-original-title="Lockscreen"><i class="glyph-icon flaticon-padlock23"></i></a>
                    <a class="pull-left" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="tooltip" data-placement="top" data-original-title="تسجيل الخروج"><i class="fa fa-power-off"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

{{--        ديزاين افقي --}}
        {{--<nav class="navbar navbar-expand-lg navbar-light bg-light ml-auto">
--}}{{--            <a class="navbar-brand" href="#">Brand</a>--}}{{--
           --}}{{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>--}}{{--
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav float-right ">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://afaq-groups.com/"><i class="fa fa-dashboard"></i> لوحة التحكم <span class="sr-only">(current)</span></a>
                    </li>

                    @if(auth()->user()->type=="admin")
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="customersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> العملاء
                            </a>
                            <div class="dropdown-menu" aria-labelledby="customersDropdown">
                                <a class="dropdown-item" href="{{ route('customers.index') }}"><i class="fa fa-calendar"></i> بيانات العملاء</a>
                                <a class="dropdown-item" href="{{ route('licenses.index') }}"><i class="fa fa-check-square"></i> تراخيص العملاء</a>
                            </div>
                        </li>

                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cogs"></i> الاعدادات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="settingsDropdown">
                            <a class="dropdown-item" href="{{ route('country.index') }}"><i class="fa fa-globe"></i> الدول</a>
                            <a class="dropdown-item" href="{{ route('city.index') }}"><i class="fa fa-flag-o"></i> المدن</a>
                            <a class="dropdown-item" href="{{ route('districts.index') }}"><i class="fa fa-map-marker"></i> الاحياء</a>
                            <a class="dropdown-item" href="{{ route('buildings.index') }}"><i class="fa fa-home"></i> المباني</a>
                            <a class="dropdown-item" href="{{ route('departments.index') }}"><i class="fa fa-gears"></i> الادارات</a>
                            <a class="dropdown-item" href="{{ route('specifications.index') }}"><i class="fa fa-leaf"></i> الموصفات</a>
                            <a class="dropdown-item" href="{{ route('notifications.index') }}"><i class="fa fa-external-link-square"></i> الاشعارات</a>
                            <a class="dropdown-item" href="{{ route('sys_days.index') }}"><i class="fa fa-dashboard"></i> الايام</a>
                            <a class="dropdown-item" href="{{ route('booking_types.index') }}"><i class="fa fa-exchange"></i> انواع الحجز</a>
                            <a class="dropdown-item" href="{{ route('sys_settings.index') }}"><i class="fa fa-calendar"></i> تسجيل الايام مع المواعيد</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-group"></i> المستخدمين
                        </a>
                        <div class="dropdown-menu" aria-labelledby="usersDropdown">
                            <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fa fa-folder-open"></i> بيانات المستخدمين</a>
                            <a class="dropdown-item" href="{{ route('user_type.index') }}"><i class="fa fa-leaf"></i> انواع المستخدمين</a>
                            <a class="dropdown-item" href="{{ route('sys_role.index') }}"><i class="fa fa-key"></i> الادوار</a>
                            <a class="dropdown-item" href="{{ url('/user_permission') }}"><i class="fa fa-filter"></i> الصلاحيات</a>
                            <a class="dropdown-item" href="{{ route('role_w_permission.index') }}"><i class="fa fa-exclamation-triangle"></i> منح الصلاحيات</a>
                            <a class="dropdown-item" href="{{ url('change_password') }}"><i class="fa fa-exclamation-triangle"></i> تغيير كلمة المرور </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="hallsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-desktop"></i> القاعات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="hallsDropdown">
                            <a class="dropdown-item" href="{{ route('halls.index') }}"><i class="fa fa-crosshairs"></i> بيانات القاعات</a>
                            <a class="dropdown-item" href="{{ route('hall_specs.index') }}"><i class="fa fa-edit"></i> موصافات القاعات</a>
                            <a class="dropdown-item" href="{{ route('bookings.create') }}"><i class="fa fa-cloud-download"></i> حجز القاعات</a>
                            <a class="dropdown-item" href="{{ route('bookings.index') }}"><i class="fa fa-folder-open-o"></i> موافقات حجز القاعات والالغاء</a>
                            <a class="dropdown-item" href="{{ route('usage_policies.index') }}"><i class="fa fa-picture-o"></i> سياسة استخدام القاعات</a>
                        </div>
                    </li>

                  --}}{{--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="permitsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-puzzle-piece"></i> التصاريح
                        </a>
                        <div class="dropdown-menu" aria-labelledby="permitsDropdown">
                            <a class="dropdown-item" href="{{ route('book_permits.create') }}"><i class="fa fa-download"></i> اضافة التصاريح</a>
                            <a class="dropdown-item" href="{{ route('book_permits.index') }}"><i class="fa fa-thumbs-o-up"></i> الموافقة والرفض علي التصاريح</a>
                            <a class="dropdown-item" href="{{ route('permits_types.index') }}"><i class="fa fa-sitemap"></i> انواع التصاريح</a>
                            <a class="dropdown-item" href="{{url('book_permits/inquery')}}"><i class="fa fa-refresh"></i> استعلام تصريح</a>
                        </div>
                    </li>--}}{{--
                </ul>
            </div>
        </nav>--}}

        <!-- END MAIN SIDEBAR -->
        @yield('content')
    </div>
    <br>
    <br>
    <br>
    <div class="footer footer-widget " style="">
        <div class="  text-center">
            <p><b><font color=white size="+1">Smart Booking 2025</font><b></p>
        </div>
    </div>
    <!-- END CHAT MENU -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="{{ url('assets/plugins/jquery-1.11.js') }}"></script>
    <script src="{{ url('assets/plugins/jquery-migrate-1.2.1.js') }}"></script>
    <script src="{{ url('assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ url('assets/plugins/icheck/icheck.js') }}"></script>
    <script src="{{ url('assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ url('assets/plugins/mmenu/js/jquery.mmenu.min.all.js') }}"></script>
    <script src="{{ url('assets/plugins/nprogress/nprogress.js') }}"></script>
    <script src="{{ url('assets/plugins/charts-sparkline/sparkline.min.js') }}"></script>
    <script src="{{ url('assets/plugins/breakpoints/breakpoints.js') }}"></script>
    <script src="{{ url('assets/plugins/numerator/jquery-numerator.js') }}"></script>

{{--    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>--}}

    <!-- END MANDATORY SCRIPTS -->
    <script>
        if ($(".navbar-toggle").hasClass("mCS_destroyed")) {
            alert("aa");
            $(".navbar-toggle").click(); // استدعاء حدث النقر لإغلاق القائمة
        }
   
    </script>
    @stack('scripts')
    @yield('custom-scripts')

    <script src="{{ url('assets/js/application.js') }}"></script>
</body>
