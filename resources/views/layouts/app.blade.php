<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    @include('layouts.partials.header')


    {{--    @include ('tinymce')--}}
</head>
<body style="background-color:white;">

<div id="app" style="background-color: white;">
    @include('layouts.partials.user_navbar')
    @yield('content')
</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

@yield('script')
</body>
</html>
