
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
{{--    &lt;!&ndash; BEGIN META SECTION &ndash;&gt;--}}
    <meta charset="utf-8">
    <title>Pixit - Responsive Boostrap3 Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
<!--    &lt;!&ndash; END META SECTION &ndash;&gt;
    &lt;!&ndash; BEGIN MANDATORY STYLE &ndash;&gt;
    <link href="http://127.0.0.1:3000/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:3000/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:3000/assets/css/plugins.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:3000/assets/css/style.min.css" rel="stylesheet">

    &lt;!&ndash; END  MANDATORY STYLE &ndash;&gt;
    &lt;!&ndash; BEGIN PAGE LEVEL STYLE &ndash;&gt;
    <link href="http://127.0.0.1:3000/assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="http://127.0.0.1:3000/assets/plugins/metrojs/metrojs.css" rel="stylesheet">
    &lt;!&ndash; END PAGE LEVEL STYLE &ndash;&gt;-->
    <link rel="stylesheet" href="{{ asset('css/app.scss') }}">

    <script src="http://127.0.0.1:3000/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body data-page="dashboard" dir="rtl">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="menu-medium" class="sidebar-toggle tooltips">
                <i class="fa fa-outdent"></i>
            </a>
            <a class="navbar-brand" href="index.html">
                <img src="https://old.mot.gov.sa/_layouts/branding/images/Logo-color.svg" alt="logo" width="79" height="26">
            </a>
        </div>
        <div class="navbar-center">Dashboard</div>
        <div class="navbar-collapse collapse">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav navbar-nav pull-right header-menu">

                <!-- BEGIN USER DROPDOWN -->
                <li class="dropdown" id="user-header">
                    <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img src="assets/img/avatars/avatar2.png" alt="user avatar" width="30" class="p-r-5">
                        <span class="username">محمد مرعى</span>
                        <i class="fa fa-angle-down p-r-10"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="extra_profile.html">
                                <i class="glyph-icon flaticon-account"></i> My Profile
                            </a>
                        </li>


                        <li class="dropdown-footer clearfix">
                            <a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
                                <i class="glyph-icon flaticon-fullscreen3"></i>
                            </a>
                            <a href="lockscreen.html" title="Lock Screen">
                                <i class="glyph-icon flaticon-padlock23"></i>
                            </a>
                            <a href="login.html" title="Logout">
                                <i class="fa fa-power-off"></i>
                            </a>
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
                <li class="current active hasSub">
                    <a href="index.html"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                </li>

                <li >
                    <a href="http://127.0.0.1:3000/languages"><i class="glyph-icon flaticon-ui-elements2">

                        </i><span class="sidebar-text">Languages</span><span class="fa arrow"></span></a>

                </li>


                <li>
                    <a href="#"><i class="fa fa-table"></i><span class="sidebar-text">Tables</span><span class="fa arrow"></span></a>
                    <ul class="submenu collapse">
                        <li>
                            <a href="tables.html"><span class="sidebar-text">Style Tables</span></a>
                        </li>
                        <li>
                            <a href="tables_editable.html"><span class="sidebar-text">Editable Tables</span></a>
                        </li>
                        <li>
                            <a href="tables_dynamic.html"><span class="sidebar-text">Dynamic Tables</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Account</span><span class="fa arrow"></span></a>
                    <ul class="submenu collapse">

                        <li>
                            <a href="login.html"><span class="sidebar-text">Login</span></a>
                        </li>

                        <li>
                            <a href="password_forgot.html"><span class="sidebar-text">Password recover</span></a>
                        </li>
                        <li>
                            <a href="lockscreen.html"><span class="sidebar-text">Lockscreen</span></a>
                        </li>

                    </ul>
                </li>


            </ul>
        </div>
        <div class="footer-widget">
            <img src="assets/img/gradient.png" alt="gradient effet" class="sidebar-gradient-img" />

            <div class="sidebar-footer clearfix">
                <a class="pull-left toggle_fullscreen" href="#" rel="tooltip" data-placement="top" data-original-title="Fullscreen"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                <a class="pull-left" href="lockscreen.html" rel="tooltip" data-placement="top" data-original-title="Lockscreen"><i class="glyph-icon flaticon-padlock23"></i></a>
                <a class="pull-left" href="login.html" rel="tooltip" data-placement="top" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
            </div>
        </div>
    </nav>
    <!-- END MAIN SIDEBAR -->

    <div id="main-content" class="dashboard">
        <div class="row m-t-20">
            <div class="col-md-3 col-sm-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-body bg-blue p-15">
                        <div class="row m-b-10">
                            <div class="col-xs-3">
                                <i class="glyph-icon flaticon-visitors"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="56">
                                    <div>
                                        <small class="stat-title">Visits today</small>
                                        <h1 class="m-0 w-300">25 610</h1>
                                    </div>
                                    <div>
                                        <small class="stat-title">Visits yesterday</small>
                                        <h1 class="m-0 w-300">22 420</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-title">New Visitors</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="30">
                                    <div>
                                        <h3 class="m-0 w-300">37.5%</h3>
                                    </div>
                                    <div>
                                        <h3 class="m-0 w-300">34.2%</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-title">Bounce Rate</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="30">
                                    <div>
                                        <h3 class="m-0 w-500">5.6%</h3>
                                    </div>
                                    <div>
                                        <h3 class="m-0 w-500">7.4%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-body bg-red p-15">
                        <div class="row m-b-6">
                            <div class="col-xs-3">
                                <i class="glyph-icon flaticon-educational"></i>
                            </div>
                            <div class="col-xs-9">
                                <small class="stat-title">PAGES VIEW</small>
                                <h1 class="m-0 w-500">201k</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-title">Duration</small>
                                <h3 class="m-0 w-500">18:25</h3>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-title">Pages / visits</small>
                                <h3 class="m-0 w-500">21</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-body bg-green p-15">
                        <div class="row m-b-0">
                            <div class="col-xs-3">
                                <i class="glyph-icon flaticon-orders"></i>
                            </div>
                            <div class="col-xs-9">
                                <small class="stat-title">ORDERS THIS MONTH</small>
                                <div class="live-tile" data-delay="4000" data-animation-easing="fade" data-height="47">
                                    <div>
                                        <h1 class="m-0 w-500 bg-green">148</h1>
                                    </div>
                                    <div>
                                        <h1 class="m-0 w-500 bg-green">+28%</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-title">Last month</small>
                                <div class="live-tile" data-delay="4000" data-animation-easing="fade" data-height="30">
                                    <div class="bg-green">
                                        <h3 class="m-0 w-500">126</h3>
                                    </div>
                                    <div class="bg-green">
                                        <h3 class="m-0 w-500">$12,545</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-title">Last week</small>
                                <div class="live-tile" data-delay="4000" data-animation-easing="fade" data-height="30">
                                    <div class="bg-green">
                                        <h3 class="m-0 w-500">41</h3>
                                    </div>
                                    <div class="bg-green">
                                        <h3 class="m-0 w-500">$4,237</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-body bg-dark p-15">
                        <div class="row m-b-6">
                            <div class="col-xs-3">
                                <i class="glyph-icon flaticon-incomes"></i>
                            </div>
                            <div class="col-xs-9">
                                <small class="stat-title">INCOMES THIS MONTH</small>
                                <h1 class="m-0 w-500">$<span class="animate-number" data-value="42567" data-animation-duration="1400">0</span></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-title">Last month</small>
                                <h3 class="m-0 w-500">$<span class="animate-number" data-value="38547" data-animation-duration="1400">0</span></h3>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-title">Last week</small>
                                <h3 class="m-0 w-500">$<span class="animate-number" data-value="8754" data-animation-duration="1400">0</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="graph-wrapper">
                                    <div class="graph-info p-r-10">
                                        <a href="javascript:void(0)" class="btn bg-green">Visitors</a>
                                        <a href="javascript:void(0)" class="btn bg-blue">Returning Visitors</a>
                                        <button href="#" id="bars" class="btn" disabled><span></span></button>
                                        <button href="#" id="lines" class="btn active" disabled><span></span></button>
                                    </div>
                                    <div class="h-300">
                                        <div class="h-300" id="graph-lines" style="width:100%"></div>
                                        <div class="h-300"id="graph-bars" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h4 class="text-center c-gray">Bounce rate</h4>
                                        <div class="spark-chart-1"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 hidden-md hidden-sm hidden-xs">
                                        <h4 class="text-center c-gray">Unique visitors</h4>
                                        <div class="spark-chart-2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3 col-md-12">
                                        <h4 class="m-b-m50 m-t-30 text-center c-gray">Browsers</h4>
                                        <div id="donut-chart1" class="m-b-m30"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel no-bd bg-green">
                    <div class="panel-heading clearfix pos-rel">
                        <div class="pos-abs t-10 l-15 f-18"><i class="fa fa-list"></i></div>
                        <h2 class="panel-title width-100p text-center w-500 f-20 carrois">To Do List</h2>
                        <div class="pos-abs t-10 r-5 f-18 cursor-pointer"><div class="glyph-icon flaticon-plus16 f-32"></div></div>
                    </div>
                    <div class="panel-body bg-green p-t-0 p-b-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row m-b-10">
                                    <input class="form-control" id="new-todo" placeholder="What needs to be done?" type="text" class="span8" />
                                </div>
                                <div class="row" id="task-manager">
                                    <div class="m-b-10">
                                        <a href="#" class="pos-rel c-white p-r-10 p-l-30 m-l-10">
                                            <input class="my_checkbox_all" type="checkbox" data-style="flat-red">Check All
                                        </a>
                                        <div class="pull-right">
                                            <a href="#" class="create-task c-white p-r-10"><i class="fa fa-plus-circle"></i> Create Task</a>
                                            <a href="#" class="delete-task c-white p-r-10"><i class="fa fa-minus-circle"></i> Delete All Tasks</a>
                                        </div>                        </div>
                                    <ul id="sortable-todo">
                                        <li class="sortable col-md-12 p-10 m-b-10 bd-3 bg-opacity-20 h-40 fade in">
                                            <a href="#" class="pull-right c-white p-l-10" data-dismiss="alert"><i class="fa fa-times f-18"></i></a>
                                            <a href="#" class="pull-right c-white" data-dismiss="alert"><i class="fa fa-pencil f-18"></i></a>
                                            <div class="sortable-item">
                                                <div class="pos-rel">
                                                    <input tabindex="13" type="checkbox" class="pull-left task-item" data-style="flat-red">
                                                </div>
                                                <div class="p-l-30 pull-left">
                                                    Find beautiful templates
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sortable col-md-12 p-10 m-b-10 bd-3 bg-opacity-20 h-40 fade in">
                                            <a href="#" class="pull-right c-white p-l-10" data-dismiss="alert"><i class="fa fa-times f-18"></i></a>
                                            <a href="#" class="pull-right c-white" data-dismiss="alert"><i class="fa fa-pencil f-18"></i></a>
                                            <div class="sortable-item">
                                                <div class="pos-rel">
                                                    <input tabindex="13" type="checkbox" class="pull-left task-item" data-style="flat-red">
                                                </div>
                                                <div class="p-l-30 pull-left">
                                                    Create new design
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sortable col-md-12 p-10 m-b-10 bd-3 bg-opacity-20 h-40 fade in">
                                            <a href="#" class="pull-right c-white p-l-10" data-dismiss="alert"><i class="fa fa-times f-18"></i></a>
                                            <a href="#" class="pull-right c-white" data-dismiss="alert"><i class="fa fa-pencil f-18"></i></a>
                                            <div class="sortable-item">
                                                <div class="pos-rel">
                                                    <input tabindex="13" type="checkbox" class="pull-left task-item" data-style="flat-red">
                                                </div>
                                                <div class="p-l-30 pull-left">
                                                    Go to Shop
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sortable col-md-12 p-10 m-b-10 bd-3 bg-opacity-20 h-40 fade in">
                                            <a href="#" class="pull-right c-white p-l-10" data-dismiss="alert"><i class="fa fa-times f-18"></i></a>
                                            <a href="#" class="pull-right c-white" data-dismiss="alert"><i class="fa fa-pencil f-18"></i></a>
                                            <div class="sortable-item">
                                                <div class="pos-rel">
                                                    <input tabindex="13" type="checkbox" class="pull-left task-item" data-style="flat-red">
                                                </div>
                                                <div class="p-l-30 pull-left">
                                                    Buy a new bike
                                                </div>
                                            </div>
                                        </li>
                                        <li class="sortable col-md-12 p-10 m-b-10 bd-3 bg-opacity-20 h-40 fade in">
                                            <a href="#" class="pull-right c-white p-l-10" data-dismiss="alert"><i class="fa fa-times f-18"></i></a>
                                            <a href="#" class="pull-right c-white" data-dismiss="alert"><i class="fa fa-pencil f-18"></i></a>
                                            <div class="sortable-item">
                                                <div class="pos-rel">
                                                    <input tabindex="13" type="checkbox" class="pull-left" data-style="flat-red">
                                                </div>
                                                <div class="p-l-30 pull-left">
                                                    Write a book
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div id="todo-stats"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix pos-rel">
                        <div class="pos-abs t-10 l-15 f-18 c-gray"><i class="fa fa-search"></i></div>
                        <h2 class="panel-title width-100p c-blue text-center w-500 f-20 carrois">Contact</h2>
                        <div class="pos-abs t-10 r-5 f-18 c-blue cursor-pointer"><div class="glyph-icon flaticon-plus16 f-32"></div></div>
                    </div>
                    <div class="panel-body messages">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="withScroll" data-height="320">
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar1.png" alt="avatar 1" width="40" class="pull-left">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <p class="c-dark m-0"><strong>John Snow</strong></p>
                                                    <p class="c-gray m-0">cameso@it.com</p>
                                                </div>
                                                <div class="pull-right f-18 p-t-10">
                                                    <i rel="tooltip" title="add to favs" data-placement="left" class="favs fa fa-star-o p-r-10"></i>
                                                    <i rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                    <i rel="tooltip" title="show phone" data-placement="left"  class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar2.png" alt="avatar 2" width="40" class="pull-left">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <p class="c-dark m-0"><strong>Jerry Smith</strong></p>
                                                    <p class="c-gray m-0">bugomi@vigu.com</p>
                                                </div>
                                                <div class="pull-right f-18 p-t-10">
                                                    <i rel="tooltip" title="remove from favs" data-placement="left" class="favs fa fa-star p-r-10 c-orange"></i>
                                                    <i rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                    <i rel="tooltip" title="show phone" data-placement="left" title="show phone" class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar3.png" alt="avatar 3" width="40" class="pull-left">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <p class="c-dark m-0"><strong>John Snow</strong></p>
                                                    <p class="c-gray m-0">cameso@it.com</p>
                                                </div>
                                                <div class="pull-right f-18 p-t-10">
                                                    <i rel="tooltip" title="add to favs" data-placement="left" class="favs fa fa-star-o p-r-10"></i>
                                                    <i rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                    <i rel="tooltip" title="show address" data-placement="left" class="fa fa-home"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar4.png" alt="avatar 4" width="40" class="pull-left">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <p class="c-dark m-0"><strong>Jerry Smith</strong></p>
                                                    <p class="c-gray m-0">bugomi@vigu.com</p>
                                                </div>
                                                <div class="pull-right f-18 p-t-10">
                                                    <i rel="tooltip" title="add to favs" data-placement="left" class="favs fa fa-star-o p-r-10"></i>
                                                    <i rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                    <i rel="tooltip" title="show phone" data-placement="left" class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar5.png" alt="avatar 5" width="40" class="pull-left">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <p class="c-dark m-0"><strong>John Snow</strong></p>
                                                    <p class="c-gray m-0">cameso@it.com</p>
                                                </div>
                                                <div class="pull-right f-18 p-t-10">
                                                    <i rel="tooltip" title="add to favs" data-placement="left" class="favs fa fa-star-o p-r-10"></i>
                                                    <i rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                    <i rel="tooltip" title="show address" data-placement="left" class="fa fa-home"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar6.png" alt="avatar 6" width="40" class="pull-left">
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <p class="c-dark m-0"><strong>Jerry Smith</strong></p>
                                                    <p class="c-gray m-0">bugomi@vigu.com</p>
                                                </div>
                                                <div class="pull-right f-18 p-t-10">
                                                    <i rel="tooltip" title="add to favs" data-placement="left" class="favs fa fa-star-o p-r-10"></i>
                                                    <i rel="tooltip" title="send email" data-placement="left" class="fa fa-envelope-o p-r-10"></i>
                                                    <i rel="tooltip" title="show phone" data-placement="left" class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-stat bg-purple-gradient">
                    <div class="panel-heading text-center p-10 p-b-0">
                        <div class="pos-abs t-10 l-15 f-18 c-white"><i class="fa fa-dollar"></i></div>
                        <h2 class="panel-title c-white">Revenue</h2>
                        <div class="pos-abs t-5 r-5 f-18 c-white cursor-pointer"><div class="glyph-icon flaticon-plus16 f-32"></div></div>
                    </div>
                    <div class="panel-body p-0 bg-transparent">
                        <div id="chart_revenue" style="height: 340px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 m-b-20">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix pos-rel">
                        <div class="pos-abs top-12 l-15 f-18 c-gray"><i class="fa fa-comments-o"></i></div>
                        <h2 class="panel-title width-100p c-red text-center w-500 f-20 carrois">Email</h2>
                        <div class="pos-abs t-10 r-5 f-18 c-red cursor-pointer"><div class="glyph-icon flaticon-plus16 f-32"></div></div>
                    </div>
                    <div class="panel-body messages">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="withScroll" data-height="480">
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar13.png" alt="avatar 13" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>John Snow</strong></h5>
                                                <h4 class="c-dark">Reset your account password</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar12.png" alt="avatar 12" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>Jerry Smith</strong></h5>
                                                <h4 class="c-dark">Check Dropbox</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Hello Steve, I have added new files in your Dropbox in order to show you how to...</p>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar11.png" alt="avatar 11" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>John Snow</strong></h5>
                                                <h4 class="c-dark">Reset your account password</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar10.png" alt="avatar 10" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>Jerry Smith</strong></h5>
                                                <h4 class="c-dark">Check Dropbox</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Hello Steve, I have added new files in your Dropbox in order to show you how to...</p>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar9.png" alt="avatar 9" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>John Snow</strong></h5>
                                                <h4 class="c-dark">Reset your account password</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar8.png" alt="avatar 8" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>Jerry Smith</strong></h5>
                                                <h4 class="c-dark">Check Dropbox</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Hello Steve, I have added new files in your Dropbox in order to show you how to...</p>
                                    </a>
                                    <a href="#" class="message-item media">
                                        <div class="media">
                                            <img src="assets/img/avatars/avatar7.png" alt="avatar 7" width="50" class="pull-left">
                                            <div class="media-body">
                                                <small class="pull-right">23 Sept</small>
                                                <h5 class="c-dark"><strong>John Snow</strong></h5>
                                                <h4 class="c-dark">Reset your account password</h4>
                                            </div>
                                        </div>
                                        <p class="f-14 c-gray">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 m-b-20">
                <div class="modal fade" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Manage</strong> my events</h4>
                            </div>
                            <div class="modal-body">
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event">Create event</button>
                                <button type="button" class="btn btn-danger delete-event"  data-dismiss="modal">Delete</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="external-events" class="bg-white row m-0">
                    <div class="col-md-4 p-0">
                        <div class="widget bg-gray-l">
                            <div class="widget-body p-b-0">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h2 class="panel-title width-100p c-blue w-500 f-20 carrois" id="calender-current-day">Events Manager</h2>
                                        <div id='external-events'>
                                            <br><br><br>
                                            <div class="external-event bg-green" data-class="bg-green" style="position: relative;">
                                                <i class="fa fa-move"></i>Sport
                                            </div>
                                            <div class="external-event bg-purple" data-class="bg-purple" style="position: relative;">
                                                <i class="fa fa-move"></i>Meeting
                                            </div>
                                            <div class="external-event bg-red" data-class="bg-red" style="position: relative;">
                                                <i class="fa fa-move"></i>Work
                                            </div>
                                            <div class="external-event bg-blue" data-class="bg-blue" style="position: relative;">
                                                <i class="fa fa-move"></i>Children
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1 p-0 no-bd">
                        <div class="widget bg-white">
                            <div class="widget-body p-b-0">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav id="menu-right">
        <ul>
            <li class="mm-label label-big">ONLINE</li>
            <li class="img no-arrow have-message">
                <span>
                    <i class="online"></i>
                    <img src="assets/img/avatars/avatar3.png"/>
                    <div class="chat-name">Alexa Johnson</div>
                    <div class="pull-right badge badge-danger hide">3</div>
                    <div >Los Angeles</div>
                </span>
                <ul class="chat-messages">
                    <li class="img"><span><div class="chat-detail"><img src="assets/img/avatars/avatar3.png"/><div class="chat-bubble">Hi you!</div></div></span>
                    </li>
                    <li class="img"><span><div class="chat-detail"><img src="assets/img/avatars/avatar3.png"/><div class="chat-bubble">You there?</div></div></span>
                    </li>
                    <li class="img"><span><div class="chat-detail"><img src="assets/img/avatars/avatar3.png"/><div class="chat-bubble">Let me know when you come back</div></div></span>
                    </li>
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="online"></i>
                    <img src="assets/img/avatars/avatar2.png" alt="avatar 2"/>
                    <div class="chat-name">Bobby Brown</div>
                    <div>New York</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="busy"></i>
                    <img src="assets/img/avatars/avatar13.png" alt="avatar 13"/>
                    <div class="chat-name">Fred Smith</div>
                    <div>Atlanta</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="away"></i>
                    <img src="assets/img/avatars/avatar4.png" alt="avatar 4"/>
                    <div class="chat-name">James Miller</div>
                    <div>Seattle</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="online"></i>
                    <img src="assets/img/avatars/avatar5.png" alt="avatar 5"/>
                    <div class="chat-name">Jefferson Jackson</div>
                    <div>Los Angeles</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="mm-label label-big m-t-30">OFFLINE</li>

            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/img/avatars/avatar6.png" alt="avatar 6"/>
                    <div class="chat-name">Jordan</div>
                    <div>Savannah</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/img/avatars/avatar7.png" alt="avatar 7"/>
                    <div class="chat-name">Kim Addams</div>
                    <div>Birmingham</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/img/avatars/avatar8.png" alt="avatar 8"/>
                    <div class="chat-name">Meagan Miller</div>
                    <div>San Francisco</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                        <i class="offline"></i>
                        <img src="assets/img/avatars/avatar9.png" alt="avatar 9"/>
                        <div class="chat-name">Melissa Johnson</div>
                        <div>Austin</div>
                    </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/img/avatars/avatar12.png" alt="avatar 12"/>
                    <div class="chat-name">Nicole Smith</div>
                    <div>San Diego</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/img/avatars/avatar11.png" alt="avatar 11"/>
                    <div class="chat-name">Samantha Harris</div>
                    <div>Salt Lake City</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/img/avatars/avatar10.png" alt="avatar 10"/>
                    <div class="chat-name">Scott Thomson</div>
                    <div>Los Angeles</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
        </ul>
    </nav>




