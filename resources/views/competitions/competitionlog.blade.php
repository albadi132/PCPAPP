@extends('competitions.layouts')
  @section('competition')

  <!-- top -->
  <div class="w-full flex flex-col lg:space-y-0 space-y-5 lg:flex-row lg:items-center justify-between bg-white p-3">
    <div>
        <h3 class="font-bold tracking-wide text-5xl mb-2 text-gray-700">
            Product Manager
        </h3>
        <div class="md:space-x-5 md:space-y-0 space-y-1 px-2 flex md:flex-row flex-col">
            <span class="inline-flex text-gray-500 space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M12.23 15.5c-6.801 0-10.367-1.221-12.23-2.597v9.097h24v-8.949c-3.218 2.221-9.422 2.449-11.77 2.449zm1.77 2.532c0 1.087-.896 1.968-2 1.968s-2-.881-2-1.968v-1.032h4v1.032zm-14-8.541v-2.491h24v2.605c0 5.289-24 5.133-24-.114zm9-7.491c-1.104 0-2 .896-2 2v2h2v-1.5c0-.276.224-.5.5-.5h5c.276 0 .5.224.5.5v1.5h2v-2c0-1.104-.896-2-2-2h-6z"/></svg>
                <span>Full-time</span>
            </span>
            <span class="inline-flex text-gray-500 space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                <span>Remote</span>
            </span>
            <span class="inline-flex text-gray-500 space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 16.947v1.053h-1v-.998c-1.035-.018-2.106-.265-3-.727l.455-1.644c.956.371 2.229.765 3.225.54 1.149-.26 1.384-1.442.114-2.011-.931-.434-3.778-.805-3.778-3.243 0-1.363 1.039-2.583 2.984-2.85v-1.067h1v1.018c.724.019 1.536.145 2.442.42l-.362 1.647c-.768-.27-1.617-.515-2.443-.465-1.489.087-1.62 1.376-.581 1.916 1.712.805 3.944 1.402 3.944 3.547.002 1.718-1.343 2.632-3 2.864z"/></svg>
                <span>$120k &ndash; $140k</span>
            </span>
            <span class="inline-flex text-gray-500 space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                <span>Closing on January 9, 2020</span>
            </span>
        </div>
    </div>
    <div class="flex space-x-3">
        <button class="md:flex hidden items-center text-gray-500 space-x-2 border border-gray-400 px-4 py-1.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M19.769 9.923l-12.642 12.639-7.127 1.438 1.438-7.128 12.641-12.64 5.69 5.691zm1.414-1.414l2.817-2.82-5.691-5.689-2.816 2.817 5.69 5.692z"/></svg>
            <span class="uppercase text-sm font-semibold">Edit</span>
        </button>
        <button class="md:flex hidden items-center text-gray-500 space-x-2 border border-gray-400 px-4 py-1.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M6.188 8.719c.439-.439.926-.801 1.444-1.087 2.887-1.591 6.589-.745 8.445 2.069l-2.246 2.245c-.644-1.469-2.243-2.305-3.834-1.949-.599.134-1.168.433-1.633.898l-4.304 4.306c-1.307 1.307-1.307 3.433 0 4.74 1.307 1.307 3.433 1.307 4.74 0l1.327-1.327c1.207.479 2.501.67 3.779.575l-2.929 2.929c-2.511 2.511-6.582 2.511-9.093 0s-2.511-6.582 0-9.093l4.304-4.306zm6.836-6.836l-2.929 2.929c1.277-.096 2.572.096 3.779.574l1.326-1.326c1.307-1.307 3.433-1.307 4.74 0 1.307 1.307 1.307 3.433 0 4.74l-4.305 4.305c-1.311 1.311-3.44 1.3-4.74 0-.303-.303-.564-.68-.727-1.051l-2.246 2.245c.236.358.481.667.796.982.812.812 1.846 1.417 3.036 1.704 1.542.371 3.194.166 4.613-.617.518-.286 1.005-.648 1.444-1.087l4.304-4.305c2.512-2.511 2.512-6.582.001-9.093-2.511-2.51-6.581-2.51-9.092 0z"/></svg>
            <span class="uppercase text-sm font-semibold">View</span>
        </button>
        <button class="flex items-center text-white space-x-1.5 px-4 py-1.5 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-600">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="uppercase text-sm font-semibold">publish</span>
        </button>
        <div class="relative">
            <button class="flex md:hidden items-center text-gray-500 space-x-2 border border-gray-400 px-4 py-1.5 rounded-lg hover:bg-gray-100 focus:outline-none">
                <span class="uppercase text-sm font-semibold">More</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>
            </button>
            <div class="absolute bg-white shadow-xl w-36 top-full right-0 rounded-lg overflow-hidden">
                <a href="#" class="flex md:hidden items-center text-gray-500 space-x-2 px-4 py-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M19.769 9.923l-12.642 12.639-7.127 1.438 1.438-7.128 12.641-12.64 5.69 5.691zm1.414-1.414l2.817-2.82-5.691-5.689-2.816 2.817 5.69 5.692z"/></svg>
                    <span class="uppercase text-sm font-semibold">Edit</span>
                </a>
                <a href="#" class="flex md:hidden items-center text-gray-500 space-x-2 px-4 py-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M6.188 8.719c.439-.439.926-.801 1.444-1.087 2.887-1.591 6.589-.745 8.445 2.069l-2.246 2.245c-.644-1.469-2.243-2.305-3.834-1.949-.599.134-1.168.433-1.633.898l-4.304 4.306c-1.307 1.307-1.307 3.433 0 4.74 1.307 1.307 3.433 1.307 4.74 0l1.327-1.327c1.207.479 2.501.67 3.779.575l-2.929 2.929c-2.511 2.511-6.582 2.511-9.093 0s-2.511-6.582 0-9.093l4.304-4.306zm6.836-6.836l-2.929 2.929c1.277-.096 2.572.096 3.779.574l1.326-1.326c1.307-1.307 3.433-1.307 4.74 0 1.307 1.307 1.307 3.433 0 4.74l-4.305 4.305c-1.311 1.311-3.44 1.3-4.74 0-.303-.303-.564-.68-.727-1.051l-2.246 2.245c.236.358.481.667.796.982.812.812 1.846 1.417 3.036 1.704 1.542.371 3.194.166 4.613-.617.518-.286 1.005-.648 1.444-1.087l4.304-4.305c2.512-2.511 2.512-6.582.001-9.093-2.511-2.51-6.581-2.51-9.092 0z"/></svg>
                    <span class="uppercase text-sm font-semibold">View</span>
                </a>
            </div>
        </div>
    </div>
    
