@extends('layouts.layout')
@section('title')
    Company Admin Products
@endsection

@section('content')
<company-admin-products :products = '{!! json_encode($products) !!}'></company-admin-products>
@endsection
