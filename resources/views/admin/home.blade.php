@extends('admin.panel.menu')
@section('item.home')
<li class="relative px-2 py-1">
    <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
        href="/">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="ml-4 capitalize">home</span>
    </a>
</li>
@endsection


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
