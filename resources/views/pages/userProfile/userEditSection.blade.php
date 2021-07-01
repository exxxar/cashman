@extends('layouts.layout')
@section('title')
    Profile Edit Section
@endsection

@section('content')
    <edit-profile :form='{!! json_encode($profile) !!}'></edit-profile>
@endsection
