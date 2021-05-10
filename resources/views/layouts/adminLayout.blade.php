<!doctype html>
<html lang="en">
    @include('fixed.admin.head')
<body>
    
    
    @include('fixed.admin.navigation')
    @include('fixed.admin.uiThemes')
    @include('fixed.admin.sideMenu')

    @yield('content')

    @include('fixed.admin.footer')
</body>
</html>

