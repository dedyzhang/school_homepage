<html>
    <head>
        @include('layouts.headhome')
    </head>
    <body class="antialiased" id="body-place">
        @include('layouts.navbarhome')
        @yield('container')
        {{-- Footer --}}
        @include('layouts.foothome')
    </body>
</html>

