@extends('admin.layouts.app')
@section('content')
<div class="flex flex-row self-center w-full px-6 py-4 bg-white rounded-lg shadow-lg">
    <div id="app" class="flex flex-col flex-wrap items-center w-full md:justify-evenly md:flex-row">
        <pcp-cp-user-role class="m-2"></pcp-cp-user-role>
        <pcp-cp-user-restpass class="m-2"></pcp-cp-user-restpass>
        <pcp-cp-user-status class="m-2"></pcp-cp-user-status>
    </div>
</div>
@endsection

@section('content2')
<div class="flex flex-row self-center w-full px-6 py-4 bg-white rounded-lg shadow-lg">
    <div id="app" class="flex flex-col flex-wrap items-center w-full space-y-20 md:justify-evenly md:flex-col">
        <pcp-cp-user-role class="m-2"></pcp-cp-user-role>
        <pcp-cp-user-restpass class="m-2"></pcp-cp-user-restpass>
        <pcp-cp-user-status class="m-2"></pcp-cp-user-status>

        <pcp-cp-user-role class="m-2"></pcp-cp-user-role>
        <pcp-cp-user-restpass class="m-2"></pcp-cp-user-restpass>
        <pcp-cp-user-status class="m-2"></pcp-cp-user-status>

        <pcp-cp-user-role class="m-2"></pcp-cp-user-role>
        <pcp-cp-user-restpass class="m-2"></pcp-cp-user-restpass>
        <pcp-cp-user-status class="m-2"></pcp-cp-user-status>
    </div>
</div>
@endsection
