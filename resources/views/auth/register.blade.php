@extends('layouts.app')

@section('content')
<div class="w-full">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Home/register
            </h1>
        </div>
    </header>
    <br>
    <div class="flex justify-center">
        <div class="w-full md:p-6 2xl:w-10/12">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">
                            {{ Session::get('alert-' . $msg) }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">
                                &times;
                            </a>
                        </p>
                    @endif
                @endforeach
            </div>
            <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
                <div class="flex">
                    <div class="w-full">
                        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
                            <header class="px-6 py-5 font-semibold text-gray-700 bg-gray-200 sm:py-6 sm:px-8 sm:rounded-t-md">
                                Register
                            </header>
                            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                                action="{{ route('register') }}">
                                @csrf
                                <div class="flex flex-wrap">
                                    <label for="first_name" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        First Name
                                    </label>
                                    <input id="first_name" type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('first_name') border-red-500 @enderror"
                                        name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="last_name" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        Last Name
                                    </label>
                                    <input id="last_name" type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('last_name') border-red-500 @enderror"
                                        name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                    @error('last_name')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="username" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        User Name
                                    </label>
                                    <input id="username" type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                                        name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    @error('username')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        {{ __('E-Mail Address') }}:
                                    </label>
                                    <input id="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" name="email">
                                    @error('email')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        {{ __('Password') }}:
                                    </label>
                                    <input id="password" type="password" required autocomplete="new-password"
                                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" name="password">
                                    @error('password')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="flex flex-wrap">
                                    <label for="password-confirm" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                        {{ __('Confirm Password') }}:
                                    </label>
                                    <input id="password-confirm" type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('Confirm Password') border-red-500 @enderror"
                                        name="password_confirmation" required autocomplete="new-password">
                                    @error('password-confirm')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <button type="submit"
                                        class="w-full p-3 text-base font-bold leading-normal text-gray-100 no-underline whitespace-no-wrap bg-blue-500 rounded-lg select-none hover:bg-blue-700 sm:py-4">
                                        {{ __('Register') }}
                                    </button>
                                    <p class="w-full my-6 text-xs text-center text-gray-700 sm:text-sm sm:my-8">
                                        {{ __('Already have an account?') }}
                                        <a class="text-blue-500 no-underline hover:text-blue-700 hover:underline" href="{{ route('login') }}">
                                            {{ __('Login') }}
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
