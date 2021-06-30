@extends('competitions.layouts')
@section('competition')
<div class="w-full">
    <div class="w-full py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col w-full mb-2 space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0 lg:mb-4">
            <div class="w-full lg:w-1/4">
                <div class="w-full p-4 bg-white border border-gray-100 rounded-lg widget dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs font-light text-gray-500 uppercase">
                                Points
                            </div>
                            <div class="text-xl font-bold">
                                {{$problem->points}}
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="w-full p-4 bg-white border border-gray-100 rounded-lg widget dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs font-light text-gray-500 uppercase">
                                Difficulty
                            </div>
                            <div class="text-xl font-bold">
                                @if ($problem->points >= 200)
                                    Hard
                                @elseif (($problem->points < 200) && ($problem->points >= 100))
                                    Medium
                                @else
                                    Easy
                                @endif
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="w-full p-4 bg-white border border-gray-100 rounded-lg widget dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs font-light text-gray-500 uppercase">
                                Total attempts
                            </div>
                            <div class="text-xl font-bold">
                                {{$contest->submissionlog->count()}}
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="w-full p-4 bg-white border border-gray-100 rounded-lg widget dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs font-light text-gray-500 uppercase">
                                Ccorrect Submission
                            </div>
                            <div class="text-xl font-bold">
                                {{$contest->submissionlog->where('result','pass')->count()}}
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ///// -->
    <div class="h-full bg-gray-50 md:h-screen">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-8 xxl:col-span-8">
                <div class="px-4 py-4 mx-4 my-4 bg-white rounded-lg shadow-sm">
                    <h1 class="mb-5 text-2xl text-gray-700">{{$problem->name}}</h1>
                    <h3 class="mb-5 text-gray-500 text-1xl">{{$problem->description}}</h3>
                    <h3 class="mb-5 text-gray-500 text-1xl">You can download the question from here: </h3>
                    <a class="text-blue-600 hover:underline" href="{{url('contests/library/'.$problem->file)}}">Question File</a>
                </div>
                <div class="px-4 py-4 mx-4 my-4 bg-white rounded-lg shadow-sm">
                    <div class="bg-white">
                        @can('QuestionIsSolved', [$contest, $problem->id])
                            <div class="px-5 py-3 mb-4 text-sm text-green-900 bg-green-100 border border-green-200 rounded-md" role="alert">
                                This question has been solved
                            </div>
                        @else
                            <h1 class="mb-5 text-2xl text-gray-700">Submission</h1>
                            <h3 class="mb-5 text-gray-500 text-1xl">Upload your program with input file and specifying the programming language.</h3>
                            <br>
                            <form action="{{route('JudgeSystem', ['name' => NameToUrl($contest->name) , 'problem' => NameToUrl($problem->name) ] )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3 class="text-gray-500 text-1xl ">Select Language:</h3>
                                <div class="relative inline-block w-full text-gray-700">
                                    <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Select Language" name="language">
                                        @foreach($contest->languages as $language)
                                            <option value="{{ $language->id }}" >{{ $language->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    @error('language')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <h3 class="text-gray-500 text-1xl ">Upload your code:</h3>
                                <input id="code" name="code" type="file" class="w-11/12 p-2 focus:outline-none focus:text-gray-600"/>
                                <br>
                                @error('code')
                                    <p class="mt-4 text-xs italic text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                                @foreach (['danger', 'success'] as $msg)
                                    @if(Session::has('judge-' . $msg))
                                        <div class="{{ $msg == 'danger' ? 'bg-red-100 border border-red-400 text-red-700' : 'bg-green-100 border border-green-400 text-green-700' }}  px-4 py-3 rounded relative" role="alert">
                                            <span class="block sm:inline">{{Session::get('judge-' . $msg)}}</span>
                                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="w-full p-4 text-right text-gray-500">
                                    <button type="submit" class="inline-flex items-center mr-4 focus:outline-none">
                                        SUBMET
                                    </button>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-4 xxl:col-span-4">
                <div class="px-4 py-4 mx-4 my-4 bg-white rounded-lg shadow-sm">
                    <div class="flex justify-between mb-2">
                        <div>
                            <div class="flex items-center justify-center text-center">
                                <div class="text-lg font-semibold">
                                    <p  class="py-2 text-lg" >Supported languages</p>
                                    @if ($contest->languages->first())
                                        @foreach($contest->languages as $language)
                                            <div class="flex flex-row items-center w-full space-x-2 text-base text-gray-500 rounded-lg text-1xl">
                                                <div class="flex-shrink-0 w-5 h-5">
                                                    <img class="w-5 h-5 rounded-full" src="{{url('/Programminglanguages/'.$language->dir.'/'.$language->logo)}}" alt="">
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
                </div>
                <div class="px-4 py-4 mx-4 my-4 bg-white rounded-lg shadow-sm">
                    <!-- Total Price -->
                    <div class="flex items-center justify-center text-center">
                        <div>
                            @if ($contest->participation  == 'solo')
                                <h2 class="text-xl font-semibold">FIRST 3 ANSWERS</h2>
                                <h3 class="text-gray-500 text-1xl" > List of top 3 members who were the first to submit correct program for this challenge</h3>
                                <br>
                                <div class="flex flex-col gap-6 m-auto">
                                    @foreach ($top3 as $n=>$top)
                                        <div class="
                                            @if($n == 0)
                                                border-yellow-300  text-yellow-400 hover:bg-yellow-300 hover:text-yellow-100
                                            @elseif($n == 1)
                                                border-gray-300  text-gray-400 hover:bg-gray-300 hover:text-gray-100
                                            @else
                                                border-yellow-600  text-yellow-700 hover:bg-yellow-600 hover:text-yellow-500
                                            @endif
                                            border-2  rounded-lg px-3 py-2">
                                            {{getUsername($top->user_id)}}
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h2 class="text-xl font-semibold">FIRST 3 ANSWERS</h2>
                                <h3 class="text-gray-500 text-1xl" > List of top 3 teams who were the first to submit correct program for this challenge</h3>
                                <br>
                                <div class="flex flex-col gap-6 m-auto">
                                    @foreach ($top3 as $n=>$top)
                                        <div class="
                                            @if($n == 0)
                                                border-yellow-300  text-yellow-400 hover:bg-yellow-300 hover:text-yellow-100
                                            @elseif($n == 1)
                                                border-gray-300  text-gray-400 hover:bg-gray-300 hover:text-gray-100
                                            @else
                                                border-yellow-600  text-yellow-700 hover:bg-yellow-600 hover:text-yellow-500
                                            @endif
                                            border-2  rounded-lg px-3 py-2">
                                            {{getMyTeamName($contest->id,$top->user_id)}}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- End Total PRice -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
