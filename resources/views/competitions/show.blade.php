@extends('competitions.layouts')
  @section('competition')
  
<div class="space-y-16">
            <div>
                <div class="h-48 w-full bg-cover bg-black" style="background-image:url({{url('contests/programming-code.jpg')}})">
        
                </div>
                <div class="px-6 md:px-32 flex justify-between lg:flex-row flex-col">
                    <div class="flex lg:flex-row flex-col">
                        <div class="w-36 h-36 bg-white bg-cover rounded-full bg-center absolute transform -translate-y-1/2 ring-4 ring-white" style="background-image:url({{url('contests/images/'.$contest[0]->logo)}})"></div>
                        <p class="lg:ml-36 mt-16 lg:mt-0 pl-4 text-3xl font-semibold py-5">
                            <div>
                                <h3 class="font-bold tracking-wide text-3xl mb-2 text-gray-700">
                                   {{$contest[0]->name}}
                                </h3>
                                <div class="md:space-x-5 md:space-y-0 space-y-1 px-2 flex md:flex-row flex-col">
                                    <span class="inline-flex text-gray-500 space-x-2 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                                        <span>online</span>
                                    </span>
                                    <span class="inline-flex text-gray-500 space-x-2 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                                        <span>{{$time}}</span>
                                    </span>
                                </div>
                            </div>
                        </p>
                    </div>
                    @can('OrganizerOrAdmin', $contest[0]->id)
                    <div class="py-5 lg:space-x-3 space-y-3 lg:space-y-0">
                      <div class="flex space-x-3">
                          <button class="md:flex hidden items-center text-gray-500 space-x-2 border border-gray-400 px-4 py-1.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
                              <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M19.769 9.923l-12.642 12.639-7.127 1.438 1.438-7.128 12.641-12.64 5.69 5.691zm1.414-1.414l2.817-2.82-5.691-5.689-2.816 2.817 5.69 5.692z"/></svg>
                              <span class="uppercase text-sm font-semibold">Edit</span>
                          </button>
                      </div>
                    </div>
                    @endcan

 
                </div>
            </div>
            
            <!-- ///// -->

            <div class="bg-gray-50 h-full md:h-screen">
                <div class="grid grid-cols-12 gap-6">
                  <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-8 xxl:col-span-8">
                    <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                        
                                <h1 class="text-2xl text-gray-700 mb-5">Description</h1>
                                <h3 class="text-1xl text-gray-500 mb-5">{{$contest[0]->description}}
                                </h3>
                    </div>
                    <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                        
                        <h1 class="text-2xl text-gray-700 mb-5">Conditions</h1>
                        <h3 class="text-1xl text-gray-500 mb-5">Rules concerning the platform are included.
                            <br>
                            - Sharing the flags between different teams is prohibited.
                            <br>
                            - Brute Force attacks on the challenges submission portal or challenges links are not allowed.
                            <br>
                            - Any attack against the site or the hosted servers will be observed and the player will be banned from participating in the CTF immediately.
                            <br>
                            - Organizers have the permission to disqualify teams for any unethical behavior or any trials to interrupt the CTF.
                        </h3>
            </div>
            <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                        
                <h1 class="text-2xl text-gray-700 mb-5">Prizes</h1>
                <h3 class="text-1xl text-gray-500 mb-5">The winning team will be Winner!!.
                </h3>
    </div>
                  </div>
                  <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-4 xxl:col-span-4">
                    <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">

                  <div class="flex justify-between border-b-2 mb-2">
                    <div class="text-lg py-2"> 
                      <div class="flex justify-center items-center text-center">
                        <div class="text-lg font-semibold"> 
                          <p>Supported languages</p>
                          <div class=" text-base flex flex-row space-x-2 w-full items-center rounded-lg">
                            <div class="flex-shrink-0 h-5 w-5">
                              <img class="h-5 w-5 rounded-full"
                              
                                  src="{{url('/Programminglanguages/C_plus_plus/logo.png') }}"
                                  alt="">
                          </div>
                            <p> C++</p>
                          </div>
                          <div class=" text-base flex flex-row space-x-2 w-full items-center rounded-lg">
                            <div class="flex-shrink-0 h-5 w-5">
                              <img class="h-5 w-5 rounded-full"
                              
                                  src="{{url('/Programminglanguages/python/logo.png') }}"
                                  alt="">
                          </div>
                            <p> Python</p>
                          </div>
                        </div>
                        
                  </div>
                    </div>

              </div>
                        <!-- classic add -->
                        <div class="flex justify-between border-b-2 mb-2">
                              <div class="text-lg py-2"> 
                                <p>Start</p>
                              </div>
                               <div class="text-lg py-2"> 
                               <div class="flex flex-row space-x-2 w-full items-center rounded-lg">
    <p>{{$contest[0]->starting_date}}</p>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
    </svg>
                                </div>
                              </div>
                        </div>
                        <!-- End classic add -->
              
                        <!-- standout ads -->
                        <div class="flex justify-between border-b-2 mb-2">
                              <div class="text-lg py-2"> 
                                <p>End</p>
                              </div>
                               <div class="text-lg py-2"> 
                               <div class="flex flex-row space-x-2 w-full items-center rounded-lg">
 <p>{{$contest[0]->ending_date}}</p>
 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
</svg>

                                </div>
                              </div>
                        </div>
                        <!-- End standout ads -->
              
  
              
                        <!-- Total Item -->
                        <div class="flex justify-center items-center text-center">
                              <div class="text-xl font-semibold"> 
                                <p>Total Participants</p>
                                <p class="text-5xl">0</p>
                              </div>
                        </div>
                        <!-- End Total Item -->
                        
                    </div>
                     <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                        <!-- Total Price -->
                        <div class="flex justify-center items-center text-center">
                          <div class="text-xl font-semibold"> 
                            @if ( ($time == 'closed') | ($time == 'started'))
                            <a class="border-green-400 text-green-400 bg-gray-600  outline-none focus:outline-none active:outline-none border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                              </span>
                              <span>
                                Subscription is Closed
                              </span>
                            </a>
                                
                            @else
                                
                            
                            @if ( $contest[0]->type == 'private')
                            <a class=" border-green-400 text-green-400 bg-gray-600  outline-none focus:outline-none active:outline-none border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                              </span>
                              <span>
                                Subscription is Private
                              </span>
                            </a>
                                
                            @else
                            @guest

                            <a href="{{ route('login') }}" class=" border-green-400 text-green-400 bg-green-50 hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded ">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                              </span>
                              <span>
                                Subscribe
                              </span>
                            </a>

                            @endguest
                            @auth
                            @if (1==1)
                            <button  class=" border-green-400 text-white bg-green-300 hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                              </span>
                              <span>
                                subscribed
                              </span>
                          </button>
                                
                            @else
                            <button class=" border-green-400 text-green-400 bg-green-50 hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                              </span>
                              <span>
                                Subscribe
                              </span>
                          </button>
                                
                            @endif
                            @endauth
                        


                            @endif
                            @endif
      
                          </div>
                        </div>
                        <!-- End Total PRice -->
                     </div>
                  </div>
                </div>
              </div>

            <!-- ///// -->
            
</div>
      
  @endsection