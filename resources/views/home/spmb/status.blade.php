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
    <div class="flex justify-center items-center relative flex-wrap">
        <div class="mt-25 px-2 reveal-250 w-full md:w-[75%]">
            <p class="text-xl md:text-2xl text-center text-blue-950"><b>DAFTAR CALON SISWA SPMB {{$sekolah->kode}}</b></p>
            <p class="text-base mb-5 mt-1 text-center">Gunakan Fitur Cari untuk memudahkan dalam pencarian nama calon siswa</p>
            <div class="grid grid-cols-1">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-gray-500 text-left rtl:text-right text-gray-500" id="table-sekolah">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-6 py-3"><span class="flex items-center">No 
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg></span></th>
                                <th class="px-6 py-3"><span class="flex items-center">Nama Siswa
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg></span></th>
                                <th class="px-6 py-3"><span class="flex items-center">ID SPMB 
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg></span></th>
                                <th class="px-6 py-3"><span class="flex items-center">Gelombang 
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg></span></th>
                                <th class="px-6 py-3"><span class="flex items-center">Tanggal Daftar 
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg></span></th>
                                <th class="px-6 py-3"><span class="flex items-center">Keterangan
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spmb_siswa as $siswa)
                                @php
                                    $data_siswa = unserialize($siswa->biodata);
                                    $nama_siswa = $data_siswa['nama'];
                                    if($siswa->dokumen != "") {
                                        $jumlah_berkas = count(unserialize($siswa->dokumen));
                                    } else {
                                        $jumlah_berkas = 0;
                                    }
                                @endphp
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-3">{{$loop->iteration}}</td>
                                    <td class="px-6 py-3">{{ $nama_siswa }}</td>
                                    <td class="px-6 py-3">{{ $siswa->nis }}</td>
                                    <td class="px-6 py-3">{{ $siswa->gelombang }}</td>
                                    <td class="px-6 py-3">{{ $siswa->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-3 gap-1 flex">
                                        @if ($jumlah_berkas == 0)
                                            <span class="text-red-700">Berkas Masih Belum diupload</span>
                                        @elseif($jumlah_berkas < $total_berkas)
                                            <span class="text-orange-600">Berkas Masih Belum Lengkap</span>
                                        @elseif($jumlah_berkas == $total_berkas)
                                            <span class="text-green-700">Berkas Sudah Lengkap</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="flex justify-center items-center">
        <div class="h-[200px] w-full">
            <img class="w-screen h-[300px] long-horizontal object-cover" src="{{ Vite::asset('resources/images/spmb/all_spmb_student.jpg') }}"/>
        </div>
    </div>
@endsection
