@extends('admin.layouts.app')
@section('content')

<div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                            Live Contests
                        </div>
                        <div class="text-xl font-bold">
{{$contests->where('starting_date', '<=', date('Y-m-d H:i:s'))
->where('ending_date', '>=', date('Y-m-d H:i:s'))->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"  class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                      </svg>
                  
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                            Upcoming Contests
                        </div>
                        <div class="text-xl font-bold">
                            {{$contests->where('starting_date', '>', date('Y-m-d H:i:s'))->count()}}
                        </div>
                    </div>
                  
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                            Archived Contests
                        </div>
                        <div class="text-xl font-bold">
                           {{ $contests->where('ending_date', '<', date('Y-m-d H:i:s'))->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                      </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                          Total Contests
                        </div>
                        <div class="text-xl font-bold">
                           {{ $contests->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                      </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="app" class="bg-white pb-4 px-4 rounded-md w-full">
    <div class="flex justify-between w-full pt-6 ">
        <div class="flex flex-col px-2 md:flex-row">
            <a href="{{ route('contests-creat') }}" class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
              New Contest</a>
          </div>
      <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g opacity="0.4">
      <circle cx="2.19796" cy="1.80139" r="1.38611" fill="#222222"/>
      <circle cx="11.9013" cy="1.80115" r="1.38611" fill="#222222"/>
      <circle cx="7.04991" cy="1.80115" r="1.38611" fill="#222222"/>
      </g>
      </svg>
    </div>
   
    <pcp-cp-contests :contests="'{{ json_encode($contests) }}'" :time="'{{date('Y-m-d H:i:s')}}'"></pcp-cp-contests>
   
</div>
 
@endsection