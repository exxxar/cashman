@extends('layouts.layout')
@section('title')
    Company Profile
@endsection

@section('content')
 <company-profile :company = '{!! json_encode($company) !!}'></company-profile>
@endsection
