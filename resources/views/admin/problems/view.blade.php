@extends('admin.layouts.app')
@section('content')

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
      <h3 class="text-gray-700 text-3xl font-medium">Programing Problems</h3>

      <div class="mt-4">
          <div class="flex flex-wrap -mx-6">
              <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                  <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                      <div class="p-3 rounded-full bg-green-400 bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                          </svg>
                      </div>

                      <div class="mx-5">
                          <h4 class="text-2xl font-semibold text-gray-700">{{$count}}</h4>
                          <div class="text-gray-500">Total</div>
                      </div>
                  </div>
              </div>

              <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                  <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                      <div class="p-3 rounded-full bg-green-400 bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                          </svg>
                      </div>

                      <div class="mx-5">
                          <h4 class="text-2xl font-semibold text-gray-700">{{$last->name}}</h4>
                          <div class="text-gray-500">Last Problems</div>
                      </div>
                  </div>
              </div>

              <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                  <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                      <div class="p-3 rounded-full bg-green-400 bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                      </div>

                      <div class="mx-5">
                          <h4 class="text-2xl font-semibold text-gray-700">{{getUsername($mostauthor[0]->author_id)}}</h4>
                          <div class="text-gray-500">most writer with {{$mostauthor[0]->count}} problems</div>
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
                          <a href="{{ route('problems-creat') }}" class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                            New Problem</a>
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
                                  Problem Name</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  Question</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  points</th>
                              <th
                                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                  author</th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                          </tr>
                      </thead>

                      <tbody class="bg-white">
                          
                              
                           @foreach ($problems as $problem) 
                          <tr class="hover:shadow">
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$problem['name']}}</div>
                              </td>

                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <div class="text-sm leading-5 text-gray-900"><a href="{{url('/contests/library/'. $problem['file']) }}">pdf file</a></div>
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  
                                  @if ($problem['points'] >= 200 )
                                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-400 text-gray-50"> {{$problem['points']}}</span>

@elseif ( ($problem['points'] < 200) & ($problem['points'] > 100) )
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-gray-50">{{$problem['points']}}</span>
@else
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-gray-50">{{$problem['points']}}</span>
@endif

                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{getUsername($problem['author_id'])}}</div>
                              </td>

                                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5"><a href="{{route('problems-edit', ['id' => $problem['id'] ])}}" class="text-indigo-600 hover:text-indigo-900">edit</a></div>
                                    <div class="text-sm leading-5"><a onclick="return confirm('Are you sure?')" href="{{route('problems-delate', ['id' => $problem['id'] ])}}" class="text-indigo-600 hover:text-indigo-900">delate</a></div>
                                </td>
                          </tr>
                          @endforeach 
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  @endsection