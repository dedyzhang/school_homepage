@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[400] w-screen bg-black/50">
                <img class="w-screen h-[400] object-cover brightness-75" src="{{ Vite::asset('resources/images/header/fasilitas.jpg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-4xl font-bold">Sekolah</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Sekolah-Sekolah Maitreyawira Tanjungpinang</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center reveal">
        <div class="my-25 px-5 w-full md:w-[90%]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-7 md:gap-7">
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-green-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">KBTK Maitreyawira Tanjungpinang</p>
                        <a href="{{ route('home.profile','kbtk') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-green-200 cursor-pointer font-semibold hover:bg-green-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-green-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">KBTK Maitreyawira Bintan Center</p>
                        <a href="{{ route('home.profile','kbtkbc') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-green-200 cursor-pointer font-semibold hover:bg-green-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-red-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">SD Maitreyawira Tanjungpinang</p>
                        <a href="{{ route('home.profile','sd') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-red-200 cursor-pointer font-semibold hover:bg-red-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-red-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">SD Maitreyawira Bintan Center</p>
                        <a href="{{ route('home.profile','sdbc') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-red-200 cursor-pointer font-semibold hover:bg-red-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-blue-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">SMP Maitreyawira Tanjungpinang</p>
                        <a href="{{ route('home.profile','smp') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-blue-200 cursor-pointer font-semibold hover:bg-blue-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-blue-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">SMP Maitreyawira Bintan Center</p>
                        <a href="{{ route('home.profile','smpbc') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-blue-200 cursor-pointer font-semibold hover:bg-blue-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-gray-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">SMA Maitreyawira Tanjungpinang</p>
                        <a href="{{ route('home.profile','sma') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-gray-200 cursor-pointer font-semibold hover:bg-gray-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center flex-wrap">
                    <div class="img-place bg-gray-200 rounded-lg w-[150px] h-[150px]">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="w-full h-full" />
                    </div>
                    <div class="text-place text-center mt-5">
                        <p class="text-bold">SMK Maitreyawira Bintan Center</p>
                        <a href="{{ route('home.profile','smk') }}" class="text-bold block w-full text-center rounded-md px-3 py-2 bg-gray-200 cursor-pointer font-semibold hover:bg-gray-400 text-xs mt-5">Klik Untuk Mengunjungi Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
