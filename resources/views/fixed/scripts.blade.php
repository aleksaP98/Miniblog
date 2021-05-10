<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
</script>
@yield('scripts')