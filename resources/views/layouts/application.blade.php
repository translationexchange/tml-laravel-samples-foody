<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="google" content="notranslate">

    <title>Foody (Laravel)</title>

    <link rel="stylesheet" href="{{ asset('stylesheets/bootstrap.ltr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/application.ltr.css') }}">
    <script type="text/javascript" src="{{ asset('javascripts/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascripts/bootstrap.min.js') }}"></script>

    <link rel='stylesheet' href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700"/>

    <?php tml_scripts() ?>
</head>
<body data-spy='scroll' data-target='#nav-categories'>

@include('layouts.navigation')

@yield('content')

</body>
</html>

