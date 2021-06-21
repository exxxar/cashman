@extends('layouts.app')

@section('content')
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href='/' class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>

    <div id="app">
        <user-login-component></user-login-component>
    </div>

@endsection
<script src="https://kit.fontawesome.com/3c25a92958.js" crossorigin="anonymous"></script>
