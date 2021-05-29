@extends('competitions.layouts')
  @section('competition')
 
  <div id="app" class="relative ">
    <pcp-competitor :participants="'{{ json_encode($AllCompetitor) }}'" :admin="'{{$admin}}'"></pcp-competitor>
  </div>
  
  @endsection