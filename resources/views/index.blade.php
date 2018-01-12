<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css">
    <link href="/css/app.css" rel="stylesheet">
</head>
<style>
    .second-menu {
        position: relative;
        padding: 0px 0px;
        margin-bottom: -2px;
        background-color: #f9f9f9;
        border: 1px solid #d3e0e9;
        overflow: hidden;
    }

    .second-menu li {
        border-bottom: 1px solid #d3e0e9;
    }

    .second-menu li a {
        text-decoration: none;
    }
</style>
<body>
<div class="main" id="app">
    <db :app_name="'{{ env('APP_NAME') }}'"></db>
</div>
<nav class="navbar navbar-fixed-bottom">
    <div class="container text-center">
        &copy; rikyliu.com {{ date('Y') }}.
    </div>
</nav>
</div>
</body>
<script src="/js/app.js"></script>
</html>
