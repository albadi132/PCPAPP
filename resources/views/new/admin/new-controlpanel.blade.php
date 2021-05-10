<!DOCTYPE html>
<html lang="en" x-data="data()">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PCP</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <script src="{{asset('js/app.js')}}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <style>
            li > ul                 { transform: translatex(100%) scale(0) }
            li:hover > ul           { transform: translatex(101%) scale(1) }
            li > button svg       { transform: rotate(-90deg) }
            li:hover > button svg { transform: rotate(-270deg) }
            .group:hover .group-hover\:scale-100 { transform: scale(1) }
            .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
            .scale-0 { transform: scale(0) }
            .min-w-32 { min-width: 8rem }
        </style>
    </head>
    <body class="bg-gray-200">
        <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">

            <!-- Desktop sidebar -->
            <aside class="z-20 flex-shrink-0 hidden pl-2 overflow-y-auto bg-gray-800 w-60 md:block">
                <div>
                    <div class="text-white">
                        <div class="flex p-2 bg-gray-800">
                            <div class="flex items-center px-2 py-3">
                                <p class="text-2xl font-semibold text-green-500">PCP</p>
                                <p class="ml-2 italic font-semibold">DASHBOARD</p>
                            </div>
                        </div>
                        <x-PCP-Logo/>
                        <div>
                            <ul class="mt-6 leading-10">
                                <li class="relative px-2 py-1 ">
                                    <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                        href="/new-home">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="ml-4">HOME</span>
                                    </a>
                                </li>
                                <li class="relative px-2 py-1" x-data="{ Open : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold text-gray-500 transition-colors duration-150 cursor-pointer hover:text-yellow-400"
                                        x-on:click="Open = !Open">
                                        <span
                                            class="inline-flex items-center text-sm font-semibold text-white hover:text-green-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                            </svg>
                                            <span class="ml-4">ITEM</span>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" x-show="!Open"
                                            class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" x-show="Open"
                                            class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <div x-show.transition="Open" style="display:none;">
                                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                                            x-transition:enter-start="opacity-25 max-h-0"
                                            x-transition:enter-end="opacity-100 max-h-xl"
                                            x-transition:leave="transition-all ease-in-out duration-300"
                                            x-transition:leave-start="opacity-100 max-h-xl"
                                            x-transition:leave-end="opacity-0 max-h-0"
                                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium bg-green-400 rounded-md shadow-inner"
                                            aria-label="submenu">

                                            <li class="px-2 py-1 text-white transition-colors duration-150">
                                                <div class="px-1 rounded-md hover:text-gray-800 hover:bg-gray-100">
                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                        </svg>
                                                        <a href="#" class="w-full ml-2 text-sm font-semibold text-white hover:text-gray-800">Item1</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Mobile sidebar -->
            <!-- Backdrop -->
            <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

            <aside
                class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-900 dark:bg-gray-800 md:hidden"
                x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
                @keydown.escape="closeSideMenu">
                <div>
                    <div class="text-white">
                        <div class="flex p-2 bg-gray-800">
                            <div class="flex items-center px-2 py-3">
                                <p class="text-2xl font-semibold text-green-500">PCP</p>
                                <p class="ml-2 italic font-semibold">DASHBOARD</p>
                            </div>
                        </div>
                        <div>
                            <ul class="mt-6 leading-10">
                                <li class="relative px-2 py-1 ">
                                    <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                        href=" #">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="ml-4">DASHBOARD</span>
                                    </a>
                                </li>
                                <li class="relative px-2 py-1" x-data="{ Open : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold text-gray-500 transition-colors duration-150 cursor-pointer hover:text-yellow-400"
                                        x-on:click="Open = !Open">
                                        <span
                                            class="inline-flex items-center text-sm font-semibold text-white hover:text-green-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                            </svg>
                                            <span class="ml-4">ITEM</span>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" x-show="!Open"
                                            class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" x-show="Open"
                                            class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <div x-show.transition="Open" style="display:none;">
                                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                                            x-transition:enter-start="opacity-25 max-h-0"
                                            x-transition:enter-end="opacity-100 max-h-xl"
                                            x-transition:leave="transition-all ease-in-out duration-300"
                                            x-transition:leave-start="opacity-100 max-h-xl"
                                            x-transition:leave-end="opacity-0 max-h-0"
                                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium bg-green-400 rounded-md shadow-inner"
                                            aria-label="submenu">

                                            <li class="px-2 py-1 text-white transition-colors duration-150">
                                                <div class="px-1 rounded-md hover:text-gray-800 hover:bg-gray-100">
                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                        </svg>
                                                        <a href="#" class="w-full ml-2 text-sm font-semibold text-white hover:text-gray-800">Item1</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="flex flex-col flex-1 w-full overflow-y-auto">
                <header class="z-40 py-4 bg-gray-800 ">
                    <div class="flex items-center justify-between h-8 px-6 mx-auto">
                        <!-- Mobile hamburger -->
                        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                            @click="toggleSideMenu" aria-label="Menu">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </button>

                        <!-- Search Input -->
                        <div class="flex justify-center mt-2 mr-4">
                            <div class="relative flex flex-wrap items-stretch w-full mb-3">
                                <input type="search" placeholder="Search" class="relative w-full px-3 py-2 pr-10 text-sm text-gray-700 placeholder-gray-400 bg-white rounded-lg shadow outline-none form-input focus:outline-none focus:shadow-outline" />
                                <span
                                    class="absolute right-0 z-10 items-center justify-center w-8 h-full py-3 pr-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 -mt-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <ul class="flex items-center flex-shrink-0 space-x-6">

                            <!-- Notifications menu -->
                            <li class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 p-2 text-green-400 align-middle bg-white rounded-full hover:text-white hover:bg-green-400 focus:outline-none"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu"
                                aria-label="Notifications" aria-haspopup="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span aria-hidden="true"
                                class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800">
                                </span>
                                <template x-if="isNotificationsMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu"
                                        class="absolute w-56 p-2 mt-4 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md right-56">
                                        <li class="flex">
                                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold text-white transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                                href="#">
                                                <span>Messages</span>
                                                <span
                                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                                    13
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </li>

                            <!-- Profile menu -->
                            <li class="relative">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 p-2 text-green-400 align-middle bg-white rounded-full hover:text-white hover:bg-green-400 focus:outline-none"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    @click="toggleProfileMenu" @keydown.escape="closeProfileMenu"
                                    aria-label="Account" aria-haspopup="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <template x-if="isProfileMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                        class="absolute p-2 mt-4 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md w-52 right-56"
                                        aria-label="submenu">
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold text-white transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                                href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold text-white transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                                href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <span>Log out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </li>
                        </ul>

                    </div>
                </header>
                <main class="">
                    <div class="grid px-8 pb-10 mx-4 my-6 mb-4 bg-white border-4 border-green-400 rounded-3xl">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                                <div class="col-span-12 mt-8">
                                    <div class="flex items-center h-10 intro-y">
                                        <h2 class="mr-5 text-lg font-medium truncate">Dashboard</h2>
                                    </div>
                                    <div class="grid grid-cols-12 gap-6 mt-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script>
            function data() {
                return {
                    isSideMenuOpen: false,
                    toggleSideMenu() {
                        this.isSideMenuOpen = !this.isSideMenuOpen
                    },
                    closeSideMenu() {
                        this.isSideMenuOpen = false
                    },
                    isNotificationsMenuOpen: false,
                    toggleNotificationsMenu() {
                        this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                    },
                    closeNotificationsMenu() {
                        this.isNotificationsMenuOpen = false
                    },
                    isProfileMenuOpen: false,
                    toggleProfileMenu() {
                        this.isProfileMenuOpen = !this.isProfileMenuOpen
                    },
                    closeProfileMenu() {
                        this.isProfileMenuOpen = false
                    },
                    isPagesMenuOpen: false,
                    togglePagesMenu() {
                        this.isPagesMenuOpen = !this.isPagesMenuOpen
                    },
                }
            }
        </script>
    </body>
</html>
