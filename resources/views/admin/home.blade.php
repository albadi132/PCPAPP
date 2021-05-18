@extends('admin.controlpanel')

@section('admin')
<div class="flex flex-col w-full">

    
    <div class="text-white bg-blue-400 flex flex-shrink-0 flex-col">
      <div class="flex relative items-center p-4 h-12">
        <span class="text-2xl tracking-wide">Home</span>
      </div>
    </div>
    <form action="{{route('teamtest' , ['name' => 'test' ])}}" method="post">
      @csrf
      <label for="name">name:</label>
      <input type="text" id="name" name="name"><br><br>
      <label for="contestid">contestid:</label>
      <input type="text" id="contestid" name="contestid"><br><br>
      <input type="submit" value="Submit">
    </form>
  </div>
  @endsection