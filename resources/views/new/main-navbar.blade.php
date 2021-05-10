<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PCP</title>

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            li>ul                 { transform: translatex(100%) scale(0) }
            li:hover>ul           { transform: translatex(101%) scale(1) }
            li > button svg       { transform: rotate(-90deg) }
            li:hover > button svg { transform: rotate(-270deg) }
            .group:hover .group-hover\:scale-100 { transform: scale(1) }
            .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
            .scale-0 { transform: scale(0) }
            .min-w-32 { min-width: 8rem }
        </style>
    </head>
    <body class="bg-gray-200">
        <nav class="relative flex items-center justify-between w-full px-4 py-2 text-white bg-gray-800 lg:px-8 md:justify-start">
            <x-PCP-Logo/>
            <div class="hidden md:block">
                <ul class="absolute right-0 flex flex-col space-y-1 text-gray-300 bg-gray-800 left-8 md:space-x-2 md:px-0 md:space-y-0 md:ml-4 md:relative top-full md:flex-row">
                    <li>
                        <a href="/new-home" class="block px-4 py-2 font-semibold bg-black rounded-lg group group-focus hover:bg-gray-700 hover:text-white" >Home</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 font-semibold rounded-lg hover:bg-gray-700 hover:text-white" >Competetions</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 font-semibold rounded-lg hover:bg-gray-700 hover:text-white" >About PCP</a>
                    </li>
                </ul>
            </div>
            <x-badges/>
        </nav>
        @yield('content')
    </body>
</html>
