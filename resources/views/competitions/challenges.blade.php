@extends('competitions.layouts')
  @section('competition')

  <div id="app">
    <pcp-problems :problems="'{{ json_encode($AllProblem) }}'"></pcp-problems>
  </div>
  
  
  @endsection