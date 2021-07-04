@extends('layouts.layout')
@section('title')
    Region Map
@endsection

@section('content')
<region-map-block :coords='{!! json_encode( $coords) !!}'></region-map-block>
@endsection
