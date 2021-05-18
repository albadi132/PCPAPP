@extends('competitions.layouts')
  @section('competition')
 
  <div id="app" class="relative ">
    @can('OrganizerOrAdmin', $contest->id)
    <div class="absolute top-0 right-0">
    <pcp-participant :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'"></pcp-participant>
    </div>
    @endcan
    <pcp-competitor :participants="'{{ json_encode($AllCompetitor) }}'" :admin="'{{$admin}}'"></pcp-competitor>
  </div>
  
  @endsection