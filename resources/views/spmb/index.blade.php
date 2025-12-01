@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SPMB</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        <div class="mt-5 grid grid-cols-4 gap-2">
            @foreach ($sekolah as $item)
                <div class="col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-1 xl:col-span-1 flex justify-center">
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <span class="text-gray-500 mb-3 material-icons-round" style="font-size:30px">apartment</span>
                        <h5 class="mb-8 text-xl font-semibold tracking-tight text-gray-900 ">{{$item->nama}}</h5>
                        <a href="{{ route('spmb.show',$item->uuid) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Lihat Profile</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection