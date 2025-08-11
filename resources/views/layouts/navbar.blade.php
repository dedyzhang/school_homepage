<div class="bg-white shadow-md px-2 sm:px-8 py-2 w-full fixed z-60" id="navbar">
    <div class="flex w-full justify-between items-center">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>
        <div class="flex-item inline-flex items-center">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" class="size-12 mr-2" />
            <div class="text-place hidden sm:block">
                <p class="text-md font-bold m-0 p-0">Sekolah Maitreyawira</p>
                <p class="text-md font-bold m-0 p-0">Tanjungpinang</p>
            </div>
        </div>
        <div data-dropdown-toggle="navbar-dropdown" class="flex-item inline-flex items-center group hover:bg-gray-100 trasition duration-100 rounded-lg p-2 cursor-pointer">
            <div class="bg-blue-700 rounded-full p-1 cursor-pointer group-hover:bg-blue-800 transition duration-100 mr-2">
                <a class="material-icons-round text-white" style="font-size:22px">person</a>
            </div>
            <div class="text-place hidden sm:block">
                <p class="text-xs font-black">{{$account->name}}</p>
                <span class="text-gray-400 italic text-xs">{{ $account->access }}</span>
            </div>
        </div>
    </div>
</div>
<div id="navbar-dropdown" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600 fixed top-17 right-8">
    <div class="text-place sm:hidden p-4">
        <p class="text-xs font-black">Dedy</p>
        <span class="text-gray-400 italic text-xs">Superadmin</span>
    </div>
    <div class="py-1">
        <a href="{{ route('signout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
    </div>
</div>
