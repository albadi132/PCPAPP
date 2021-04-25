<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PCP</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{asset('js/app.js')}}" defer></script>
         
<style>
   /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
      @apply: right-0 border-green-400;
      right: 0;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    }  
    
    li>ul                 { transform: translatex(100%) scale(0) }
    li:hover>ul           { transform: translatex(101%) scale(1) }
    li > button svg       { transform: rotate(-90deg) }
    li:hover > button svg { transform: rotate(-270deg) }
    .group:hover .group-hover\:scale-100 { transform: scale(1) }
    .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
    .scale-0 { transform: scale(0) }
    .min-w-32 { min-width: 8rem }
  </style>

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    </head>
<body class="bg-gray-200">
  <header class="w-full bg-gray-800 p-4 flex justify-between items-center">
    <nav class="flex items-center">
      <img class="h-8 w-8" src="{{url('/images/logo.png')}}" alt="PCP">
    </nav>
  </header>
<div class="flex min-h-screen">
  <nav class="w-64 flex-shrink-0">
    <div class="flex-auto bg-gray-900 h-full">
      <div class="flex flex-col overflow-y-auto">
        <ul class="relative m-0 p-0 list-none h-full">
          <li class="text-white text-2xl p-4 w-full flex relative shadow-sm justify-start bg-gray-800 border-b-2 border-gray-700">
            Control Panel
          </li>
          <li class=" {{ 'controlpanel' == request()->path() ? 'text-green-400 ' : 'text-gray-400 ' }} p-4 w-full flex relative shadow-sm justify-start bg-gray-800 border-b-2 border-gray-700">
            <div class="mr-4 flex-shrink-0 my-auto">
              <svg class="fill-current w-5 h-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('controlpanel') }}">Platform Overview</a>
              </span>
            </div>
          </li>
          <li class="p-4 w-full flex relative shadow-sm">
            <div class="flex-auto my-1">
              <span class="text-white font-medium">system administrator</span>
            </div>
          </li>

          <div class="{{ 'controlpanel/authentication' == request()->is('controlpanel/authentication/*') ? 'text-green-400 ' : 'text-gray-400 ' }} flex relative px-4 hover:bg-gray-700 cursor-pointer">
            <div class="mr-4 my-auto">
              <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('authentication-users') }}">Authentication</a></span>
            </div>
          </div>

          <div class="{{ 'controlpanel/contests' == request()->is('controlpanel/contests*') ? 'text-green-400 ' : 'text-gray-400 ' }} flex relative px-4 hover:bg-gray-700 cursor-pointer">
            <div class="mr-4 my-auto">
              <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10H2V4.003C2 3.449 2.455 3 2.992 3h18.016A.99.99 0 0 1 22 4.003V10h-1v10.001a.996.996 0 0 1-.993.999H3.993A.996.996 0 0 1 3 20.001V10zm16 0H5v9h14v-9zM4 5v3h16V5H4zm5 7h6v2H9v-2z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('contests-view') }}">contests</a></span>
            </div>
          </div>

          <div class="{{ 'controlpanel/problems' == request()->is('controlpanel/problems/*') ? 'text-green-400 ' : 'text-gray-400 ' }} flex relative px-4 hover:bg-gray-700 cursor-pointer">
            <div class="mr-4 my-auto">
              <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M7.77 6.76L6.23 5.48.82 12l5.41 6.52 1.54-1.28L3.42 12l4.35-5.24zM7 13h2v-2H7v2zm10-2h-2v2h2v-2zm-6 2h2v-2h-2v2zm6.77-7.52l-1.54 1.28L20.58 12l-4.35 5.24 1.54 1.28L23.18 12l-5.41-6.52z"></path></svg>
            </div>
            <div class="flex-auto my-1">
              <span><a href="{{ route('problems-view') }}">programming problems</a></span>
            </div>
          </div>

        </ul>
      </div>
    </div>
  </nav>
  <div class="flex flex-col w-full">
  @yield('admin') 
  </div>
</div>
</body>
</html>