<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'LAB-MANAGER') }}</title>

<!-- Styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Scripts -->


<title>Lab-Manager</title>

<meta name="description" content="Lab-Manager">
<meta name="author" content="Lab-Manager">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta property="og:type" content="website">
<meta property="og:title" content="Lab-Manager">
<meta property="og:description" content="Easy participation platform for lab part-time">
<meta property="og:url" content="http://127.0.0.1:8000/">
<link rel="shortcut icon" href="/dongsu/favicon_32.png">

<!-- Stylesheets -->
<!-- Web fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
    var header = document.getElementById("active_event_1");

    $("#mobile-slideBt").click(function () {
        if ($(".collapse").hasClass("in")) {
            $(".header_bg").hide();
        }
        else {  
            $(".header_bg").show();
        }
    });
    $(".li_list").click(function () {
        $(".header_bg").hide();
        $('.collapse').collapse('hide');
    });

    $(".ul_arrow_list").click(function () {
        $(".header_bg").hide();
        $('.collapse').collapse('hide');
    })
</script>


<!-- Styling for caldendar -->
<link href='/dongsu/css/fullcalendar.css' rel='stylesheet' />
<link href='/dongsu/css/fullcalendar.print.css' rel='stylesheet' media='print' />


<link rel="stylesheet" href="/dongsu/css/bootstrap.min.css">
<link rel="stylesheet" id="css-main" href="/dongsu/css/oneui.css">
<link rel="stylesheet" id="css-customize" href="/dongsu/css/style.css?ver=2018082112">

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

<!-- Bootstrap and OneUI CSS framework -->
<link rel="stylesheet" href="/dongsu/css/bootstrap.min.css">

<link rel="stylesheet" href="/dongsu/css/bootstrap.min.css">
<link rel="stylesheet" id="css-main" href="/dongsu/css/oneui.css">
<link rel="stylesheet" id="css-customize" href="/dongsu/css/style.css">
<link rel="stylesheet" id="css-customize" href="/dongsu/css/style.css?ver=2018082112">

<script src='/dongsu/js/moment.min.js'></script>
<script src='/dongsu/js/jquery.min.js'></script>
<script src="/dongsu/js/core/bootstrap.min.js"></script>
<script src='/dongsu/js/fullcalendar.min.js'></script>
<script src='/dongsu/js/lang-all.js'></script>
<script src="/dongsu/js/core/jquery.slimscroll.min.js"></script>
<script src="/dongsu/js/core/jquery.scrollLock.min.js"></script>
<script src="/dongsu/js/core/jquery.appear.min.js"></script>
<script src="/dongsu/js/core/jquery.countTo.min.js"></script>
<script src="/dongsu/js/core/jquery.placeholder.min.js"></script>
<script src="/dongsu/js/core/js.cookie.min.js"></script>
<script src="/dongsu/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

<!-- Page JS Plugins -->
<script src="/dongsu/js/app.js?ver=2018072001"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    App.init('uiInit');

   </script>
