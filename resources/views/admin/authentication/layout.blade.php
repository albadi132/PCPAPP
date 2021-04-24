@extends('admin.controlpanel')

@section('admin')
<div class="flex flex-col w-full">

    
    <div class="text-white bg-blue-400 flex flex-shrink-0 flex-col">
      <div class="flex relative items-center p-4 h-12">
        <span class="text-2xl tracking-wide">Authentication</span>
      </div>
    </div>

    <div class="text-white bg-blue-400 flex w-full">
      <div class="flex overflow-hidden h-12 ml-2">
        <div class="{{ 'controlpanel/authentication/users' == request()->path() ? 'border-b-2 ' : 'hover:border-b-2 ' }} mx-3 border-white">
          <span><a href="{{ route('authentication-users') }}">User</a></span>
        </div>

        <div class=" {{ 'controlpanel/authentication/role' == request()->path() ? 'border-b-2 ' : 'hover:border-b-2 ' }} mx-3 border-white">
          <span><a href="{{ route('authentication-role') }}">Role</a></span>
        </div>
      </div>
    </div>
    @yield('auth') 
  </div>
  @endsection