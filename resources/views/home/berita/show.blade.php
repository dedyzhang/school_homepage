@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden">
        <div class="min-h-screen w-screen">
            <div class="relative w-screen min-h-screen">
                <div class="berita-place w-full mt-30 sm:px-10">
                    <div class="grid grid-cols-4">
                        <div class="judul col-span-4">
                            <h1 class="text-3xl text-gray-800 text-center">{{$berita->judul}}</h1>
                        </div>
                        <div class="image-place col-span-4 mt-10">
                            <img src="{{ asset('storage/berita/'.$berita->gambar) }}" class="w-[500px] h-auto mx-auto">
                        </div>
                        <div class="berita-desc col-span-4 mt-10 px-5 sm:px-20">
                            <div class="inline-flex items-center"><span class="material-icons-round">access_time</span> <p class="ml-3 mr-3">Dibuat Tanggal {{ date('d F Y', strtotime($berita->tanggal)) }}</p> <span class="material-icons-round">account_circle</span> <p class="ml-3">Posting By Admin {{$berita->sekolah->kode}}</p></div>
                        </div>
                        <div class="text-place col-span-4 mt-5 px-5 sm:px-20 text-justify text-lg/loose">
                            {!! $berita->isi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