</div>

<!-- END CHAT MENU -->
<!-- BEGIN MANDATORY SCRIPTS -->
<script src="http://127.0.0.1:3000/assets/plugins/jquery-1.11.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/jquery-migrate-1.2.1.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/bootstrap-select/bootstrap-select.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/icheck/icheck.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/nprogress/nprogress.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-sparkline/sparkline.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/breakpoints/breakpoints.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/numerator/jquery-numerator.js"></script>
<!-- END MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="http://127.0.0.1:3000/assets/plugins/metrojs/metrojs.min.js"></script>
<script src='http://127.0.0.1:3000/assets/plugins/fullcalendar/moment.min.js'></script>
<script src='http://127.0.0.1:3000/assets/plugins/fullcalendar/fullcalendar.min.js'></script>
<script src="http://127.0.0.1:3000/assets/plugins/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/google-maps/markerclusterer.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://127.0.0.1:3000/assets/plugins/google-maps/gmaps.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-flot/jquery.flot.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-flot/jquery.flot.animator.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-flot/jquery.flot.resize.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-flot/jquery.flot.time.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-morris/raphael.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/charts-morris/morris.min.js"></script>
<script src="http://127.0.0.1:3000/assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="http://127.0.0.1:3000/assets/js/calendar.js"></script>
<script src="http://127.0.0.1:3000/assets/js/dashboard.js"></script>
<!-- END  PAGE LEVEL SCRIPTS -->


<script src="http://127.0.0.1:3000/assets/js/application.js"></script>
</body>
