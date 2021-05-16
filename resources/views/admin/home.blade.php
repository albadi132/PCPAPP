@extends('admin.controlpanel')

@section('admin')
<div class="flex flex-col w-full">

    
    <div class="text-white bg-blue-400 flex flex-shrink-0 flex-col">
      <div class="flex relative items-center p-4 h-12">
        <span class="text-2xl tracking-wide">Home</span>
      </div>
    </div>
    <form action="{{ route('testform', ['name' => 'HellowThere' ]) }}" method="post">
      @csrf
      <input type="text" name="contestid" id='contestid'>
      <input type="text" name="participant[1][email]">
      <input type="text" name="participant[2][email]">
      <button type="submit" class="inline-flex items-center focus:outline-none mr-4">
        SUBMET
      </button>
  </form>
    
  </div>
  @endsection