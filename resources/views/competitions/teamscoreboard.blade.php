@extends('competitions.layouts')
@section('competition')
<table class="w-full table-auto min-w-max">
    <thead>
        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
            @if ($contest->participation == 'solo')
                <th class="px-6 py-3 text-left border border-green-800" >Competitor</th>
            @else
               <th class="px-6 py-3 text-left border border-green-800 " >Team</th>
            @endif
            @foreach($contest->problems as $problems)
                <th class="px-6 py-3 text-left border border-green-800" >{{$problems->name}}</th>
            @endforeach
                <th class="px-6 py-3 text-left border border-green-800 items-left" >Score</th>
        </tr>
    </thead>
    <tbody class="text-sm font-light text-gray-600">
        @foreach($contest->teams as $key=>$team)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="px-6 py-3 text-center border border-green-800 whitespace-nowrap">
                    <div class="flex items-left">
                        <span class="font-medium">{{$team->name }}</span>
                    </div>
                </td>
                @foreach($contest->problems as $problems)
                    <td class="px-6 py-3 text-left border border-green-800">
                        <div class="flex items-center bg-green-400">
                            @foreach($usersonteam[$key] as $user)
                                @if (!is_null($score->where("problem_id" , $problems->id )->where("user_id" , $user->user_id )->first()))
                                    <span>Solved</span>
                                @endif
                            @endforeach
                        </div>
                    </td>
                @endforeach
                <td  class="px-6 py-3 text-left border border-green-800">
                    <div class="flex items-left">
                        <span class="font-medium ">
                            {{teamscore($usersonteam[$key] , $score )}}
                        </span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
