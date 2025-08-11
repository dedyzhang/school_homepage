<header class="fixed top-0 z-50 w-full bg-black/10 transition-all duration-150">
    <nav class="mx-auto flex max-w-7xl items-center justify-between py-2 px-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1 items-center gap-2">
        <a href="/">
            <span class="sr-only">Sekolah Maitreyawira TPI</span>
            <img class="h-15 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
        </a>
        <a href="/" class="text-place ganti-warna text-white">
            <p class="font-bold text-lg">Sekolah Maitreyawira</p>
            <p class="text-sm">Tanjungpinang</p>
        </a>

        </div>
        <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 ganti-warna text-white cursor-pointer open-main-menu">
            <span class="sr-only">Open main menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-8">
        <div class="relative">
            <button type="button" class="flex items-center text-sm/6 font-semibold ganti-warna text-white has-submenu hover:text-blue-900" data-target="#menu-sekolah"  aria-expanded="false">
                Sekolah
                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="relative">
            <button type="button" class="flex items-center text-sm/6 font-semibold ganti-warna text-white has-submenu hover:text-blue-900" data-target="#menu-tentang" aria-expanded="false">
                Tentang Sekolah
                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="relative">
            <button type="button" class="flex items-center text-sm/6 font-semibold ganti-warna text-white has-submenu hover:text-blue-900" data-target="#menu-bergabung" aria-expanded="false">
                Bergabung
                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <a href="#" class="text-sm/6 font-semibold text-white ganti-warna">Galeri</a>
        <a href="{{ route('home.berita') }}" class="text-sm/6 font-semibold text-white ganti-warna">Berita</a>
        <a href="#" class="text-sm/6 font-semibold text-white ganti-warna">Contact Us</a>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden hidden" role="dialog" aria-modal="true" id="mobile-menu">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
            <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-10 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
            </a>
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 tutup-menu">
            <span class="sr-only">Close menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                    <div class="-mx-3">
                        <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold cursor-pointer mobile-submenu text-gray-900 hover:bg-gray-50" aria-expanded="false" data-target="#disclosure-1">
                        Sekolah
                        <svg class="size-5 flex-none transition-all duration-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                        </button>
                        <!-- 'Product' sub-menu, show/hide based on menu state. -->
                        <div class="space-y-2 max-h-0 transition-all ease-out duration-300 invisible opacity-0"id="disclosure-1">
                            <p class="py-2 mr-3 ml-6 text-md/7 font-bold border-b-1 border-b-amber-300">Sekolah Maitreyawira</p>
                            <a href="{{ route('home.profile','kbtk') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">KB/TK Maitreyawira</a>
                            <a href="{{ route('home.profile','sd') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">SD Maitreyawira</a>
                            <a href="{{ route('home.profile','smp') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">SMP Maitreyawira</a>
                            <a href="{{ route('home.profile','sma') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">SMA Maitreyawira</a>
                            <a href="{{ route('home.profile','smk') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">SMK Maitreyawira</a>
                            <p class="py-2 mr-3 ml-6 text-md/7 font-bold border-b-1 border-b-amber-300">Sekolah Maitreyawira Bintan Center</p>
                            <a href="{{ route('home.profile','kbtkbc') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">KB/TK Maitreyawira Bintan Center</a>
                            <a href="{{ route('home.profile','sdbc') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">SD Maitreyawira Bintan Center</a>
                            <a href="{{ route('home.profile','smpbc') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">SMP Maitreyawira Bintan Center</a>
                        </div>
                    </div>
                    <div class="-mx-3">
                        <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold cursor-pointer mobile-submenu text-gray-900 hover:bg-gray-50" aria-expanded="false" data-target="#disclosure-2">
                        Tentang Sekolah
                        <svg class="size-5 flex-none transition-all duration-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                        </button>
                        <!-- 'Product' sub-menu, show/hide based on menu state. -->
                        <div class="space-y-2 max-h-0 transition-all ease-out duration-300 invisible opacity-0"id="disclosure-2">
                            <a href="{{ route('home.visimisi') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Visi Misi Sekolah</a>
                            <a href="{{ route('home.fasilitas') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Fasilitas</a>
                            <a href="{{ route('home.keunggulan') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Keungulan Sekolah</a>
                            <a href="{{ route('home.pencapaian') }}" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Pencapaian Sekolah</a>
                            <a href="#" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">School Tour</a>
                        </div>
                    </div>
                    <div class="-mx-3">
                        <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold cursor-pointer mobile-submenu text-gray-900 hover:bg-gray-50" aria-expanded="false" data-target="#disclosure-3">
                        Bergabung
                        <svg class="size-5 flex-none transition-all duration-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                        </button>
                        <!-- 'Product' sub-menu, show/hide based on menu state. -->
                        <div class="space-y-2 max-h-0 transition-all ease-out duration-300 invisible opacity-0"id="disclosure-3">
                            <a href="#" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Sistem Penerimaan Sistem Baru</a>
                            <a href="#" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Lowongan Kerja</a>

                        </div>
                    </div>
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Galeri</a>
                    <a href="{{ route('home.berita') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Berita</a>
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Contact Us</a>
                </div>
                {{-- <div class="py-6">
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
                </div> --}}
            </div>
        </div>
        </div>
    </div>
