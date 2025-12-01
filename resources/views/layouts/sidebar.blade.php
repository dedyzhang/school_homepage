<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-2xl-= sm:shadow-none" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 pt-20">
       <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('home') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">dashboard</span>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            @can('superadmin')
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 cursor-pointer" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">laptop_chromebook</span>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ Route('user.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Data Admin</a>
                    </li>
                    <li>
                        <a href="{{ Route('sekolah.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Data Sekolah</a>
                    </li>
                </ul>
            </li>
            @endcan
            @canany(['admin','superadmin'])
            <li>
                <a href="{{ route('berita.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">newspaper</span>
                    <span class="ms-3">Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">apartment</span>
                    <span class="ms-3">Sekolah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('spmb.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">how_to_reg</span>
                    <span class="ms-3">SPMB</span>
                </a>
            </li>
            @endcanany
            @can('siswa')
                <li>
                    <a href="{{ route('spmb.siswa') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">person</span>
                        <span class="ms-3">Identitas Pribadi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('spmb.siswa.upload') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-icons-round w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true">upload_file</span>
                        <span class="ms-3">Upload</span>
                    </a>
                </li>
                 
            @endcan
        </ul>
    </div>
</aside>
