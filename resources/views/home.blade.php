@extends('layouts.app')
@section('content')
<div class="w-full">
    <section>
        <div class="bg-bluegray-800 text-white py-20">
            <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
                <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                    <h1 class="text-3xl md:text-5xl p-2 text-green-300 tracking-loose font-bold">&lt;PCP&gt;</h1>
                    <h2 class="text-3xl md:text-3xl leading-relaxed md:leading-snug ">ADVANCED PLATFORM FOR PROGRAMMING COMPETITIONS
                    </h2>
                    <p class="text-sm md:text-base text-gray-50 mb-4">Explore your programming abilities and participate in many competitions that will improve your level.</p>
                    <a href="{{ route('competitions-show') }}"
                        class="bg-transparent hover:bg-green-300 text-green-300 hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border border-green-300 hover:border-transparent">
                        Start Coding!</a>
                </div>
                <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
                    <div class="h-48 flex flex-wrap content-center">
                        <div>
                            <img class="inline-block mt-28 hidden xl:block" src="{{url('/images/2.png')}}"></div>
                            <div>
                                <img class="inline-block mt-24 md:mt-0 p-8 md:p-0"  src="{{url('/images/1.png')}}"></div>
                                <div>
                                    <img class="inline-block mt-28 hidden lg:block" src="{{url('/images/3.png')}}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
</div>
@endsection

