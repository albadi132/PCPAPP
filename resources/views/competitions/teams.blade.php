@extends('competitions.layouts')
@section('competition')
<div id="app" class="relative w-full">
    @auth
        <div class="absolute top-0 right-0 flex space-x-4">
            @can('OrganizerOrAdmin', $contest->id)
                <pcp-participant :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'"></pcp-participant>
            @endcan
            @can('IAmCompetitor', $contest->id)
                <pcp-teammodal :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'" :ihaveteam="'{{$ihaveteam}}'"></pcp-teammodal>
            @endcan
        </div>
    @endauth
    <pcp-teamstable :teamwithuser="'{{ json_encode($teamwithuser) }}'" :urlname="'{{NameToUrl($contest->name)}}'" :contest="'{{ $contest->id }}'" :admin="'{{$admin}}'" :myuser="'{{$myuser->username}}'" :actuion="'{{$actuion}}'"  :ihaveteam="'{{$ihaveteam}}'"></pcp-teamstable>
</div>
@endsection
