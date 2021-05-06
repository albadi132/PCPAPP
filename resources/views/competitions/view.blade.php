@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        competitions
      </h1>
    </div>
</header>
<br>
<div class="flex justify-center">

    <div class="w-8/12 bg-gray-50 p-6 rounded-lg space-y-16">

        <!-- ///////// -->

        <div class="bg-white p-4 rounded w-full">
            <div class="md:grid md:grid-cols-4 md:gap-4 space-y-4 md:space-y-0 mt-4">
                <div class="shadow border rounded-lg">
                    <div class="flex items-center space-x-4 p-4 hover:shadow">
                        <div class="flex items-center p-4 bg-green-600 text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                              </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-500 font-semibold">All Competitions</p>
                            <div class="flex items-baseline space-x-4">
                                <h2 class="text-2xl font-semibold">
                                    {{$all}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('competitions-show')}}" class="block p-3 text-lg font-semibold bg-green-50 text-green-800 hover:bg-purple-100 cursor-pointer text-center">
                        View all
                    </a>
                </div>
                <div class="shadow border rounded-lg">
                    <div class="flex items-center space-x-4 p-4 hover:shadow">
                        <div class="flex items-center p-4 bg-green-400 text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                              </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-500 font-semibold">Live</p>
                            <div class="flex items-baseline space-x-4">
                                <h2 class="text-2xl font-semibold">
                                    {{$live}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('competitions-show', ['sort' => 'live' ])}}" class="block p-3 text-lg font-semibold bg-green-50 text-green-800 hover:bg-purple-100 cursor-pointer text-center">
                        View all
                    </a>
                </div>
                <div class="shadow border rounded-lg">
                    <div class="flex items-center space-x-4 p-4">
                        <div class="flex items-center p-4 bg-yellow-400 text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                              </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-500 font-semibold">Upcoming</p>
                            <div class="flex items-baseline space-x-4">
                                <h2 class="text-2xl font-semibold">
                                    {{$upcoming}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('competitions-show', ['sort' => 'upcoming' ])}}" class="block p-3 text-lg font-semibold bg-green-50 text-green-800 hover:bg-purple-100 cursor-pointer text-center">
                        View all
                    </a>
                </div>
                <div class="shadow border rounded-lg">
                    <div class="flex items-center space-x-4 p-4">
                        <div class="flex items-center p-4 bg-gray-400 text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                              </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-500 font-semibold">Archived</p>
                            <div class="flex items-baseline space-x-4">
                                <h2 class="text-2xl font-semibold">
                                    {{$archived}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('competitions-show', ['sort' => 'archived' ])}}" class="block p-3 text-lg font-semibold bg-green-50 text-green-800 hover:bg-purple-100 cursor-pointer text-center">
                        View all
                    </a>
                </div>
            </div>
        </div>


         <!-- ///////// -->

        
      
      
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 ">
  

 <!-- card -->
 @foreach ($contests as $contest)
    <a href="{{route('competition', ['name' => NameToUrl($contest['name']) ])}}">
    <div class="relative bg-white py-16 px-6 rounded-3xl w-11/12 my-4 shadow-xl hover:shadow">
        @if ($contest['ending_date'] <= date('Y-m-d H:i:s') )
        <div class=" text-white flex items-center absolute rounded-full py-1 px-1 shadow-xl bg-gray-400 left-4 -top-6">

@elseif ( ($contest['starting_date'] <= date('Y-m-d H:i:s')) & ($contest['ending_date'] >= date('Y-m-d H:i:s') ))
<div class=" text-white flex items-center absolute rounded-full py-1 px-1 shadow-xl bg-green-400 left-4 -top-6">
@else
<div class=" text-white flex items-center absolute rounded-full py-1 px-1 shadow-xl bg-yellow-400 left-4 -top-6">
@endif
                <img class="h-24 w-24 rounded-full bg-white" src="{{url('/contests/images/'. $contest['logo']) }}" alt="logo">
            </div>
            <div class="mt-8">
                <p class="text-xl font-semibold my-2">{{$contest['name']}}</p>
                <div class="flex space-x-2 text-gray-400 text-sm">
                    <!-- svg  -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                     <p>{{$contest['participation']}}</p> 
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                    <!-- svg  -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                      </svg>
                     <p>{{$contest['type']}}</p> 
                </div>
                <div class="border-t-2"></div>

                <div class="flex justify-between">
                    <div class="my-2">
                        <p class="font-semibold text-base mb-2">Time</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <!-- svg  -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                              </svg>
                             <p>{{$contest['starting_date']}}</p> 
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <!-- svg  -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                              </svg>
                             <p>{{$contest['ending_date']}}</p> 
                        </div>
                    </div>
                     <div class="my-2">
                        <p class="font-semibold text-base mb-2">Subscribers</p>
                        <div class="text-base text-gray-400 font-semibold">
                                                    <div class="flex space-x-2 text-gray-400 text-sm">
                            <!-- svg  -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                             <p>0</p> 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach

         <!-- end card -->


    </div>
      
      
    </div>
</div>
    
@endsection