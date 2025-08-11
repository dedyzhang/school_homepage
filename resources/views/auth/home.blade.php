@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Welcome to the Dashboard</h1>
        <p class="text-gray-600">Halaman Utama Dashboard</p>
        {{-- Add your dashboard content here --}}
        <div class="mt-6">
            <div class="grid grid-cols-1 sm:grid-cols-6">
                @if(session('success'))
                    <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-3 w-full col-span-6" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Sukses!</span> {{ session('success') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif
                @if (Auth::user()->token == 1)
                    <p class="col-span-6">Untuk Keamanan Aplikasi, Silahkan Ganti Password dengan minimal Huruf 8 Karakter dan gabungan dari Huruf Kapital, Angka dan Simbol</p>
                    <form method="post" action="{{ route('user.gantiPassword') }}" class="col-span-4">
                        @csrf()
                        <div class="mt-4">
                            <label for="password" class="block text-sm mb-2">Password Baru</label>
                            <input type="password" id="password" name="password" class="@error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" placeholder="Masukkan Password Baru" />
                            @error('password')
                                <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="confirm-password" class="block text-sm mb-2">Konfirmasi password Baru</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="@error('confirm-password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" placeholder="Masukkan Kembali Password Baru Diatas" />
                            @error('confirm-password')
                                <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Simpan</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
