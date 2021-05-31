@extends('competitions.layouts')
  @section('competition')
  
<div class="space-y-16">
            <div>
                <div class="h-48 w-full bg-cover bg-black" style="background-image:url({{url('contests/profile/'.$contest->profile)}})">
        
                </div>
                <div class="px-6 md:px-32 flex justify-between lg:flex-row flex-col">
                    <div class="flex lg:flex-row flex-col">
                        <div class="w-36 h-36 bg-white bg-cover rounded-full bg-center absolute transform -translate-y-1/2 ring-4 ring-white" style="background-image:url({{url('contests/images/'.$contest->logo)}})"></div>
                        <p class="lg:ml-36 mt-16 lg:mt-0 pl-4 text-3xl font-semibold py-5">
                            <div>
                                <h3 class="font-bold tracking-wide text-3xl mb-2 text-gray-700">
                                   {{$contest->name}}
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

 
                </div>
            </div>
            
            <!-- ///// -->

            <div class="bg-gray-50 h-full md:h-screen">
                <div class="grid grid-cols-12 gap-6">
                  <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-8 xxl:col-span-8">
                    <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                        
                                <h1 class="text-2xl text-gray-700 mb-5">Description</h1>
                                <h3 class="text-1xl text-gray-500 mb-5">{{$contest->description}}
                                </h3>
                    </div>
                    @if (!is_null($contest->conditions))
                    <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                    <h1 class="text-2xl text-gray-700 mb-5">Conditions</h1>
                    <h3 class="text-1xl text-gray-500 mb-5">
                      {{$contest->conditions}}
                    </h3>
                  </div>
                    @endif
                    
                    @if (!is_null($contest->prizes))
            <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                        
                <h1 class="text-2xl text-gray-700 mb-5">Prizes</h1>
                <h3 class="text-1xl text-gray-500 mb-5">{{$contest->prizes}}
                </h3>
    </div>
    @endif
                  </div>
                  <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-4 xxl:col-span-4">
                    <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">

                  <div class="flex justify-between border-b-2 mb-2">
                    <div class="text-lg py-2"> 
                      <div class="flex justify-center items-center text-center">
                        <div> 
                          <p class="text-lg font-semibold" >Supported languages</p>
                          @if($contest->languages->first())
                          @foreach($contest->languages as $language)
                          <div class=" text-base flex flex-row space-x-2 w-full items-center rounded-lg text-gray-500 text-1xl ">
                            <div class="flex-shrink-0 h-5 w-5">
                              <img class="h-5 w-5 rounded-full"
                                  src="{{url('/Programminglanguages/'.$language->dir.'/'.$language->logo)}}"
                                  alt="">
                          </div>
                            <p>{{$language->name}}</p>
                          </div> 
                          @endforeach 
                          @else
                          No programming languages ​​supported for this competition yet
                          @endif
                          
                        </div>
                        
                  </div>
                    </div>

              </div>
                       
                        <div class="flex justify-between border-b-2 mb-2">
                              <div class="text-lg py-2"> 
                                <p>Start</p>
                              </div>
                               <div class="text-lg py-2"> 
                               <div class="flex flex-row space-x-2 w-full items-center rounded-lg">
    <p>{{$contest->starting_date}}</p>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
    </svg>
                                </div>
                              </div>
                        </div>
                       
                        <div class="flex justify-between border-b-2 mb-2">
                              <div class="text-lg py-2"> 
                                <p>End</p>
                              </div>
                               <div class="text-lg py-2"> 
                               <div class="flex flex-row space-x-2 w-full items-center rounded-lg">
 <p>{{$contest->ending_date}}</p>
 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
</svg>

                                </div>
                              </div>
                        </div>

              
  
              
                      
                        <div class="flex justify-center items-center text-center">
                              <div class="text-xl font-semibold"> 
                                <p>Total Participants</p>
                                <p class="text-5xl">{{$contest->competitor->count()}}</p>
                              </div>
                        </div>
                      
                        
                    </div>
                     <div class="bg-white py-4 px-4 shadow-sm rounded-lg my-4 mx-4">
                    
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
                                
                            
                            @if ( $contest->type == 'private')
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
                            @if ($sub)
                            <a href="{{route('unsubscribe', ['name' => NameToUrl($contest->name) , 'id' => $contest->id] )}}"   class=" border-green-400 text-white bg-green-300 hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                              </span>
                              <span>
                                Unsubscribed
                              </span>
                            </a>
                                
                            @else
                            <a href="{{route('subscribe', ['name' => NameToUrl($contest->name) , 'id' => $contest->id] )}}" class=" border-green-400 text-green-400 bg-green-50 hover:bg-green-400 hover:text-white hover:border-white border-2  px-4 py-2 text-lg font-semibold tracking-wider  inline-flex items-center space-x-2 rounded">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                              </span>
                              <span>
                                Subscribe
                              </span>
                            </a>
                                
                            @endif
                            @endauth
                        


                            @endif
                            @endif
      
                          </div>
                        </div>
                       
                     </div>
                  </div>
                </div>
              </div>

            <!-- ///// -->
            
</div>
      
  @endsection