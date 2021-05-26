@extends('admin.controlpanel')

@section('admin')
<div class="flex flex-col w-full">

    
    <div class="text-white bg-blue-400 flex flex-shrink-0 flex-col">
      <div class="flex relative items-center p-4 h-12">
        <span class="text-2xl tracking-wide">Home</span>
      </div>
    </div>

    <div class="w-8/12 bg-white p-6 rounded-lg">
      <div id="app">
        <pcp-vuemodal></pcp-vuemodal>
      </div>
      
    </div>


    <br>
    <form  method="POST" action="{{ route('testcase') }}">
      @csrf
    <div>
      <label class="text-sm text-gray-400">problem id</label>
      <div class="w-full inline-flex border">
        <div class="w-1/12 pt-2 bg-gray-100">
        </div>
        <input
          id="id"
          name="id"
          type="text"
          class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
        />
      </div>
      @error('id')
          <div class="text-red-500">{{ $message }}</div>
      @enderror
    </div>
    <div>
      <label class="text-sm text-gray-400">Input</label>
      <div class="w-full inline-flex border">
        <div class="pt-2 w-1/12 bg-gray-100">
        </div>
        <textarea
          id="input"
          name="input"
          class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
          rows="4" cols="50"
        > </textarea>
      </div>
      @error('input')
          <div class="text-red-500">{{ $message }}</div>
      @enderror
    </div>
    <div>
      <label class="text-sm text-gray-400">Output</label>
      <div class="w-full inline-flex border">
        <div class="pt-2 w-1/12 bg-gray-100">
        </div>
        <textarea
          id="output"
          name="output"
          class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
          rows="4" cols="50"
        > </textarea>
      </div>
      @error('output')
          <div class="text-red-500">{{ $message }}</div>
      @enderror
    </div>
    <div class="w-full p-4 text-right text-gray-500">
      <button type="submit" class="inline-flex items-center focus:outline-none mr-4">
        SUBMET
      </button>
    </div>
  </div>
</div>
</form>


  </div>
  @endsection