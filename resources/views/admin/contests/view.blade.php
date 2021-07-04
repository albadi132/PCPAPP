@extends('admin.layouts.app')
@section('content')
<div class="w-full">
    <div id="app" class="w-full">
        <pcp-cp-contests :contests="'{{ addslashes(json_encode($contests)) }}'" :time="'{{date('Y-m-d H:i:s')}}'"></pcp-cp-contests>
    </div>
</div>
@endsection
