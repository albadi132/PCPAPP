<div class="flex items-center ml-auto">
    <ul class="flex items-center flex-shrink-0 space-x-6">
        <!-- User Profile Badge -->
        <li class="relative">
        <div class="flex items-center group">
            <svg xmlns="http://www.w3.org/2000/svg" class="p-2 text-green-400 align-middle bg-white rounded-full w-9 h-9 lg:w-10 lg:h-10 hover:text-white hover:bg-green-400 focus:outline-none"
            fill="white" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <ul style="z-index: 1052" class="absolute flex flex-col mt-4 overflow-hidden text-gray-700 transition duration-300 ease-in-out origin-top-right transform scale-0 bg-white rounded-lg shadow-xl right-3 w-36 group-hover:scale-100 top-full">
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

<style scoped>
li > ul {
  transform: translatex(100%) scale(0);
}

li:hover > ul {
  transform: translatex(101%) scale(1);
}

li > button svg {
  transform: rotate(-90deg);
}

li:hover > button svg {
  transform: rotate(-270deg);
}

.group:hover .group-hover\:scale-100 {
  transform: scale(1);
}

.group:hover .group-hover\:-rotate-180 {
  transform: rotate(180deg);
}

.scale-0 {
  transform: scale(0);
}

.min-w-32 {
  min-width: 8rem;
}
</style>
