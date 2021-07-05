@extends('layouts.layout')
@section('title')
    User Profile
@endsection

@section('content')
    <user-page :auth_user='{!! json_encode($profile) !!}'></user-page>
@endsection
