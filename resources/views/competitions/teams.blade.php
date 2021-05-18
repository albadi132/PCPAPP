@extends('competitions.layouts')
  @section('competition')
  
  <div id="app" class="relative ">
    @auth
    <div class="flex space-x-4 absolute top-0 right-0">
      @can('OrganizerOrAdmin', $contest->id)
      <pcp-participant :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'"></pcp-participant>
      @endcan
      @can('IAmCompetitor', $contest->id)
    <pcp-teammodal :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'"></pcp-teammodal>
    @endcan
    </div>
    @endauth
    
  </div>
  @endsection