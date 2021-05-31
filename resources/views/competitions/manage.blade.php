@extends('competitions.layouts')
  @section('competition')

  <!-- top -->
  <div id='app'>
  <div class="w-full flex flex-col lg:space-y-0 space-y-5 lg:flex-row lg:items-center justify-between bg-white p-3">
    <div>
        <h3 class="font-bold tracking-wide text-5xl mb-2 text-gray-700">
           {{$contest->name}}
        </h3>
        <div class="md:space-x-5 md:space-y-0 space-y-1 px-2 flex md:flex-row flex-col">
            <span class="inline-flex text-gray-500 space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                <span>{{$time}}</span>
            </span>
        </div>
    </div>
    <div class="flex space-x-3">
        <pcp-participant :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'"></pcp-participant>
        @can('AdminOrManger')
        <pcp-organizer :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'"></pcp-organizer>
        @endcan
        <pcp-manualjudge :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'" :problems="'{{ json_encode($contest->problems) }}'" :languages="'{{ json_encode($contest->languages) }}'" :competitor="'{{ json_encode($contest->competitor) }}'"></pcp-manualjudge>
        
        
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
                            Submission Attempts
                        </div>
                        <div class="text-xl font-bold">
                          {{$contest->submissionlog->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                      </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                         Correct Attempts
                        </div>
                        <div class="text-xl font-bold">
                          {{$contest->submissionlog->where('result' , 'pass')->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                      </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                         Participants Number
                        </div>
                        <div class="text-xl font-bold">
                            {{$contest->competitor->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                        Teams Number
                        </div>
                        <div class="text-xl font-bold">
                            {{$contest->teams->count()}}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
          <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
              <div class="flex flex-row items-center justify-between">
                  <div class="flex flex-col">
                      <div class="text-xs uppercase font-light text-gray-500">
                        Challenges Number
                      </div>
                      <div class="text-xl font-bold">
                        {{$contest->problems->count()}}
                      </div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current text-gray-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                  </svg>
              </div>
          </div>
      </div>
    </div>
</div>


<div class="container mx-auto py-10 flex justify-center h-screen">
    <div class="w-full pl-4  h-full flex flex-col">
        <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
            <div class="mb-2 sm:mb-0 inner">
          
              <a href="/home" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">{{$tablename}}</a><br>
              <span class="text-xs text-grey-dark">{{$tabledesc}}</span>
          
            </div>
          
            <div class="sm:mb-0 self-center">
              <a href="{{route('competition-manage', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/mange' == request()->is('competition/'.NameToUrl($contest->name).'/mange') ? ' text-green-500 ' : ' text-black ' }} text-md no-underline  hover:text-blue-dark ml-2 px-1">Submission Log</a>
              <a href="{{route('competition-manage-participants', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/mange/participants' == request()->is('competition/'.NameToUrl($contest->name).'/mange/participants') ? ' text-green-500' : ' text-black ' }} text-md no-underline  hover:text-blue-dark ml-2 px-1">Participants</a>
              <a href="{{route('competition-manage-organizers', ['name' => NameToUrl($contest->name) ])}}" class=" {{ 'competition/'.NameToUrl($contest->name).'/mange/organizers' == request()->is('competition/'.NameToUrl($contest->name).'/mange/organizers') ? ' text-green-500 ' : ' text-black ' }} text-md no-underline  hover:text-blue-dark ml-2 px-1">Organizers</a>
              
            </div>
          </nav>
      
      <div class="w-full h-full overflow-auto shadow bg-white" id="journal-scroll">

  @yield('manage')

</div>
  
</div>
</div>
</div>


  @endsection