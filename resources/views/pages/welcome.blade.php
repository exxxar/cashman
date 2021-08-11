@extends('layouts.layout')
@section('title')
    Main Page
@endsection

@section('content')
    <main-page :auth_user='{!! json_encode($profile) !!}' :news='{!! json_encode($news) !!}'
               :companies='{!! json_encode($companies) !!}'  :stories='{!! json_encode($stories) !!}'></main-page>
@endsection
