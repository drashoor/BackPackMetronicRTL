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
    <title>{{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' Admin' : config('backpack.base.project_name').' إدارة' }}</title>
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
    @yield('css')
    {{--END PAGE LEVEL PLUGINS--}}

    {{--BEGIN PAGE LEVEL PLUGINS--}}
    <link href="{{ asset('assets/global/css/components-rtl.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ asset('assets/global/css/plugins-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    {{--END THEME GLOBAL STYLES--}}

    {{--BEGIN THEME LAYOUT STYLES--}}
    <link href="{{ asset('assets/layouts/layout4/css/layout-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/layouts/layout4/css/themes/default-rtl.min.css') }}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{ asset('assets/layouts/layout4/css/custom-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    {{--END THEME LAYOUT STYLES--}}

@yield('after_styles')

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">

<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="/">
                <img src="{{ asset('assets/layouts/layout4/img/logo-big.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler ">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <div class="page-top">
            @include('backpack::inc.menu')
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="page-container">
    <div class="page-sidebar-wrapper">
        @include('backpack::inc.sidebar')
    </div>

    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('header')
            @yield('content')
        </div>
    </div>
</div>
<div class="page-footer">
    <div class="page-footer-inner">
        @if (config('backpack.base.show_powered_by'))
            {{ trans('backpack::base.powered_by') }}
            <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">
                Backpack for Laravel
            </a>
        @endif
        {{ trans('backpack::base.handcrafted_by') }}
        <a target="_blank"
           href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}
        </a>.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

@yield('before_scripts')

<!--[if lt IE 9]>
<script src="{{ asset('assets/global/plugins/respond.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/excanvas.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/ie8.fix.min.js') }}" type="text/javascript"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{{--<script>window.jQuery || document.write('<script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"><\/script>')</script>--}}
<script src="{{ asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="/vendor/adminlte/plugins/pace/pace.min.js')}}"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

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
