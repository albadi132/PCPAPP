@extends('admin.layouts.app')
@section('content')
<div class="w-full">
    <div id="app" class="w-full">
        <pcp-cp-language :languages="'{{ addslashes(json_encode($language)) }}'" :time="'{{date('Y-m-d H:i:s')}}'"></pcp-cp-contests>
    </div>
</div>
@endsection
