@extends('competitions.manage')
@section('manage')
<table class="w-full">
    <tr class="text-white bg-gray-800">
        <th class="px-6 py-3 leading-4 tracking-wider text-left border-b-2 border-gray-300">Name</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-center border-b-2 border-gray-300" >email</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-center border-b-2 border-gray-300"  >gender</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-center border-b-2 border-gray-300"  >workplace</th>
        <th class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300"  >Action</th>
    </tr>
    <tbody class="">
        @foreach ($contest->competitor as  $competitor)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="pl-5 pr-3 text-left whitespace-no-wrap">
                    <div>{{ $competitor->first_name .' '  .$competitor->last_name }}</div>
                </td>
                <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                    <div> {{$competitor->email}} </div>
                </td>
                <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                    <div> {{$competitor->gender}} </div>
                </td>
                <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                    <div> {{$competitor->workplace}} </div>
                </td>
                <td class="pl-5 pr-3 text-center whitespace-no-wrap">
                    <pcp-competitordelate :contest="'{{ $contest->id }}'" :urlname="'{{NameToUrl($contest->name)}}'" :competitor="'{{$competitor->id}}'"></pcp-competitordelate>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
