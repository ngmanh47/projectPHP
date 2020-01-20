<!doctype html>
<html lang="en">

<head>
    @include('backend.widgets.head')
    <script type="text/javascript" src="{{asset('/public/backend/assets/scripts/main.js')}}"></script> {{-- Đưa từ cuối body lên--}}
    <script>
        var DOMAIN = '{{asset('/public/backend')}}/';    
    </script>
    <script type="text/javascript" src="{{asset('/public/backend/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('/public/backend/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('/public/backend/ckfinder/ckfinder.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    {{-- Nhúng link CKeditor --}}

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('backend.widgets.header')
        @include('backend.widgets.setting')

        <div class="app-main">
            @include('backend.widgets.sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @include('backend.widgets.header-title')
                    @yield('main')
                </div>
                @include('backend.widgets.footer')
            </div>
            {{-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> --}}
        </div>
    </div>
    {{-- <script type="text/javascript" src="{{asset('backend/assets/scripts/main.js')}}"></script> --}}
</body>
</html>
