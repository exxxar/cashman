@extends('layouts.layout')
@section('title')
   Complete Registration
@endsection
@section('content')
    <p>{{$email}}</p>
    <user-register-stepper :email='{!! json_encode($email) !!}'></user-register-stepper>
@endsection
