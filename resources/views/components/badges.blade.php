<div class="flex items-center ml-auto">
    <ul class="flex items-center flex-shrink-0 space-x-6">

        <!-- Notifications menu -->
        <li class="relative">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                class="p-2 text-green-400 align-middle bg-white rounded-full w-9 h-9 lg:w-10 lg:h-10 hover:text-white hover:bg-green-400 focus:outline-none"
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
                        class="absolute right-0 p-2 mt-4 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md w-36 top-full">
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
            </div>
        </li>

        <!-- Profile menu -->
        <li class="relative">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                class="p-2 text-green-400 align-middle bg-white rounded-full w-9 h-9 lg:w-10 lg:h-10 hover:text-white hover:bg-green-400 focus:outline-none"
                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu"
                aria-label="Account" aria-haspopup="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                        class="absolute right-0 p-2 mt-4 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md top-full w-36"
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
            </div>
        </li>


        <li class="relative">
            <div class="flex items-center group">
                <svg xmlns="http://www.w3.org/2000/svg"
                class="p-2 text-green-400 align-middle bg-white rounded-full w-9 h-9 lg:w-10 lg:h-10 hover:text-white hover:bg-green-400 focus:outline-none"
                fill="white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span aria-hidden="true"
                class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800">
                </span>
                <ul class="absolute right-0 flex flex-col mt-4 overflow-hidden text-gray-700 transition duration-300 ease-in-out origin-top transform scale-0 bg-white border-2 border-gray-600 rounded rounded-lg shadow-xl w-36 group-hover:scale-100 top-full">
                    <li>
                        <a href="#" class="block w-full px-4 py-2 hover:bg-gray-100">
                            <span>Messages</span>
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                13
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="relative">
            <div class="flex items-center group">
                <svg xmlns="http://www.w3.org/2000/svg" class="p-2 text-green-400 align-middle bg-white rounded-full w-9 h-9 lg:w-10 lg:h-10 hover:text-white hover:bg-green-400 focus:outline-none"
                fill="white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <ul class="absolute right-0 flex flex-col mt-4 overflow-hidden text-gray-700 transition duration-300 ease-in-out origin-top transform scale-0 bg-white rounded rounded-lg shadow-xl w-36 group-hover:scale-100 top-full">
                    <li>
                        <a href="#" class="block w-full px-4 py-2 hover:bg-gray-100">Profile</a>
                    </li>
                    <li>
                        <a href="/new-controlpanel" class="block w-full px-4 py-2 hover:bg-gray-100">Control Panel</a>
                    </li>
                    <li>
                        <a href="#" class="block w-full px-4 py-2 hover:bg-gray-100">Log out</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>
    const html = document.querySelector('html');
    const attribute = document.createAttribute('x-data');
    attribute.value = 'data()';
    html.setAttributeNode(attribute);

    function data() {
        return {
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
        }
    }
</script>
