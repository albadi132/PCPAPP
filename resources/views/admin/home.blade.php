@extends('admin.body')
@section('title')
home
@endsection
@section('content')
<div id="app" class="flex flex-col flex-wrap items-center w-full md:justify-evenly md:flex-row">
    <pcp-cp-user-role class="m-2"></pcp-cp-user-role>
    <pcp-cp-user-restpass class="m-2"></pcp-cp-user-restpass>
    <pcp-cp-user-status class="m-2"></pcp-cp-user-status>
</div>
@endsection
