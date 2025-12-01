@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[500] w-screen bg-black/50">
                <img class="w-screen h-[500] background-horizontalscroll object-cover brightness-75" src="{{ Vite::asset('resources/images/header/spmb.jpg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-8xl font-bold">SPMB {{$sekolah->kode}}</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Sistem Penerimaan Siswa Baru</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($message)
        <div class="flex justify-center items-center w-[95%] my-25 md:w-[80%] mx-auto px-10 md:px-10 flex-wrap text-center py-20 border border-neutral-800">
            <h5 class="text-2xl sm:text-3xl md:text-4xl w-full mb-10">Pendaftaran Berhasil !</h5>
            <p class="text-xl/relaxed mb-5">{!!  $message != null ? $message : ''!!}</p>

            <a href="/user/signin" class="bg-blue-500 text-white border rounded-lg px-2 py-2 mb-10">Klik Disini ke Halaman Login</a>
            <p class="text-green-700 w-full">Screenshot atau catat NIS dan Password Sebelum ke halaman login.</p>
        </div>
    @endif
    <div class="flex justify-center items-center">
        <div class="h-[200px] w-full">
            <img class="w-screen h-[300px] long-horizontal object-cover" src="{{ Vite::asset('resources/images/spmb/all_spmb_student.jpg') }}"/>
        </div>
    </div>
@endsection
