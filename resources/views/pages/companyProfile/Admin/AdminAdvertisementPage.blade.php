@extends('layouts.layout')
@section('title')
    Company Admin Advertisement
@endsection

@section('content')
    <company-admin-advertisement :advertisements = '{!! json_encode($advertisement) !!}'></company-admin-advertisement>
@endsection
