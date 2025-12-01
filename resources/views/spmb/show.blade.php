@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        <div class="mt-10 col-span-1">
            <a class="button-d bg-amber-300 hover:bg-amber-400 focus:ring-amber-200" href="{{ route('spmb.settings',$sekolah->uuid) }}">Setting SPMB</a>
            <a class="button-d bg-blue-400 hover:bg-blue-600 focus:ring-blue-400" href="{{ route('spmb.daftar',$sekolah->uuid) }}">Tambah Siswa</a>
            <a class="button-d bg-blue-400 hover:bg-blue-600 focus:ring-blue-400" href="{{ route('spmb.informasi',$sekolah->uuid) }}">Informasi SPMB</a>
        </div>
    </div>
    @if(session('success'))
        <div class="p-4 mt-5 bg-white rounded-lg shadow-md">
            <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-3" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Sukses!</span> {!! session('success') !!}
                </div>
                
            </div>
        </div>
    @endif
    <div class="p-4 mt-5 bg-white rounded-lg shadow-md">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-gray-500 text-left rtl:text-right text-gray-500" id="table-sekolah">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3"><span class="flex items-center">No <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Nama Siswa<svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">ID SPMB <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Gelombang <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Jumlah Berkas <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Tanggal Daftar <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Action <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
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
                            <td class="px-6 py-3">{{$jumlah_berkas}}</td>
                            <td class="px-6 py-3">{{ $siswa->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-3 gap-1 flex">
                                <a href="{{ route('spmb.siswa.detail',$siswa->uuid) }}" class="px-2 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-0 focus:ring-5 focus:ring-blue-500 text-white"><span class="material-icons-round" style="font-size:16px">visibility</span></a>
                                <a href="{{ route('spmb.siswa.get.upload',$siswa->uuid) }}" class="px-2 py-2 rounded-lg bg-green-500 hover:bg-green-700 focus:outline-0 focus:ring-5 focus:ring-green-500 text-white"><span class="material-icons-round" style="font-size:16px">insert_drive_file</span></a>
                                <a href="{{ route('spmb.edit',$siswa->uuid) }}" class="px-2 py-2 rounded-lg bg-orange-500 hover:bg-orange-700 focus:outline-0 focus:ring-5 focus:ring-orange-500 text-white"><span class="material-icons-round" style="font-size:16px">create</span></a>
                                <button data-siswa="{{ $siswa->uuid }}" class="hapus-siswa px-2 py-2 rounded-lg bg-red-700 hover:bg-red-900 focus:outline-0 focus:ring-5 focus:ring-red-500 text-white"><span class="material-icons-round" style="font-size:16px">delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="module">
        $('#table-sekolah').on('click','.hapus-siswa',function(){
            var id = $(this).data('siswa');
            cConfirm("Perhatian","Yakin untuk menghapus data Calon Siswa Bersangkutan",function() {
                loading();
                var url = "{{ route('spmb.delete',':id') }}";
                url = url.replace(':id',id);
                $.ajax({
                    type: "post",
                    url : url,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(data) {
                        removeLoading();
                        cAlert("green","Berhasil","Data siswa berhasil dihapus",true);
                    },
                    error: function(data) {
                        console.log(data.responseText.message);
                    }
                    
                })
            })
        })
    </script>
@endsection