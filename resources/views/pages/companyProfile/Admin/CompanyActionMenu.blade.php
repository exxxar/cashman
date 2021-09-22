@extends('layouts.layout')
@section('title')
    Company Action Menu
@endsection

@section('content')
    <company-action-menu :company='{!! json_encode($id) !!}'></company-action-menu>
@endsection
