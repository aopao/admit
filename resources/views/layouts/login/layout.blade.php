<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>{{ $config['web_name'] or 'Index' }}</title>
    <link rel="apple-touch-icon" href="{{ asset('theme/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/animsition/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/login.min.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('theme/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/fonts/brand-icons/brand-icons.min.css') }}">

    <!--[if lt IE 9]>
    <script src="{{ asset('theme/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ asset('theme/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

</head>

<body class="animsition page-login-v2 layout-full page-dark">
@include('commons.low_browser')
<style>body {
        background: transparent;
    }</style>
<!-- Page -->
<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    @yield('content')
</div>
<!-- End Page -->

<!-- Core  -->
<script src="{{ asset('theme/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
<script src="{{ asset('theme/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('theme/vendor/popper-js/umd/popper.min.js')}}"></script>
<script src="{{ asset('theme/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ asset('theme/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{ asset('theme/vendor/asscrollbar/jquery-asScrollbar.min.js')}}"></script>
<script src="{{ asset('theme/vendor/asscrollable/jquery-asScrollable.min.js')}}"></script>

<!-- vendor -->
<script src="{{ asset('theme/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
<script src="{{ asset('theme/vendor/switchery/switchery.js') }}"></script>
<script src="{{ asset('theme/vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('theme/vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('theme/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('theme/js/Component.js')}}"></script>
<script src="{{ asset('theme/js/Plugin.js')}}"></script>
<script src="{{ asset('theme/js/Base.js')}}"></script>
<script src="{{ asset('theme/js/Section/Menubar.js')}}"></script>
<script src="{{ asset('theme/js/Section/Sidebar.js')}}"></script>
<script src="{{ asset('theme/js/Section/PageAside.js')}}"></script>
<script src="{{ asset('theme/js/Plugin/menu.js')}}"></script>

<!-- Config -->
<script src="{{ asset('theme/js/Site.js')}}"></script>
<!-- Page -->
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