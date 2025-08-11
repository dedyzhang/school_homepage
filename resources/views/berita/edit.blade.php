@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Tambah Berita</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur Berita yang ingin dimasukkan didalam website sekolah</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        {{-- Add your dashboard content here --}}

        <div class="mt-5">
            <p class="text-md font-bold">Form Edit Berita</p>
            <form method="post" action="{{ route('berita.update',$berita->uuid)}}" enctype="multipart/form-data">
                @method('put');
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-4 mt-5">
                    <div class="mb-2 col-span-3">
                        <label for="judul" class="block text-sm mb-2">Judul Berita</label>
                        <input type="text" id="judul" name="judul" class="@error('judul') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" placeholder="Masukkan Judul Berita" value="{{ old('judul',$berita->judul) }}" />
                        @error('judul')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-3">
                        <label for="tingkat" class="block text-sm mb-2">Tingkat</label>
                        <select id="tingkat" class="@error('tingkat') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-200 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" name="tingkat" disabled>
                            <option value="">Pilih Salah Satu</option>
                            @foreach ($sekolah as $item)
                                <option value="{{ $item->uuid }}" @if($item->uuid == old('tingkat',$berita->sekolah->uuid)) selected @endif>{{ $item->kode }}</option>
                            @endforeach
                        </select>
                        @error('tingkat')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-4">
                        <label for="isi" class="block text-sm mb-2">Isi Berita</label>
                        <textarea id="textarea-tinymce" name="isi" id="isi">{{old('isi',$berita->isi)}}</textarea>
                        @error('isi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-4">
                        <div class="image-place w-full sm:w-[30%]">
                            <p class="text-sm text-gray-900 mb-2">Gambar Yang Diupload</p>
                            <img src="{{ asset('storage/berita/'.$berita->gambar) }}" />
                        </div>
                    </div>
                    <div class="mb-2 col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="gambar">Upload Gambar</label>
                        <input class="block w-full text-sm border rounded-lg cursor-pointer  @error('gambar') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border-gray-300 text-gray-900 placeholder-gray-700 @endif" id="gambar" name="gambar" type="file" placeholder="Masukkan File Gambar Yang Akan Diupload">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG atau JPG dengan size max.2MB .</p>
                        @error('gambar')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-3">
                        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        tinymce.init({
            selector: "#textarea-tinymce",
            theme: 'silver'
        });
    </script>
@endsection
