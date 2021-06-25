@extends('admin.layouts.app')
@section('content')

<div id="app" class="w-full px-4 pb-4 bg-white rounded-md">
 

    <pcp-cp-language :languages="'{{ json_encode($language) }}'" :time="'{{date('Y-m-d H:i:s')}}'"></pcp-cp-contests>

</div>

@endsection
