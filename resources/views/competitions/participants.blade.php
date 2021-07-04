@extends('competitions.layouts')
@section('competition')
<div id="app" class="relative w-full">
    <pcp-competitor :participants="'{{ addslashes(json_encode($AllCompetitor)) }}'" ></pcp-competitor>
</div>
@endsection
