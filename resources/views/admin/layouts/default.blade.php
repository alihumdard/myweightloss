<!DOCTYPE html>
<!-- here basic three files header footer and content and head contain link and scripts contain js scripts-->
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title' , 'Castnet')</title>

    @include('admin.includes.head')
</head>

<body class="hold-transition sidebar-mini">
    @include('admin.includes.header')
    @yield('content')
    @include('admin.includes.footer')
    @include('admin.includes.script')
    @stack('scripts')
</body>

</html>