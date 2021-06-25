@extends('competitions.manage')
  @section('manage')




  <table class="w-full">

    <tr class="text-white bg-gray-800">
        <th class="px-6 py-3 leading-4 tracking-wider text-left border-b-2 border-gray-300">Name</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-center border-b-2 border-gray-300" >status</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300"  >Action</th>
       
    </tr>
    <tbody class="">
        @foreach ($contest->languages as  $lang)


                                <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="pl-5 pr-3 text-left whitespace-no-wrap">
                <div>{{ $lang->name}}</div>
            </td>
            <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                @if ($lang->status === '0')
                    
                <div class="text-red-400"> Not Active </div>
                @else
                    
                <div class="text-green-400">Active</div>
                @endif
            </td>
            <td class="pl-5 pr-3 text-center whitespace-no-wrap">
              <pcp-languagedelate :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'" :language="'{{$lang->id}}'"></pcp-languagedelate>
            </td>
           

        </tr>
        @endforeach
                            </tbody>
</table>


@endsection
