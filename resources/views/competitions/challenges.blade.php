@extends('competitions.layouts')
@section('competition')
<div id="app" class="w-full">
    @if($massge == 'show' )
    <pcp-problems :problems="'{{ addslashes(json_encode($AllProblem)) }}'"></pcp-problems>
    @else
    <div class="flex items-center text-center px-6 py-4 mx-2 my-4 text-lg bg-red-200 rounded-md w-fullxl:w-2/4">
        <span class="text-red-800">  {{$massge}} </span>
    </div>
    @endif
</div>
@endsection
