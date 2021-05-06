@extends('layouts.app')

@section('content')

<header class="bg-white shadow">
  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900">
     <a href="{{ route('competitions-show') }}">competitions</a>/{{$contest[0]->name}}
    </h1>
  </div>
</header>
<br>
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    <div class="min-h-screen bg-gray-50">
      

      <div class=" p-4 flex flex-wrap rounded-lg space-x-3 items-center">
        <button class=" {{ 'competition/'.NameToUrl($contest[0]->name) == request()->path() ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
            </svg>
          </span>
          <span>
            Competition    
          </span>
      </button>
      <button class=" {{ 'competition/'.NameToUrl($contest[0]->name).'/challenges' == request()->is('competition/'.NameToUrl($contest[0]->name).'/challenges*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
          </svg>
        </span>
        <span>
          Challenges
        </span>
    </button>
    @if($contest[0]->participation == 'solo')
    <button class=" {{ 'competition/'.NameToUrl($contest[0]->name).'/participants' == request()->is('competition/'.NameToUrl($contest[0]->name).'/participants*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
      </span>
      <span>
        Participants
      </span>
  </button>
  @else
  <button class=" {{ 'competition/'.NameToUrl($contest[0]->name).'/teams' == request()->is('competition/'.NameToUrl($contest[0]->name).'/teams*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
    <span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
      </svg>
    </span>
    <span>
        Teams
    </span>
</button>
  @endif
  <button class=" {{ 'competition/'.NameToUrl($contest[0]->name).'/scoreboard' == request()->is('competition/'.NameToUrl($contest[0]->name).'/scoreboard*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
    <span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
      </svg>
    </span>
    <span>
      Scoreboard
    </span>
</button>
    </div>
  

@yield('competition')

</div>
</div> 

</div>

@endsection