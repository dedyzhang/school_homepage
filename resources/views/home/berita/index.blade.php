@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[400] w-screen bg-black/50">
                <img class="w-screen h-[400] object-cover brightness-75" src="{{ Vite::asset('resources/images/slider/home-slideshow1.jpg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-4xl font-bold">BERITA</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Kumpulan Berita Sekolah Maitreyawira Tanjungpinang</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="berita-place flex flex-wrap mt-10">
        <div class="w-[95%] sm:w-[90%] md:w-[80%] mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            @foreach ($berita as $item)
                @php
                    $isiBerita = strip_tags($item->isi);
                    $isiBerita = Str::limit($isiBerita,100,'...');
                @endphp
                <div class="col-span-1">
                    <div class="news-card w-full bg-white shadow-xl rounded-xl">
                        <div class="w-full h-[200px] image-place">
                            <img class="w-full h-full object-cover rounded-t-xl" src="{{ asset('storage/berita/'.$item->gambar) }}">
                        </div>
                        <div class="w-full article-place py-10 px-5 max-h-[300px]">
                            <h4 class="text-blue-950 text-lg/6 font-black">{{Str::limit($item->judul,50,'...')}}</h4>
                            <div class="badge-place mt-3"><span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-blue-700/10 ring-inset">{{ $item->sekolah->kode }}</span></div>
                            <div class="text-blue-950 text-sm/6 mt-5 text-justify">{!! $isiBerita !!}</div>
                        </div>
                        <div class="w-full border-t-amber-300 border-t-1 px-5 py-3 flex justify-between items-center">
                            <p class="text-amber-800 text-sm/6 font-bold">{{ date('d F Y',strtotime($item->tanggal)) }}</p>
                            <a href="{{ route('home.berita.show',$item->uuid) }}" class="bg-amber-300 rounded-xl text-sm/6 py-1 px-2 hover:bg-amber-500 transition-all duration-100 cursor-pointer">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span 1 sm:col-span-2 md:col-span-3">
                {{ $berita->links() }}
            </div>
        </div>
     </div>
@endsection
