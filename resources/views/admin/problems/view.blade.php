@extends('admin.layouts.app')
@section('content')
<div class="w-full">
    <!-- trend author card -->
    <div class="flex flex-row justify-center w-full p-2 lg:p-4">
        <div class="w-full px-3 py-3 border-b-4 border-indigo-600 rounded-lg shadow-xl sm:w-1/2 2xl:w-1/3 md:px-5 md:py-4 bg-gradient-to-b from-indigo-400 to-indigo-100">
            <div class="flex flex-row items-center">
                <div class="flex-shrink">
                    <div class="p-1.5 md:p-2 bg-indigo-500 border border-white rounded-full ring ring-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" fill="currentColor" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
                <div class="mx-3 md:mx-5">
                    <div class="flex flex-row flex-wrap">
                        @if (!is_null($mostauthor))
                            <h4 class="text-sm font-semibold text-gray-900 whitespace-nowrap md:text-lg">{{ getUsername($mostauthor->author_id) }}</h4>
                            <h4 class="self-center ml-4 text-xs font-semibold text-gray-800 whitespace-nowrap md:text-sm">{{$mostauthor->count()}}/problem</h4>
                        @else
                            <h4 class="text-sm font-semibold text-red-700 whitespace-nowrap md:text-lg">No Authors Yet</h4>
                        @endif
                    </div>
                    <h3 class="text-gray-800 capitalize whitespace-nowrap">Top Author</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- /trend author card -->
    <div id="app" class="w-full">
        <pcp-cp-problem :problems="' {{addslashes(json_encode($problems))}} '" :time="'{{date('Y-m-d H:i:s')}}'"></pcp-cp-problem>
    </div>
</div>
@endsection
