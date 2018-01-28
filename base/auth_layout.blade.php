<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' الإدارة ' : config('backpack.base.project_name').' إدارة' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @yield ('before_styles')

    {{--BEGIN GLOBAL MANDATORY STYLES--}}
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}" rel="stylesheet">
    {{--END GLOBAL MANDATORY STYLES--}}

    {{--END PAGE LEVEL PLUGINS--}}

    {{--BEGIN PAGE LEVEL PLUGINS--}}
    <link href="{{ asset('assets/global/css/components-rtl.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ asset('assets/global/css/plugins-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    {{--END THEME GLOBAL STYLES--}}

    {{--BEGIN THEME LAYOUT STYLES--}}
    <link href="{{ asset('assets/pages/css/login-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    {{--END THEME LAYOUT STYLES--}}

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

    @yield('css')
    @yield('after_styles')
</head>
<!-- END HEAD -->

<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('assets/pages/img/logo-big.png') }}" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">

    @yield('content')
</div>
<div class="copyright">
    {{ trans('backpack::base.handcrafted_by') }}
    <a target="_blank"
       href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}
    </a>.
</div>
<!--[if lt IE 9]>
<script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/pages/scripts/login.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>

<!-- page script -->
<script type="text/javascript">
    /* Store sidebar state */
    $('.sidebar-toggle').click(function (event) {
        event.preventDefault();
        if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
            sessionStorage.setItem('sidebar-toggle-collapsed', '');
        } else {
            sessionStorage.setItem('sidebar-toggle-collapsed', '1');
        }
    });
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart();
    });

    // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Set active state on menu element
    var current_url = "{{ Request::fullUrl() }}";
    var full_url = current_url + location.search;
    var $navLinks = $("ul.sidebar-menu li a");
    // First look for an exact match including the search string
    var $curentPageLink = $navLinks.filter(
        function () {
            return $(this).attr('href') === full_url;
        }
    );
    // If not found, look for the link that starts with the url
    if (!$curentPageLink.length > 0) {
        $curentPageLink = $navLinks.filter(
            function () {
                return $(this).attr('href').startsWith(current_url) || current_url.startsWith($(this).attr('href'));
            }
        );
    }

    $curentPageLink.parents('li').addClass('active');
            {{-- Enable deep link to tab --}}
    var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
    location.hash && activeTab && activeTab.tab('show');
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        location.hash = e.target.hash.replace("#tab_", "#");
    });
</script>

@include('backpack::inc.alerts')

@yield('after_scripts')

@yield('js')
</body>
</html>