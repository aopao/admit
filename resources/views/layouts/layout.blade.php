<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>{{ $config['web_name'] or ''}}</title>
    <link rel="apple-touch-icon" href="{{ asset('theme/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/site.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('theme/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/jquery-mmenu/jquery-mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/flag-icon-css/flag-icon.css') }}">

    <!-- Pages -->
    @yield('page-css')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('theme/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="{{ asset('theme/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ asset('theme/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ asset('theme/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition site-navbar-small site-menubar-fold site-menubar-keep">
@include('commons.low_browser')
@include('admins.widgets.site_navbar')
@include('admins.widgets.site_menubar')
@include('admins.widgets.site_gridmenu')

<!-- Page -->
<div class="page">
    @yield('content')
</div>
<!-- End Page -->

<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">{{ $config['copyright'] or '' }}</div>
    <div class="site-footer-right">
        <i class="red-600 wb wb-heart"></i>{{ $config['web_name'] or '' }}</a>
    </div>
</footer>
<!-- End Footer -->

<!-- Core  -->
<script src="{{ asset('theme/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
<script src="{{ asset('theme/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('theme/vendor/popper-js/umd/popper.min.js') }}"></script>
<script src="{{ asset('theme/vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('theme/vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('theme/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('theme/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
<script src="{{ asset('theme/vendor/asscrollable/jquery-asScrollable.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('theme/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
<script src="{{ asset('theme/vendor/switchery/switchery.js') }}"></script>
<script src="{{ asset('theme/vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('theme/vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('theme/vendor/slidepanel/jquery-slidePanel.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('theme/js/Component.js') }}"></script>
<script src="{{ asset('theme/js/Plugin.js') }}"></script>
<script src="{{ asset('theme/js/Base.js') }}"></script>
<script src="{{ asset('theme/js/Config.js') }}"></script>

<script src="{{ asset('theme/js/Section/Menubar.js') }}"></script>
<script src="{{ asset('theme/js/Section/Sidebar.js') }}"></script>
<script src="{{ asset('theme/js/Section/PageAside.js') }}"></script>
<script src="{{ asset('theme/js/Section/GridMenu.js') }}"></script>

<!-- Config -->
<script src="{{ asset('theme/js/config/colors.js') }}"></script>
{{--<script src="{{ asset('theme/js/config/tour.js') }}"></script>--}}
{{--<script>Config.set('asset', '../../asset');</script>--}}

<!-- Page -->
<script src="{{ asset('theme/js/Site.js') }}"></script>
<script src="{{ asset('theme/js/Plugin/asscrollable.js') }}"></script>
<script src="{{ asset('theme/js/Plugin/slidepanel.js') }}"></script>
<script src="{{ asset('theme/js/Plugin/switchery.js') }}"></script>
@yield('page-js')
<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>
