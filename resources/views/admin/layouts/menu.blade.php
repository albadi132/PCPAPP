<div>
    <div class="text-white">
      <div class="flex p-2 bg-bluegray-800">
        <div class="flex items-center px-2 py-3">
          <p class="text-2xl font-semibold text-green-500 uppercase">pcp</p>
          <p class="ml-2 font-semibold uppercase font-italic">control panel</p>
        </div>
      </div>
      
      <div class="flex items-center pl-2 h-20 border-b border-gray-800">
        <img src="{{url('/images/avatar') .'/'. auth()->user()->avatar }}"  alt="" class="rounded-full h-12 w-12 flex items-center justify-center mr-3 border-2 border-green-500">
        <div class="ml-1">
            <p class="ml-1 text-md font-medium tracking-wide truncate text-gray-100 font-sans">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</p>
            <div class="badge">
                   <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-800 bg-blue-50 rounded-full">{{auth()->user()->role}}</span>
            </div>
        </div>
    </div>
    <hr class="bg-gray-600">
      <div>
        <ul class="mt-6 leading-10">
          <li class="{{ 'controlpanel' == request()->path() ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
            <div class="mr-4 flex-shrink-0 my-auto">
              <svg class="fill-current w-5 h-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('controlpanel') }}">Platform Overview</a>
              </span>
            </div>
          </li>
          <li class="{{ 'controlpanel/authentication' == request()->is('controlpanel/authentication*') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
            <div class="mr-4 my-auto">
              <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('authentication-users') }}">Authentication</a></span>
            </div>
          </li>

          <li class="{{ 'controlpanel/contests' == request()->is('controlpanel/contests*') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
            <div class="mr-4 my-auto">
              <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10H2V4.003C2 3.449 2.455 3 2.992 3h18.016A.99.99 0 0 1 22 4.003V10h-1v10.001a.996.996 0 0 1-.993.999H3.993A.996.996 0 0 1 3 20.001V10zm16 0H5v9h14v-9zM4 5v3h16V5H4zm5 7h6v2H9v-2z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('contests-view') }}">contests</a></span>
            </div>
          </li>

          <li class="{{ 'controlpanel/problems' == request()->is('controlpanel/problems*') ? 'text-green-500 ' : 'text-white cursor-pointer transition-colors duration-150 hover:text-green-500 ' }} relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold">
            <div class="mr-4 my-auto">
              <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M7.77 6.76L6.23 5.48.82 12l5.41 6.52 1.54-1.28L3.42 12l4.35-5.24zM7 13h2v-2H7v2zm10-2h-2v2h2v-2zm-6 2h2v-2h-2v2zm6.77-7.52l-1.54 1.28L20.58 12l-4.35 5.24 1.54 1.28L23.18 12l-5.41-6.52z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('problems-view') }}">programming problems</a></span>
            </div>
          </li>
          <li class=" relative px-2 py-1 inline-flex items-center w-full text-sm font-semibold text-white cursor-pointer transition-colors duration-150 hover:text-red-500">
            
              <div class="mr-4 my-auto text-red-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
              </div>
              <span><a href="{{ route('home') }}">Logout</a></span>
            
            </li>
        </ul>
      </div>
    </div>
</div>

