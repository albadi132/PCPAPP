@extends('layouts.app')
@section('content')
<div class="w-full">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900">
                <a href="{{ route('competitions-show') }}">competitions</a>/{{$contest->name}}
            </h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
        <div class="w-full md:p-6 2xl:w-10/12">
            <div class="min-h-screen bg-gray-50">
                <div class="flash-message">
                    @foreach (['danger', 'success'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="{{ $msg == 'danger' ? 'bg-red-100 border border-red-400 text-red-700' : 'bg-green-100 border border-green-400 text-green-700' }}  px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{Session::get('alert-' . $msg)}}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="flex flex-wrap items-center p-4 space-x-3 rounded-lg ">
                    <a href="{{route('competition', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name) == request()->path() ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </span>
                        <span>
                            Competition
                        </span>
                    </a>
                    <a href="{{route('UserChallenges', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/challenges' == request()->is('competition/'.NameToUrl($contest->name).'/challenges*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </span>
                        <span>
                            Challenges
                        </span>
                    </a>
                    @if($contest->participation == 'solo')
                        <a href="{{route('UserParticipants', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/participants' == request()->is('competition/'.NameToUrl($contest->name).'/participants') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span>
                                Participants
                            </span>
                        </a>
                        <a href="{{route('scoreboard-solo', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/participants/scoreboard' == request()->is('competition/'.NameToUrl($contest->name).'/participants/scoreboard*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </span>
                            <span>
                                Scoreboard
                            </span>
                        </a>
                    @else
                        <a href="{{route('UserTeams', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/teams' == request()->is('competition/'.NameToUrl($contest->name).'/teams') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span>
                                Teams
                            </span>
                        </a>
                        <a href="{{route('scoreboard-team', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/teams/scoreboard' == request()->is('competition/'.NameToUrl($contest->name).'/teams/scoreboard*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </span>
                            <span>
                                Scoreboard
                            </span>
                        </a>
                    @endif
                    @can('OrganizerOrAdmin', $contest->id)
                        <a href="{{route('competition-manage', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/mange' == request()->is('competition/'.NameToUrl($contest->name).'/mange*') ? 'border-white text-white bg-green-400 ' : ' border-green-400 text-green-400 bg-white ' }} hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <span>
                                Manage
                            </span>
                        </a>
                    @endcan
                </div>
                @yield('competition')
            </div>
        </div>
    </div>
</div>
@endsection
