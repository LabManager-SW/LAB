<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    @include('layouts.partials.header')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
