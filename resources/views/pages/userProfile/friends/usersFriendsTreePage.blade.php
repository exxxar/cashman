@extends('layouts.layout')
@section('title')
    Your Referrals
@endsection

@section('content')
    <users-friends-tree :tree-data='{!!json_encode($treeData) !!}'></users-friends-tree>
@endsection
