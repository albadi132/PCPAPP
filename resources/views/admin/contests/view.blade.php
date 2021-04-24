@extends('admin.controlpanel')

@section('admin')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <div class="container mx-auto px-6 py-8">
    @if ($message = Session::get('success'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-md text-green-700 bg-green-100 border border-green-300 ">
      <div slot="avatar">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
          </svg>
      </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
        {{ $message }}</div>
      <div class="flex flex-auto flex-row-reverse">

      </div>
    </div>
    @endif
      <h3 class="text-gray-700 text-3xl font-medium">Contests</h3>

      <div class="mt-4">
          <div class="flex flex-wrap -mx-6">
              <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                  <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                      <div class="p-3 rounded-full bg-green-400 bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                      </div>

                      <div class="mx-5">
                          <h4 class="text-2xl font-semibold text-gray-700">0</h4>
                          <div class="text-gray-500">Live Contests</div>
                      </div>
                  </div>
              </div>

              <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                  <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                      <div class="p-3 rounded-full bg-yellow-400 bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                      </div>

                      <div class="mx-5">
                          <h4 class="text-2xl font-semibold text-gray-700">0</h4>
                          <div class="text-gray-500">Upcoming Contests</div>
                      </div>
                  </div>
              </div>

              <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                  <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                      <div class="p-3 rounded-full bg-gray-400 bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                      </div>

                      <div class="mx-5">
                          <h4 class="text-2xl font-semibold text-gray-700">0</h4>
                          <div class="text-gray-500">Archived Contests</div>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>

      <div class="mt-8">

      </div>

      <div class="flex flex-col mt-8">
          <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div
                  class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                  <nav class="px-6 py-2 bg-white shadow-md md:flex ">
                    <div class="w-full pb-2 md:flex md:items-center md:justify-between md:pb-0">
                        <div class="flex flex-col px-2 md:flex-row">
                          <a href="{{ route('contests-creat') }}" class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                            New Contest</a>
                        </div>
                        <div class=" flex item-center">
                            <input type="text" class="w-full px-4 py-3 mx-4 leading-tight text-sm text-gray-400 bg-gray-900 rounded placeholder-gray-200 focus:outline-none focus:shadow-outline" placeholder="search">
                            <button class="hidden text-gray-900 hover:text-gray-700 md:block">
                                <svg viewBox="0 0 30 30" class="h-6 w-6 fill-current">
                                    <path d="M15 2.5C8.1 2.5 2.5 8.1 2.5 15C2.5 21.9 8.1 27.5 15 27.5C21.9 27.5 27.5 21.9 27.5 15C27.5 8.1 21.9 2.5 15 2.5ZM16.25 23.75H13.75V21.25H16.25V23.75ZM18.8375 14.0625L17.7125 15.2125C16.8125 16.125 16.25 16.875 16.25 18.75H13.75V18.125C13.75 16.75 14.3125 15.5 15.2125 14.5875L16.7625 13.0125C17.225 12.5625 17.5 11.9375 17.5 11.25C17.5 9.875 16.375 8.75 15 8.75C13.625 8.75 12.5 9.875 12.5 11.25H10C10 8.4875 12.2375 6.25 15 6.25C17.7625 6.25 20 8.4875 20 11.25C20 12.35 19.55 13.35 18.8375 14.0625Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>

                  <table class="min-w-full">
                      <thead>
                          <tr>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  Contest Name</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  Date</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  Status</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  type</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  participation</th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                          </tr>
                      </thead>

                      <tbody class="bg-white">
                          
                              
                          @foreach ($contests as $contest)
                          <tr>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <div class="flex items-center">
                                      <div class="flex-shrink-0 h-10 w-10">
                                          <img class="h-10 w-10 rounded-full"
                                          
                                              src="{{url('/contests/images/'. $contest['logo']) }}"
                                              alt="">
                                      </div>

                                      <div class="ml-4">
                                          <div class="text-sm leading-5 font-medium text-gray-900">{{$contest['name']}}
                                          </div>
                                      </div>
                                  </div>
                              </td>

                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <div class="text-sm leading-5 text-gray-900">start: {{$contest['starting_date']}}</div>
                                  <div class="text-sm leading-5 text-gray-900">end: {{$contest['ending_date']}}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  
                                  @if ($contest['status'] === 1)
                                  @if ($contest['ending_date'] <= date('Y-m-d H:i:s') )
                                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-700 text-gray-50">Finished</span>

@elseif ( ($contest['starting_date'] <= date('Y-m-d H:i:s')) & ($contest['ending_date'] >= date('Y-m-d H:i:s') ))
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-gray-50">Live</span>
@else
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-gray-50">Upcoming</span>
@endif


@else 
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-50">Not Active</span>
@endif



                              </td>

                              <td
                                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                  {{$contest['type']}}</td>
                                  <td
                                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                  {{$contest['participation']}}</td>

                                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5"><a href="#" class="text-indigo-600 hover:text-indigo-900">active</a></div>
                                    <div class="text-sm leading-5"><a href="{{route('contests-edit', ['id' => $contest['id'] ])}}" class="text-indigo-600 hover:text-indigo-900">edit</a></div>
                                    <div class="text-sm leading-5"><a onclick="return confirm('Are you sure?')" href="#" class="text-indigo-600 hover:text-indigo-900">delate</a></div>
                                </td>
                          </tr>
                          @endforeach 
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</main>
  @endsection