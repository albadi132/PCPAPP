<div>
    <div class="text-white">
        <div class="flex p-2 bg-bluegray-800">
            <div class="flex items-center px-2 py-3">
                <p class="text-2xl font-semibold text-green-500 uppercase">pcp</p>
                <p class="ml-2 font-semibold uppercase font-italic">site map</p>
            </div>
        </div>
        @auth
            <div class="flex items-center h-20 pl-2 border-b border-gray-800">
                <img src="{{url('/images/avatar') .'/'. auth()->user()->avatar }}"  alt="" class="flex items-center justify-center w-12 h-12 mr-3 border-2 border-green-500 rounded-full">
                <div class="ml-1">
                    <p class="ml-1 font-sans font-medium tracking-wide text-gray-100 truncate text-md">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</p>
                    <div class="badge">
                        <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-800 bg-blue-50 rounded-full">{{auth()->user()->role}}</span>
                    </div>
                </div>
            </div>
            <div>
                <ul class="mt-2 leading-10">
                    <li class="relative inline-flex items-center w-full px-2 py-1 text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500">
                        <div class="flex-shrink-0 my-auto mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                        </div>
                        <div class="flex-auto my-1">
                            <span><a href="{{ route('Profile-show', ['username' => auth()->user()->username]) }}">My Profile</a></span>
                        </div>
                    </li>
                    @if (Gate::allows('AdminOrManager'))
                        <li class="relative inline-flex items-center w-full px-2 py-1 text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500">
                            <div class="flex-shrink-0 my-auto mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                </svg>
                            </div>
                            <div class="flex-auto my-1">
                                <span><a href="{{ route('controlpanel') }}">Control Panel</a></span>
                            </div>
                        </li>
                    @endif
                    <li class="relative inline-flex items-center w-full px-2 py-1 text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-red-500">
                        <div class="flex-shrink-0 my-auto mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <div class="flex-auto my-1">
                            <span><a href="{{ route('logout') }}">Sign Out</a></span>
                        </div>
                    </li>
                </ul>
            </div>
        @endauth
        <hr class="bg-gray-600">
        <div>
            <ul class="mt-6 leading-10">
                <li class="{{ 'home' == request()->is('home*') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
                    <div class="flex-shrink-0 my-auto mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <div class="flex-auto my-1">
                        <span><a href="{{ route('home') }}">Home</a></span>
                    </div>
                </li>
                <li class="{{ 'competitions' == request()->is('competitions*') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
                    <div class="flex-shrink-0 my-auto mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div class="flex-auto my-1">
                        <span><a href="{{ route('competitions-show') }}">Competitions</a></span>
                    </div>
                </li>
                <li class="{{ 'about' == request()->is('about') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
                    <div class="flex-shrink-0 my-auto mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-auto my-1">
                        <span><a href="{{ route('about') }}">About PCP</a></span>
                    </div>
                </li>
                @guest
                    <hr class="my-6 bg-gray-600">
                    <li class="{{ 'login' == request()->is('login') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
                        <div class="flex-shrink-0 my-auto mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <div class="flex-auto my-1">
                            <span><a href="{{ route('login') }}">{{ __('Login') }}</a></span>
                        </div>
                    </li>
                    <li class="{{ 'register' == request()->is('register') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
                        <div class="flex-shrink-0 my-auto mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="flex-auto my-1">
                            <span><a href="{{ route('register') }}">{{ __('Register') }}</a></span>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>

