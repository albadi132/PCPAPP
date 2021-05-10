@extends('layouts.app')
@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        Home
      </h1>
    </div>
</header>
<br>
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      <div id="app">
        <pcp-app></pcp-app>
      </div>
      
    </div>
</div>
    
@endsection