</header>
{{-- Menu Dropdown --}}

{{-- Menu Sekolah --}}
<div class="fixed left-0 z-10 mt-20 hidden w-full max-w-max px-4 sub-menu" id="menu-sekolah">
    <div class="w-400 flex-auto overflow-hidden rounded-3xl bg-white text-sm/6 shadow-lg ring-1 ring-gray-900/5">
        <div class="p-4 grid grid-cols-12 gap-x-2">
            <div class="card-place col-span-3">
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-wite shadow-md hover:shadow-xl w-11/12">
                    <img class="h-50 w-full object-cover" src="{{ Vite::asset('resources/images/school/fasilitas3.jpg') }}">
                    <div class="p- sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">
                            Tentang Sekolah Kami
                        </h3>
                        <a href="{{ route('home.sekolah') }}" class="block w-full text-center rounded-md px-3 py-2 bg-amber-300 cursor-pointer font-semibold focus:bg-amber-400 text-xs">Pelajari Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="button-place col-span-3">
                <h4 class="font-bold text-lg text-gray-900 mt-4">Maitreyawira</h4>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','kbtk') }}" class="font-semibold text-gray-900 m-0 p-0">
                            KB/TK Maitreyawira
                        </a>
                        <p class="mt-1 text-gray-600 w-8/12 text-[10px]/4">Taman Kanak & Kelompok Belajar Umur 4 - 6</p>
                    </div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','sd') }}" class="font-semibold text-gray-900 m-0 p-0">
                            SD Maitreyawira
                        </a>
                        <p class="mt-1 text-gray-600 w-10/12 text-[10px]/4">Tingkat Dasar Umur 6 - 12</p>
                    </div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','smp') }}" class="font-semibold text-gray-900 m-0 p-0">
                            SMP Maitreyawira
                        </a>
                        <p class="mt-1 text-gray-600 w-10/12 text-[10px]/4">Tingkat Menengah Umur 13 - 15</p>
                    </div>
                </div>
            </div>
            <div class="button-place col-span-3 mt-11">
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','sma') }}" class="font-semibold text-gray-900 m-0 p-0">
                            SMA Maitreyawira
                        </a>
                        <p class="mt-1 text-gray-600 w-8/12 text-[10px]/4">Tingkat Menengah Keatas Umur 15 - 17</p>
                    </div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','smk') }}" class="font-semibold text-gray-900 m-0 p-0">
                            SMK Maitreyawira
                        </a>
                        <p class="mt-1 text-gray-600 w-10/12 text-[10px]/4">Tingkat Menengah Kejuruan Umur 15 - 17</p>
                    </div>
                </div>
            </div>
            <div class="button-place col-span-3">
                <h4 class="font-bold text-lg text-gray-900 mt-4">Maitreyawira Bintan Center</h4>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','kbtkbc') }}" class="font-semibold text-gray-900 m-0 p-0">
                            KB/TK Maitreyawira Bintan Center
                        </a>
                        <p class="mt-1 text-gray-600 w-8/12 text-[10px]/4">Taman Kanak & Kelompok Belajar Umur 4 - 6</p>
                    </div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','sdbc') }}" class="font-semibold text-gray-900 m-0 p-0">
                            SD Maitreyawira Bintan Center
                        </a>
                        <p class="mt-1 text-gray-600 w-10/12 text-[10px]/4">Tingkat Dasar Umur 6 - 12</p>
                    </div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img class="size-10" src="{{ Vite::asset('resources/images/logo.png') }}" />
                    </div>
                    <div>
                        <a href="{{ route('home.profile','smpbc') }}" class="font-semibold text-gray-900 m-0 p-0">
                            SMP Maitreyawira Bintan Center
                        </a>
                        <p class="mt-1 text-gray-600 w-10/12 text-[10px]/4">Tingkat Menengah Umur 13 - 15</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Menu Tentang Sekolah --}}
