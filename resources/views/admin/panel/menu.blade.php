<div>
    <div class="text-white">
      <div class="flex p-2 bg-bluegray-800">
        <div class="flex items-center px-2 py-3">
          <p class="text-2xl font-semibold text-green-500 uppercase">pcp</p>
          <p class="ml-2 font-semibold uppercase font-italic">control panel</p>
        </div>
    </div>
    <x-pcp-logo/>
    <div>
        <ul class="mt-6 leading-10">
            @yield('item.home')
            <li class="relative px-2 py-1">
                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                    href="#">
                    <span class="ml-4 capitalize">option</span>
                </a>
             </li>
        </ul>
      </div>
    </div>
</div>
