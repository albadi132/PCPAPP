@extends('competitions.layouts')
  @section('competition')
 
  <div id="app" class="relative ">
    <pcp-competitor :participants="'{{ json_encode($AllCompetitor) }}'" ></pcp-competitor>
  </div>
  
  @endsection