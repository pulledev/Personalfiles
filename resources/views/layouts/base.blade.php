<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-icons')}}">
    <title>@yield('title')</title>
</head>
<body>

@yield('body')
<script src='/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
</body>
</html>
