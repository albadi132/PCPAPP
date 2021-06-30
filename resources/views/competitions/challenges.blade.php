@extends('competitions.layouts')
@section('competition')
<div id="app" class="w-full">
    <pcp-problems :problems="'{{ json_encode($AllProblem) }}'"></pcp-problems>
</div>
@endsection
