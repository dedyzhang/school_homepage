@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[500] w-screen bg-black/50">
                <img class="w-screen h-[500] background-horizontalscroll object-cover brightness-75" src="{{ Vite::asset('resources/images/header/spmb.svg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-8xl font-bold">SPMB {{ $sekolah->kode}}</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Sistem Penerimaan Siswa Baru</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center relative flex-wrap">
        <div class="my-25 px-2 reveal-250 w-full md:w-[75%]">
            <p class="text-xl md:text-2xl text-center text-blue-950 mb-5"><b>Informasi Tentang SPMB {{$sekolah->kode}}</b></p>
            <div class="has-bulleting informasi px-5">
                {!! $isi !!}
            </div>
        </div>
    </div>
    @if ($status == 'online')
        
        <div class="flex justify-center items-center flex-wrap">
            <div class="my-10 px-2 reveal-250 w-full md:w-[75%] grid grid-cols-1">
                <div class="col-span-1">
                    <h4 class="text-2xl md:text-4xl text-center text-blue-950">Berminat Sekolah di {{$sekolah->nama}} ?</h4>
                </div>
                <div class="col-span-1 mt-10 text-center flex justify-center gap-2">
                    <a href="{{ route('home.spmb.daftar',strtolower($sekolah->kode)) }}" class="text-center px-5 py-4 bg-blue-200 text-blue-950 rounded-lg hover:bg-blue-500 hover:text-white outline-0 hover:outline-0">
                        <b>Klik Disini Untuk Mendaftar</b>
                    </a>
                    <a href="{{ route('home.spmb.status',strtolower($sekolah->kode)) }}" class="text-center px-5 py-4 bg-yellow-200 text-yellow-950 rounded-lg hover:bg-amber-500 hover:text-white outline-0 hover:outline-0">
                        <b>Klik Disini Untuk Melihat Status Pendaftaran</b>
                    </a>
                </div>
            </div>
        </div>
    @endif
    <div class="flex justify-center items-center">
        <div class="h-[200px] w-full">
            <img class="w-screen h-[300px] long-horizontal object-cover" src="{{ Vite::asset('resources/images/spmb/all_spmb_student.svg') }}"/>
        </div>
    </div>
@endsection
