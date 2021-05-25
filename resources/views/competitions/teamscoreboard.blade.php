@extends('competitions.layouts')
  @section('competition')
  
  <table class="min-w-max w-full table-auto">
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
          @if ($contest->participation == 'solo')
          <th class="py-3 px-6 text-left border border-green-800" >Competitor</th>
@else
<th class="py-3 px-6 text-left border border-green-800 " >Team</th>
@endif
            @foreach($contest->problems as $problems)
            <th class="py-3 px-6 text-left border border-green-800" >{{$problems->name}}</th>
      @endforeach
            <th class="py-3 px-6 text-left items-left border border-green-800" >Score</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
      @foreach($contest->teams as $key=>$team)
        <tr class="border-b border-gray-200 hover:bg-gray-100">

            <td class="py-3 px-6 text-center whitespace-nowrap border border-green-800">
              
                <div class="flex items-left">
                    <span class="font-medium">{{$team->name }}</span>
                </div>
          
            </td>
            @foreach($contest->problems as $problems)
            <td class="py-3 px-6 text-left border border-green-800">
              <div class="flex items-center bg-green-400">
            @foreach($usersonteam[$key] as $user)
           
              @if (!is_null($score->where("problem_id" , $problems->id )->where("user_id" , $user->user_id )->first()))
              
                <span>Solved</span>
            
              @endif
            
            @endforeach
          </div>
        </td>
            @endforeach

            <td  class="py-3 px-6 text-left border border-green-800">
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