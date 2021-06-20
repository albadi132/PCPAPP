@extends('competitions.manage')
  @section('manage')




  <table class="w-full">
    <tr class="text-white bg-gray-800">
        <th class="px-6 py-3 leading-4 tracking-wider text-left border-b-2 border-gray-300">Name Problem</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-center border-b-2 border-gray-300" >Point</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-center border-b-2 border-gray-300"  >Difficulty</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300"  >Action</th>
       
    </tr>
    <tbody class="">
        @foreach ($contest->problems as  $problem)


                                <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="pl-5 pr-3 text-left whitespace-no-wrap">
                <div>{{ $problem->name}}</div>
            </td>
            <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                <div> {{$problem->points}} </div>
            </td>
            <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                @if ($problem->points >= 200)
                <div class="text-red-400"> Hard </div>
                @elseif (($problem->points < 200 ) && ($problem->points >= 100))
                <div class="text-yellow-400"> Medium </div>
                @else
                <div class="text-green-400">Easy</div>
                @endif
            </td>
            <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                <pcp-librarydelate :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'" :problem="'{{$problem->id}}'"></pcp-librarydelate>
            </td>
            

        </tr>
        @endforeach
                            </tbody>
</table>


@endsection
