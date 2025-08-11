<!DOCTYPE html>
<html>
    <head>
        @include('layouts.head')
    </head>
    <body class="antialiased bg-gray-200 w-full overflow-x-hidden">
        {{-- Navbar  --}}
        @include('layouts.navbar')
        {{-- End Navbar --}}
        {{-- Sidebar --}}
        @include('layouts.sidebar')
        {{-- End Sidebar --}}

        {{-- Main Content --}}
        <div class="p-4 sm:ml-64 pt-20">
            @yield('container')
        </div>
        <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40 hidden"></div>
        {{-- End Main Content --}}
    </body>
</html>

