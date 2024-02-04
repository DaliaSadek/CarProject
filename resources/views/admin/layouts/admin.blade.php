<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')

<body class="nav-md">
<div class="container body">
    <div class="main_container">
@include('admin.includes.sidebar')
@include('admin.includes.topnav')
@yield('adminContent')
@include('admin.includes.footer')
        <!-- /footer content -->
    </div>
</div>
@include('admin.includes.js')
</body>
</html>
