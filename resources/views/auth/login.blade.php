<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Maitreyawira - TPI</title>
         <!-- Fonts -->
         <link rel="preconnect" href="https://fonts.bunny.net">
         <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
         <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/x-icon">


         <!-- Styles / Scripts -->
         @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
             @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        {{-- <script src="https://unpkg.com/scrollreveal"></script> --}}
    </head>
    <body class="antialiased bg-gray-200 flex justify-center items-center h-screen w-screen">
        <div class="login-box bg-white py-5 px-3 rounded-xl w-80 md:w-96">
            <h4 class="font-black">LOGIN ADMIN PANEL</h4>
            @if(session('error'))
                {{-- Error Alerts --}}
                <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Gagal Login!</span> Cek kembali username dan password Anda.
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="grid w-full gap-2 mt-3">
                    <div class="form-group">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk Karyawan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="material-icons-outlined text-gray-400" style="font-size:20px">account_circle</i>
                            </div>
                            <input type="text" class="@error('username') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-200 focus:border-blue-500 @enderror text-sm rounded-lg  focus:outline-0 block w-full ps-10 p-2.5" placeholder="Masukkan NIK Anda" name="username" id="username" value="{{ old('username') }}" />

                        </div>
                        @error('username')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="material-icons-outlined text-gray-400" style="font-size:20px">key</i>
                            </div>
                            <input type="password" class="@error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-200 focus:border-blue-500 @enderror text-sm rounded-lg focus:outline-0 block w-full ps-10 p-2.5" placeholder="Masukkan Password Anda" name="password" id="password" />

                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="remember" name="remember" type="checkbox" value="on" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat Saya</label>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </body>
</html>

