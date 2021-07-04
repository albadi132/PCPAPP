@extends('layouts.app')
@section('content')
<div class="w-full">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                competitions
            </h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
        <div class="w-full space-y-16 md:p-6">
            <!-- ///////// -->
            <div class="w-full p-4">
                <div class="mt-4 space-y-4 md:grid md:grid-cols-2 xl:grid-cols-4 md:gap-4 md:space-y-0">
                    <div class="bg-white border rounded-lg shadow-lg">
                        <div class="flex items-center p-4 space-x-4 hover:shadow">
                            <div class="flex items-center p-4 text-white bg-green-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-500">All Competitions</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        {{$all}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('competitions-show')}}" class="block p-3 text-lg font-semibold text-center text-green-800 cursor-pointer bg-green-50 hover:bg-purple-100">
                            View all
                        </a>
                    </div>
                    <div class="bg-white border rounded-lg shadow-lg">
                        <div class="flex items-center p-4 space-x-4 hover:shadow">
                            <div class="flex items-center p-4 text-white bg-green-400 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-500">Live</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        {{$live}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('competitions-show', ['sort' => 'live' ])}}" class="block p-3 text-lg font-semibold text-center text-green-800 cursor-pointer bg-green-50 hover:bg-purple-100">
                            View all
                        </a>
                    </div>
                    <div class="bg-white border rounded-lg shadow-lg">
                        <div class="flex items-center p-4 space-x-4">
                            <div class="flex items-center p-4 text-white bg-yellow-400 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-500">Upcoming</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        {{$upcoming}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('competitions-show', ['sort' => 'upcoming' ])}}" class="block p-3 text-lg font-semibold text-center text-green-800 cursor-pointer bg-green-50 hover:bg-purple-100">
                            View all
                        </a>
                    </div>
                    <div class="bg-white border rounded-lg shadow-lg">
                        <div class="flex items-center p-4 space-x-4">
                            <div class="flex items-center p-4 text-white bg-gray-400 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-500">Archived</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        {{$archived}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('competitions-show', ['sort' => 'archived' ])}}" class="block p-3 text-lg font-semibold text-center text-green-800 cursor-pointer bg-green-50 hover:bg-purple-100">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <!-- ///////// -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 ">
                <!-- card -->
                @foreach ($contests as $contest)
                    <a href="{{route('competition', ['name' => NameToUrl($contest['name']) ])}}">
                        <div class="relative w-11/12 px-6 py-16 my-4 bg-white shadow-xl rounded-3xl hover:shadow">
                            @if ( $contest['opentime'])
                              @if ($contest['starting_date'] <= date('Y-m-d H:i:s'))
                              <div class="absolute flex items-center px-1 py-1 text-white bg-green-400 rounded-full shadow-xl left-4 -top-6">
                              @else
                              <div class="absolute flex items-center px-1 py-1 text-white bg-yellow-400 rounded-full shadow-xl left-4 -top-6">
                                  {{date('Y-m-d H:i:s') . '--' . $contest['starting_date'] }}
                              @endif
                            @else

                            @if ($contest['ending_date'] <= date('Y-m-d H:i:s') )
                                <div class="absolute flex items-center px-1 py-1 text-white bg-gray-400 rounded-full shadow-xl left-4 -top-6">
                            @elseif ( ($contest['starting_date'] <= date('Y-m-d H:i:s')) & ($contest['ending_date'] >= date('Y-m-d H:i:s') ))
                                <div class="absolute flex items-center px-1 py-1 text-white bg-green-400 rounded-full shadow-xl left-4 -top-6">
                            @else
                                <div class="absolute flex items-center px-1 py-1 text-white bg-yellow-400 rounded-full shadow-xl left-4 -top-6">
                            @endif
                            @endif
                                <img class="w-24 h-24 bg-white rounded-full" src="{{url('/contests/images/'. $contest['logo']) }}" alt="logo">
                            </div>
                            <div class="mt-8">
                                <p class="my-2 text-xl font-semibold">{{$contest['name']}}</p>
                                <div class="flex space-x-2 text-sm text-gray-400">
                                    <!-- svg  -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <p>{{$contest['participation']}}</p>
                                </div>
                                <div class="flex my-3 space-x-2 text-sm text-gray-400">
                                    <!-- svg  -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <p>{{$contest['type']}}</p>
                                </div>
                                <div class="border-t-2"></div>
                                <div class="flex justify-between">
                                    <div class="my-2">
                                        <p class="mb-2 text-base font-semibold">Time</p>
                                        <div class="flex space-x-2 text-sm text-gray-400">
                                            <!-- svg  -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                            <p>{{$contest['starting_date']}}</p>

                                        </div>
                                        <div class="flex my-3 space-x-2 text-sm text-gray-400">
                                            <!-- svg  -->
                                            @if ($contest['opentime'])
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                              </svg>
                                            <p>Open Contest</p>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                            <p>{{$contest['ending_date']}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <p class="mb-2 text-base font-semibold">Subscribers</p>
                                        <div class="text-base font-semibold text-gray-400">
                                                                    <div class="flex space-x-2 text-sm text-gray-400">
                                            <!-- svg  -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <p>{{$contest->competitor->count()}}</p>
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
</div>
@endsection
