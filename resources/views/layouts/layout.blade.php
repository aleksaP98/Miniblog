<!DOCTYPE html>
<html lang="en">
@include('fixed.head')

<body>
    <div class="site-wrap">

@include('fixed.mobileNav')
@include('fixed.navigation') 

    @yield('content')

@include('fixed.footer')
@include('fixed.scripts')

</body>
</html>
