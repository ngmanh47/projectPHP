<!doctype html>
<html lang="en">

<head>
    @include('backend.widgets.head')
</head>
<body>
    @yield('main')
    <script type="text/javascript" src="{{asset('/public/backend/assets/scripts/main.js')}}"></script>
</body>
</html>
