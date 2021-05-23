@extends('admin.controlpanel')

@section('admin')
<div class="flex flex-col w-full">

    
    <div class="text-white bg-blue-400 flex flex-shrink-0 flex-col">
      <div class="flex relative items-center p-4 h-12">
        <span class="text-2xl tracking-wide">Home</span>
      </div>
    </div>

    <div class="w-8/12 bg-white p-6 rounded-lg">
      <div id="app">
        <pcp-vuemodal></pcp-vuemodal>
      </div>
      
    </div>
  </div>
  @endsection