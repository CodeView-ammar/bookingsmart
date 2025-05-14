<!DOCTYPE html>

 <html class="no-js sidebar-large"> <!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="{{ url('assets/css/icons/icons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/plugins.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/style.min.css') }}" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="{{ url('assets/css/animate-custom.css') }}" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="{{ url('assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet">

</head>

<body class="login fade-in" data-page="login" dir="rtl">
<!-- BEGIN LOGIN BOX -->
<div class="container" id="login-block">
    <div class="row">
        @yield('content')
    </div>
</div>
<!-- END LOCKSCREEN BOX -->
<!-- BEGIN MANDATORY SCRIPTS -->
<script src="{{ url('assets/plugins/jquery-1.11.js') }}"></script>
<script src="{{ url('assets/plugins/jquery-migrate-1.2.1.js') }}"></script>
<script src="{{ url('assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- END MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('assets/plugins/backstretch/backstretch.min.js') }}"></script>
<script src="{{ url('assets/js/account.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
