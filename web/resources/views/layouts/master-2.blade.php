
<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/app.js') }}"></script>

        <script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.0/js/fontawesome.js"></script>
        @yield('head')
    </head>
    
    <body onload="myFunction()" style="margin:0;">
        @yield('loading')
        @yield('header')
        @yield('top_content')
        @yield('bottom_content')
        @yield('footer')
        @yield('script')
    </body>
</html>