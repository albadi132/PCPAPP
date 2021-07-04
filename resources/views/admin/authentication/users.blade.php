@extends('admin.layouts.app')
@section('content')
<div class="w-full">
    <div id="app" class="w-full">
        <pcp-cp-users :users="'{{ addslashes(json_encode($users)) }}'"></pcp-cp-users>
    </div>
</div>
@endsection
