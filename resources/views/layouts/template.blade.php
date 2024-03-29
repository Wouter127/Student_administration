<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css_after')
    <title>@yield('title', 'Welcome to the Student administration application')</title>
</head>
<body>
@include('shared.navigation')
<main class="container mt-3">
    @yield('main', 'Page under construction ...')

</main>
@include('shared.footer')
<script src="{{ mix('js/app.js') }}"></script>
@yield('script_after')
</body>
</html>

