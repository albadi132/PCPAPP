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
        @foreach($contest->competitor as $competitor)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="px-6 py-3 text-center border border-green-800 whitespace-nowrap">
                    <div class="flex items-left">
                        <span class="font-medium">{{$competitor->first_name . ' ' .$competitor->last_name }}</span>
                    </div>
                </td>
                @foreach($contest->problems as $problems)
                    <td class="px-6 py-3 text-left border border-green-800">
                        @if (!is_null($score->where("problem_id" , $problems->id )->where("user_id" , $competitor->id )->first()))
                            <div class="flex items-center bg-green-400">
                                <span>Solved</span>
                            </div>
                        @else
                            <div class="flex items-center bg-green-400">
                                <span></span>
                            </div>
                        @endif
                    </td>
                @endforeach
                <td  class="px-6 py-3 text-left border border-green-800">
                    <div class="flex items-left">
                        <span class="font-medium ">{{$score->where("user_id" , $competitor->id )->sum('points')}}</span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
