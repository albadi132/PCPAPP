@extends('competitions.manage')
@section('manage')
<table class="w-full">
    <tbody class="">
        @foreach ($contest->submissionlog as $log)
            <tr class="relative transform scale-100 text-xs py-1 border-b-2 border-blue-100 cursor-default bg-opacity-25
                @if($log->result == 'Syntax Error')
                    bg-yellow-400
                @elseif($log->result == 'pass')
                    bg-green-400
                @elseif($log->result == 'Not expected result')
                    bg-red-400
                @elseif($log->result == 'Time out')
                    bg-pink-700
                @else
                    bg-yellow-700
                @endif
                ">
                <td class="pl-5 pr-3 whitespace-no-wrap">
                    <div class="text-gray-400">Name</div>
                    <div>{{loginfo($log->id)['name']}}</div>
                </td>
                <td class="pl-5 pr-3 whitespace-no-wrap">
                    <div class="text-gray-400">Problem</div>
                    <div>{{loginfo($log->id)['Problem']}}</div>
                </td>
                <td class="pl-5 pr-3 whitespace-no-wrap">
                    <div class="text-gray-400">Language</div>
                    <div>{{loginfo($log->id)['Language']}}</div>
                </td>
                <td class="pl-5 pr-3 whitespace-no-wrap">
                    <div class="text-gray-400">Result</div>
                    <div>{{$log->result}}</div>
                </td>
                <td class="pl-5 pr-3 whitespace-no-wrap">
                    <div class="text-gray-400">file</div>
                    @if ($log->file == 'MANUAL JUDGE')
                        <div>MANUAL JUDGE</div>
                    @else
                        <div>
                            <a href="{{ url('contests/code/'.NameToUrl($contest->name).filepath($log->id) ) }}"> File Link </a>
                        </div>
                    @endif
                </td>
                <td class="pl-5 pr-3 whitespace-no-wrap">
                    <div class="text-gray-400">Time</div>
                    <div>{{$log->created_at}}</div>
                </td>
            </tr>
            @foreach (ExecutionsLog($log->id) as $executions)
                <tr class="relative py-1 text-xs transform scale-100 border-b-2 border-blue-100 cursor-default">
                    <td class="pl-5 pr-3 whitespace-no-wrap">
                        <div class="text-gray-400">result</div>
                        <div>{{$executions->result}}</div>
                    </td>
                    <td class="pl-5 pr-3 whitespace-no-wrap">
                        <div class="text-gray-400">output</div>
                        <div>{{$executions->output}}</div>
                    </td>
                    <td class="pl-5 pr-3 whitespace-no-wrap">
                        <div class="text-gray-400">expextid output</div>
                        <div>{{TestCase($executions->testcase_id)->output}}</div>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endsection
