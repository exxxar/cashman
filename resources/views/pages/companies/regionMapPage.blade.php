@extends('layouts.layout')
@section('title')
    Region Map
@endsection

@section('content')
<region-map-block :coords='{{$coords}}'></region-map-block>
@endsection