</div>

<!-- me -->
  <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                          Points
                        </div>
                        <div class="text-xl font-bold">
                          0
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                          Difficulty
                        </div>
                        <div class="text-xl font-bold">
                          Hard
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M12 14l9-5-9-5-9 5 9 5z" />
                      <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                          Total attempts
                        </div>
                        <div class="text-xl font-bold">
                            0
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                          Ccorrect Submission
                        </div>
                        <div class="text-xl font-bold">
                           0
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
          <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
              <div class="flex flex-row items-center justify-between">
                  <div class="flex flex-col">
                      <div class="text-xs uppercase font-light text-gray-500">
                        Ccorrect Submission
                      </div>
                      <div class="text-xl font-bold">
                         0
                      </div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                  </svg>
              </div>
          </div>
      </div>
    </div>
</div>


<div class="container mx-auto py-10 flex justify-center h-screen">
<div class="w-full pl-4  h-full flex flex-col">
  <div class="bg-white text-sm text-gray-500 font-bold px-5 py-2 shadow border-b border-gray-300">
      Tracking events
  </div>
  
  <div class="w-full h-full overflow-auto shadow bg-white" id="journal-scroll">

  <table class="w-full">


      <tbody class="">
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              bg-blue-500 bg-opacity-25">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">Today</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              bg-blue-500 bg-opacity-25">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">Today</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                                  <tr class="relative transform scale-100
                      text-xs py-1 border-b-2 border-blue-100 cursor-default

              ">
              <td class="pl-5 pr-3 whitespace-no-wrap">
                  <div class="text-gray-400">24 jule</div>
                  <div>07:45</div>
              </td>

              <td class="px-2 py-2 whitespace-no-wrap">
                  <div class="leading-5 text-gray-500 font-medium">Taylor Otwel</div>
                  <div class="leading-5 text-gray-900">Create pull request #1213
                      <a class="text-blue-500 hover:underline" href="#">#231231</a></div>
                  <div class="leading-5 text-gray-800">Hello message</div>
              </td>

          </tr>
                              </tbody>
  </table>
  </div>
  
</div>
</div>


  @endsection