<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>CashMan - @yield('title')</title>
    <meta name="description" content="CashMan Mobile">
    <meta name="keywords"
          content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive"/>
    <link rel="icon" type="image/png" href="{{ asset('assets/icon.png') }}" sizes="32x32">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @if (Illuminate\Support\Facades\Auth::check())
    <meta name="user" content="{{ App\Models\User::self() }}"/>
    @endif
    @laravelPWA
</head>
<body>
<div id="app">
    <!-- loader -->
    <div id="loader">
        <img src="{{ asset('assets/logo-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->
    @yield('content')
</div>
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/app.js') }}" defer ></script>
<script type="text/javascript" src="{{ asset('js/base.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined"
        crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js" ></script>
</body>
</html>

<style>
    .padding-bottom-70 {
        padding-bottom: 70px;
    }
</style>
