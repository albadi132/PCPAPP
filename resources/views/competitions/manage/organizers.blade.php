@extends('competitions.manage')
  @section('manage')


    
        
  <table class="w-full">

    <tr class="bg-gray-800 text-white">
        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4  tracking-wider">Name</th>
        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4  tracking-wider" >email</th>
        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider"  >gender</th>
        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider"  >workplace</th>
        @can('AdminOrManger')
        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"  >Action</th>
        @endcan
    </tr>
    <tbody class="">
        @foreach ($contest->organizer as  $organizer)

        
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="pl-5 pr-3 whitespace-no-wrap text-left">
                <div>{{ $organizer->first_name .' '  .$organizer->last_name }}</div>
            </td>
            <td class="pl-5 pr-3 whitespace-no-wrap text-center">
                <div> {{$organizer->email}} </div>
            </td>
            <td class="pl-5 pr-3 whitespace-no-wrap text-center">
                <div> {{$organizer->gender}} </div>
            </td>
            <td class="pl-5 pr-3 whitespace-no-wrap text-center">
                <div> {{$organizer->workplace}} </div>
            </td>
            @can('AdminOrManger')
            <td class="pl-5 pr-3 whitespace-no-wrap text-center">
              <pcp-organizerdelate :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'" :organizer="'{{$organizer->id}}'"></pcp-organizerdelate>
            </td>
            @endcan

        </tr>
        @endforeach
                            </tbody>
</table>

  
@endsection