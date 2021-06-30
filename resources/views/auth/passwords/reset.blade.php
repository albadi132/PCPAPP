@extends('layouts.app')
@section('content')
<div class="w-full">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Home/Reset Password
            </h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
        <div class="w-full 2xl:w-10/12 md:p-6">
            <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
                <div class="flex">
                    <div class="w-full">
                        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
                            <header class="px-6 py-5 font-semibold text-gray-700 bg-gray-200 sm:py-6 sm:px-8 sm:rounded-t-md">
                                Reset Password
                            </header>
                            <div class="flash-message">
                                @if(Session::has('alert-danger'))
                                    <div class="flex items-center w-full px-6 py-4 mx-2 my-4 text-lg bg-red-200 rounded-md xl:w-full">
                                        <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-red-600 sm:w-5 sm:h-5">
                                            <path fill="currentColor" d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"/>
                                        </svg>
                                        <span class="text-red-800"> {{ Session::get('alert-danger') }} </span>
                                    </div>
                                @endif
                            </div>
                            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('resetPass') }}">
                                @csrf
                                <div class="flex flex-wrap">
                                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        {{ __('E-Mail Address') }}:
                                    </label>
                                    <input id="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" name="email">
                                    @error('email')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <button type="submit" class="w-full p-3 text-base font-bold leading-normal text-gray-100 no-underline whitespace-no-wrap bg-blue-500 rounded-lg select-none hover:bg-blue-700 sm:py-4">
                                        Reset
                                    </button>
                                </div>
                                <br>
                            </form>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
