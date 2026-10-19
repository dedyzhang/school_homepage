@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SETTINGS SPMB</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data dan Konfigurasi SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
            @foreach ($sekolah as $item)
                <div class="flex">
                    <div class="w-full p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between">
                        <div>
                            <div class="w-11 h-11 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
                                <span class="material-icons-round text-2xl">apartment</span>
                            </div>
                            <h5 class="text-base font-semibold tracking-tight text-gray-900 leading-snug">
                                {{ $item->nama }}
                            </h5>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex flex-col gap-2">
                            <a href="{{ route('spmb.settings', $item->uuid) }}" 
                               class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-4 py-2.5 text-center cursor-pointer transition shadow-sm">
                                <span class="material-icons-round text-lg">settings</span>
                                <span>Lihat Setting</span>
                            </a>
                            <a href="{{ route('spmb.informasi', $item->uuid) }}" 
                               class="inline-flex items-center justify-center gap-2 text-white bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full px-4 py-2.5 text-center cursor-pointer transition shadow-sm">
                                <span class="material-icons-round text-lg">info</span>
                                <span>Set Informasi</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection