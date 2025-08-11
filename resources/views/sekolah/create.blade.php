@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Data Sekolah</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data Sekolah Naungan</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        {{-- Add your dashboard content here --}}

        <div class="mt-5">
            <p class="text-md font-bold">Form Penambahan Sekolah</p>
            <form method="post" action="{{ route('sekolah.store') }}">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-4 mt-5">
                    <div class="mb-2 col-span-3">
                        <label for="nama" class="block text-sm mb-2">Nama Sekolah</label>
                        <input type="text" id="nama" name="nama" class="@error('nama') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Nama Sekolah" value="{{ old('nama') }}" />
                        @error('nama')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="kode" class="block text-sm mb-2">Kode Sekolah <span class="text-red-500 text-xs">*) Kode dalam Huruf Kapital</span></label>
                        <input type="text" id="kode" name="kode" class="@error('kode') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Kode Sekolah" value="{{ old('kode') }}" />
                        @error('kode')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="alamat" class="block text-sm mb-2">Alamat Sekolah</label>
                        <textarea id="alamat" name="alamat" class="@error('alamat') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Alamat Sekolah" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="contact" class="block text-sm mb-2">Kontak Sekolah</label>
                        <input type="text" id="contact" name="contact" class="@error('contact') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Kontak Sekolah" value="{{ old('contact') }}" />
                        @error('contact')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="email" class="block text-sm mb-2">Email Sekolah</label>
                        <input type="text" id="email" name="email" class="@error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Email Sekolah" value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi dan Harus Berformat Email</p>
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
