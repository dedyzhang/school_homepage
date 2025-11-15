@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        <div class="mt-10 col-span-1">
            <a class="button-d bg-amber-300 hover:bg-amber-400 focus:ring-amber-200" href="{{ route('berita.create') }}">Setting SPMB</a>
        </div>
    </div>
@endsection