@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[400] w-screen bg-black/50">
                <img class="w-screen h-[400] object-cover brightness-75" src="{{ Vite::asset('resources/images/header/visimisi.jpg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-4xl font-bold">Visi dan Misi</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Visi dan Misi Sekolah Maitreyawira Tanjungpinang</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center section-1">
        <div class="my-25 px-2 reveal-250 w-full md:w-[75%]">
            <p class="text-xl md:text-2xl text-center text-blue-950 mb-5">Visi Sekolah Maitreyawira</p>
            <h1 class="text-2xl/relaxed md:text-4xl/relaxed text-center text-gray-800 italic">
                Memancarkan Keindahan Kodruti Manusia demi terwujudnya Dunia Satu Keluarga
            </h1>
            <h3 class="text-xl/relaxed md:text-2xl/relaxed text-center text-gray-700 mt-15">
            以展现人之美来实现世界一家</h3>
        </div>
    </div>
    <div class="flex justify-center items-center bg-blue-50">
        <div class="md:px-2 reveal-250 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-6 gap-5">
                <div class="col-span-1 sm:col-span-4 text-base/relaxed md:text-lg/relaxed text-justify text-gray-800 has-bulleting ps-15 py-20">
                    <p class="text-xl md:text-2xl text-center text-blue-950 mb-5">Misi Sekolah Maitreyawira</p>
                    <ul>
                        <li>
                            <p>Membentuk peserta didik yang memiliki budaya mengasihi alam semesta </p>
                            <p>造就拥有热爱大自然文化的学生</p>
                        </li>
                        <li>
                            <p>Membangun peserta didik agar menghormati Kemuliaan Hidup semua Makhluk</p>
                            <p>建设拥有尊敬一切生命尊严文明的学生</p>
                        </li>
                        <li>
                            <p>Mendidik peserta didik agar meyakini harkat hidup manusia adalah tak ternilai</p>
                            <p>教育学生拥有肯定自己人本身的价值是物价的价值观</p>
                        </li>
                        <li>
                            <p>Membimbing peserta didik agar memiliki moralitas Dunia Satu Keluarga</p>
                            <p>培意学生拥有世界一家的道德观</p>
                        </li>
                    </ul>
                </div>
                <div class="col-span-1 col-span-2">
                    <img src="{{ Vite::asset('resources/images/school/visimisi2.jpg') }}" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
    <div class="flex justify-center items-center section-3">
        <div class="my-20 px-2 w-[80%]">
            <h1 class="font-bold text-2xl md:text-3xl text-center text-blue-950 reveal">MOTTO SEKOLAH </h1>
            <div class="my-10 grid grid-cols-1 md:grid-cols-3 gap-2 w-full">
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-250">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-yellow.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">emoji_emotions</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-xl font-black text-blue-950">Bright Hearts</p>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-500">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-blue.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">emoji_objects</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-xl font-black text-blue-950">Bright Mind</p>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-750">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-red.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:60px">emoji_events</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-xl font-black text-blue-950">Bright Future</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
