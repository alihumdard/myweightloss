<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('web.includes.head')
</head>

<body class="hold-transition sidebar-mini">
    @include('web.includes.header')
    @yield('content')
    @include('web.includes.footer')
</body>

</html>