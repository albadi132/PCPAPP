@extends('layouts.app')
@section('content')
<div class="w-full">
    <header class="w-full bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                profile
            </h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
        <div class="w-full overflow-x-scroll bg-white rounded-lg md:p-6 md:overflow-auto 2xl:w-10/12">
            <div class="container p-5 mx-auto my-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <div class="w-full md:w-3/12 md:mx-2">
                        <div class="p-3 bg-white border-t-4 border-green-400">
                            <div class="overflow-hidden image">
                                <img class="w-full h-auto mx-auto" src="{{url('/images/avatar') .'/'. $user->avatar }}" alt="">
                            </div>
                            <h1 class="my-1 text-xl font-bold leading-8 text-gray-900">{{getUsername($user->id)}}</h1>
                            <h3 class="leading-6 text-gray-600 font-lg text-semibold">{{$user->role}}</h3>
                            <p class="text-sm leading-6 text-gray-500 hover:text-gray-600">{{$user->about}}</p>
                            <ul class="px-3 py-2 mt-3 text-gray-600 bg-gray-100 divide-y rounded shadow-sm hover:text-gray-700 hover:shadow">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto">
                                        <span
                                            @if ($user->is_verified == 1 )
                                                class="px-2 py-1 text-sm text-white bg-green-500 rounded">Active
                                            @else
                                                class="px-2 py-1 text-sm text-white bg-gray-800 rounded">Not Active
                                            @endif
                                        </span>
                                    </span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Member since</span>
                                    <span class="ml-auto">{{date('Y-m-d', strtotime($user->created_at))}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="my-4"></div>
                        <div class="p-3 bg-white hover:shadow">
                            <div class="flex items-center space-x-3 text-xl font-semibold leading-8 text-gray-900">
                                <span class="text-green-500">
                                    <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </span>
                                <span>Participate in competitions</span>
                            </div>
                            <div class="grid grid-cols-3">
                                @foreach ($user->contests as $contest)
                                    <div class="my-2 text-center">
                                        <img class="w-16 h-16 mx-auto rounded-full" src="{{url('/contests/images/'. $contest['logo']) }}" alt="contests">
                                        <a href="{{route('competition', ['name' => NameToUrl($contest['name']) ])}}" class="text-main-color">{{$contest['name']}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-64 mx-2 md:w-9/12">
                        <div class="p-3 bg-white rounded-sm shadow-sm">
                            <div class="flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                <span clas="text-green-500">
                                    <svg class="h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">About</span>
                            </div>
                            <div class="text-gray-700">
                                <div class="grid text-sm md:grid-cols-2">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">First Name</div>
                                        <div class="px-4 py-2">{{$user->first_name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Last Name</div>
                                        <div class="px-4 py-2">{{$user->last_name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Gender</div>
                                        <div class="px-4 py-2">{{$user->gender}}</div>
                                    </div>
                                    @if ( (Gate::allows('AdminOrManager')) || (auth()->user()->id == $user->id))
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Email.</div>
                                            <div class="px-4 py-2">
                                                <a class="text-blue-800" href="mailto:{{$user->email}}">{{$user->email}}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="my-4"></div>
                        <div class="p-3 bg-white rounded-sm shadow-sm">
                            <div class="grid grid-cols-2">
                                <div>
                                    <div class="flex items-center mb-3 space-x-2 font-semibold leading-8 text-gray-900">
                                        <span clas="text-green-500">
                                            <svg class="h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Job Title</span>
                                    </div>
                                    <ul class="space-y-2 list-inside">
                                        <li>
                                            <div class="text-teal-600">{{$user->job}}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="flex items-center mb-3 space-x-2 font-semibold leading-8 text-gray-900">
                                        <span clas="text-green-500">
                                            <svg class="h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Education</span>
                                    </div>
                                    <ul class="space-y-2 list-inside">
                                        <li>
                                            <div class="text-teal-600">{{$user->workplace}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->id == $user->id)
                            <div id="app">
                                <pcp-profile :user="'{{ json_encode($user) }}'"></pcp-profile>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
