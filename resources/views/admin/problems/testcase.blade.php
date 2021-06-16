@extends('admin.layouts.app')
@section('content')



<div id="app" >
  <div class="mx-auto max-w-full sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-xl  sm:rounded-lg">
  
      <div class="justify-self-end">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 absolute top-3 right-3 sm:relative sm:top-0 sm:right-0 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
        </svg>
        <h3 class="text-gray-600 capitalize text-base		"><a href="{{ route('problems-view') }}">programming problems -></a> {{$problems->name}} Test Case</h3>
        </div>
        <hr>

        <div
                                class="p-6 bg-white sm:px-20">
                              
                                <div class="mt-8 text-2xl "> Auto-judging system depends on test cases! </div>
                                <div class="mt-6 text-gray-500 "> Judging is done in whether the solution presented in this question is correct on the experience of variable 
                                  inputs and measuring their conformity with the expected outputs. Please note that in order for the question to be counted in the library, it must contain at least one
                                  test case.Also, the time required to carry out each test must be determined separately, so that the solution does not fall 
                                  into not end loop problem. Finally, it should be noted that the time for executing all tests does not exceed a minute (60 seconds) 
                                  in line with the HTTP Request waiting time, So that the request is not stopped before the tests are finished, and this can be changed from the PHP.ini settings, but we do not recommend that.

                                </div>
                                
                            </div>

  <div id="app"  class="p-6 bg-white  sm:px-20">
    <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
<div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4 items-center justify-center">
<div class="w-full lg:w-1/4">
<div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 ">
<div class="flex flex-row items-center justify-between">
<div class="flex flex-col">
   <div class="text-xs uppercase font-light text-gray-500">
       Total Test Case
   </div>
   <div class="text-xl font-bold">
       {{$problems->testcases->count()}}
   </div>
</div>

<svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
</svg>
</div>
</div>
</div>
<div class="w-full lg:w-1/4">
<div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 ">
<div class="flex flex-row items-center justify-between">
<div class="flex flex-col">
   <div class="text-xs uppercase font-light text-gray-500">
       Max Execut Time
   </div>
   <div class="text-xl font-bold">
    {{$executtime}}  seconds
   </div>
</div>

<svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
</div>
</div>
</div>


</div>
</div>
<pcp-cp-new-testcase :problem="' {{$problems->id}} '"></pcp-cp-new-testcase>

<br>

   <div  class="grid grid-cols-1 bg-white bg-opacity-25  md:grid-cols-3 " >
    @foreach ($problems->testcases as $testcase)
<div class="border border-gray-300 p-2 rounded-lg ">
  <div class="text-center mt-2 leading-none flex justify-between w-full">
    <span class=" mr-3 inline-flex items-center leading-none text-base font-bold py-1 "> 
Test Case {{ $loop->index + 1}} 
    </span> 
    <pcp-cp-testcase :problemid="' {{$problems->id}} '" :testcaseid="' {{$testcase->id}} '" :num="' {{$loop->index + 1}} '" :input="' {{addslashes(json_encode($testcase->input))}} '" :output="' {{addslashes(json_encode($testcase->output))}} '" :timelimit="' {{addslashes(json_encode($testcase->timelimit))}} '" :hi="' hi '"></pcp-cp-testcase>
    </div>
    <h2 class="text-base title-font mb-2">System Input</h2>
<div class="text-sm bg-blue-50">{!! nl2br(e($testcase->input)) !!}</div>
<h2 class="text-base title-font mb-2">Expected Output</h2>
<div class="text-sm bg-blue-50 ">{!! nl2br(e($testcase->output)) !!}</div>

<div class="text-center mt-2 leading-none flex justify-between w-full">
<span class=" mr-3 inline-flex items-center leading-none text-sm  py-1 "> 
<svg class=" fill-current w-4 h-4 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>               
{{$testcase->timelimit / 60}} seconds
</span>
<span class=" inline-flex items-center leading-none text-sm">


<div class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                
               </div>
<div class="w-4 mr-2 transform hover:text-red-400 hover:scale-110">
      
               </div>
</span>
</div>

</div>

@endforeach
</div>



   

</div>

    </div>
  </div>
</div>

@endsection
