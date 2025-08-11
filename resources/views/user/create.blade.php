@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Tambah Admin</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data admin yang dapat mengakses aplikasi ini</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        {{-- Add your dashboard content here --}}

        <div class="mt-5">
            <p class="text-md font-bold">Form Penambahan Admin</p>
            <form method="post" action="{{ route('user.store')}}">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-4 mt-5">
                    <div class="mb-2 col-span-3">
                        <label for="name" class="block text-sm mb-2">Nama Karyawan</label>
                        <input type="text" id="name" name="name" class="@error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" placeholder="Masukkan Nama Anda" value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="nik" class="block text-sm mb-2">Nomor Induk Karyawan</label>
                        <input type="number" id="nik" name="nik" class="@error('nik') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" placeholder="Masukkan Nomor Induk Karyawan Anda" value="{{ old('nik') }}" />
                        @error('nik')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi & NIK tidak boleh sama</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="tingkat" class="block text-sm mb-2">Tingkat</label>
                        <select id="tingkat" class="@error('tingkat') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" name="tingkat">
                            <option value="">Pilih Salah Satu</option>
                            @foreach ($sekolah as $item)
                                <option value="{{ $item->uuid }}" @if($item->uuid == old('tingkat')) selected @endif>{{ $item->kode }}</option>
                            @endforeach
                        </select>
                        @error('tingkat')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-3">
                        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
