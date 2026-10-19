@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[500] w-screen bg-black/50">
                <img class="w-screen h-[500] background-horizontalscroll object-cover brightness-75" src="{{ Vite::asset('resources/images/header/spmb.png') }}"/>
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
        <div class="flex justify-center items-center w-[95%] my-20 md:w-[80%] mx-auto px-6 md:px-12 flex-wrap text-center py-16 border-2 border-slate-700 bg-white rounded-2xl shadow-xl">
            <div class="w-full flex justify-center mb-4">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <span class="material-icons-round text-4xl text-green-600">check_circle</span>
                </div>
            </div>
            <h5 class="text-2xl sm:text-3xl md:text-4xl w-full mb-6 font-bold text-gray-900">Pendaftaran Berhasil!</h5>
            <div class="text-lg/relaxed mb-8 max-w-2xl mx-auto text-gray-700 bg-slate-50 p-6 rounded-xl border border-slate-200">
                {!! $message != null ? $message : '' !!}
            </div>

            <div class="w-full flex flex-wrap justify-center gap-4 mb-6">
                @if(isset($spmb) && $spmb != null && $spmb->pernyataan_setuju)
                    <a href="{{ route('home.spmb.cetak.pernyataan', [$sekolah->uuid, $spmb->uuid]) }}" target="_blank" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg px-6 py-3 flex items-center gap-2 shadow-md transition">
                        <span class="material-icons-round text-xl">print</span>
                        <span>Cetak Surat Pernyataan</span>
                    </a>
                @endif
                <a href="/user/signin" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-6 py-3 flex items-center gap-2 shadow-md transition">
                    <span class="material-icons-round text-xl">login</span>
                    <span>Masuk ke Halaman Login</span>
                </a>
            </div>
            
            @if(isset($spmb) && $spmb != null && $spmb->pernyataan_setuju)
                <p class="text-sm text-green-800 font-medium w-full">
                    * Simpan atau cetak surat pernyataan sebagai tanda bukti bahwa pendaftar telah menyetujui ketentuan pendaftaran.
                </p>
            @endif
            <p class="text-xs text-gray-500 mt-1 w-full">
                Pastikan Anda telah mencatat atau menyimpan screenshot NIS dan Password di atas sebelum melanjutkan login.
            </p>
        </div>
    @endif
    <div class="flex justify-center items-center">
        <div class="h-[200px] w-full">
            <img class="w-screen h-[300px] long-horizontal object-cover" src="{{ Vite::asset('resources/images/spmb/all_spmb_student.svg') }}"/>
        </div>
    </div>
@endsection
