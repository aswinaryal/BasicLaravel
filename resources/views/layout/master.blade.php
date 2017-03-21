<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="{{URL::to('src/css/style.css')}}" type="text/css" rel="stylesheet">
    @yield('styles')
</head>
<body>

    @include('includes.header')
    <div class="main">
        @yield('content')
    </div>

</body>
</html>
