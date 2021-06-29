@extends('layouts.layout')
@section('title')
    News
@endsection

@section('content')
    <news-detail :item='{!! json_encode($news) !!}'></news-detail>
@endsection
