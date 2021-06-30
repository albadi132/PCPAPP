@extends('layouts.app')
@section('content')
<div class="w-full">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Home
        </h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
        <div class="w-full bg-white rounded-lg md:p-6 2xl:w-10/12">
            <div id="app">
                <pcp-app></pcp-app>
            </div>
        </div>
    </div>
</div>
@endsection