<div class="fixed left-0 z-10 mt-20 hidden w-full max-w-max px-4 sub-menu" id="menu-tentang">
    <div class="w-400 flex-auto overflow-hidden rounded-3xl bg-white text-sm/6 shadow-lg ring-1 ring-gray-900/5">
        <div class="p-4 grid grid-cols-12 gap-x-2">
            <div class="card-place col-span-3">
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-wite shadow-md hover:shadow-xl w-11/12">
                    <img class="h-50 w-full object-cover" src="{{ Vite::asset('resources/images/header/visimisi.jpg') }}">
                    <div class="p- sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">
                            Visi Misi Sekolah
                        </h3>
                        <a href="{{ route('home.visimisi') }}" class="block w-full rounded-md px-3 py-2 text-center bg-amber-300 font-semibold focus:bg-amber-400 text-xs cursor-pointer">Pelajari Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="card-place col-span-3">
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-wite shadow-md hover:shadow-xl w-11/12">
                    <img class="h-50 w-full object-cover" src="{{ Vite::asset('resources/images/header/fasilitas.jpg') }}">
                    <div class="p- sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">
                            Fasilitas
                        </h3>
                        <a href="{{ route('home.fasilitas') }}" class="block w-full rounded-md px-3 py-2 text-center bg-amber-300 font-semibold focus:bg-amber-400 text-xs cursor-pointer">Pelajari Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="button-place col-span-3">
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div><a href="{{ route('home.keunggulan') }}" class="font-semibold text-gray-900 m-0 p-0 hover:text-blue-900">Keunggulan Sekolah</a></div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div><a href="{{ route('home.pencapaian') }}" class="font-semibold text-gray-900 m-0 p-0 hover:text-blue-900">Pencapaian Sekolah</a></div>
                </div>
                <div class="group relative flex gap-x-4 rounded-lg p-4 hover:bg-gray-100">
                    <div><a href="#" class="font-semibold text-gray-900 m-0 p-0 hover:text-blue-900">School Tour</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Menu Bergabung --}}
<div class="fixed left-0 z-10 mt-20 hidden w-full max-w-max px-4 sub-menu" id="menu-bergabung">
    <div class="w-400 flex-auto overflow-hidden rounded-3xl bg-white text-sm/6 shadow-lg ring-1 ring-gray-900/5">
        <div class="p-4 grid grid-cols-12 gap-x-2">
            <div class="card-place col-span-3">
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-wite shadow-md hover:shadow-xl w-11/12">
                    <img class="h-50 w-full object-cover" src="{{ Vite::asset('resources/images/header/pencapaian.jpeg') }}">
                    <div class="p- sm:p-6">
                        <h3 class="text-md font-medium text-gray-900 mb-3">
                            Sistem Penerimaan Siswa Baru
                        </h3>
                        <button class="w-full rounded-md px-3 py-2 bg-amber-300 font-semibold focus:bg-amber-400 text-xs">Pelajari Selengkapnya</button>
                    </div>
                </div>
            </div>
            <div class="card-place col-span-3">
                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-wite shadow-md hover:shadow-xl w-11/12">
                    <img class="h-50 w-full object-cover" src="{{ Vite::asset('resources/images/school/keunggulan11.jpg') }}">
                    <div class="p- sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">
                            Lowongan Kerja
                        </h3>
                        <button class="w-full rounded-md px-3 py-2 bg-amber-300 font-semibold focus:bg-amber-400 text-xs">Pelajari Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
