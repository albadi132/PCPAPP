@extends('layouts.app')

@section('content')
<div class="w-full">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Home/login
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
                                {{ __('Verify Your Email Address') }}
                            </header>
                            <div class="flex flex-wrap w-full p-6 space-y-4 text-sm leading-normal text-gray-700 sm:text-base sm:space-y-6">
                                <div class="flash-message">
                                    @foreach (['success', 'creat' , 'danger'] as $msg)
                                        @if(Session::has('alert-' . $msg))
                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
