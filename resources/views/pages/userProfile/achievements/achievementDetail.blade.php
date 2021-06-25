@extends('layouts.layout')
@section('title')
    Achievements
@endsection

@section('content')
    <achievement-detail :achievement={{$achievement}}></achievement-detail>
@endsection
