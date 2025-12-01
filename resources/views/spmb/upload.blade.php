@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">UPLOAD BERKAS SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengupload/menggungah Berkas SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
    
    </div>
    <div class="p-4 mt-5 bg-white rounded-lg shadow-md">
        <p>Form Upload Berkas Siswa</p>
        <p>Uploadlah Dokumen Sesuai dengan ketentuannya</p>
        @error('file_berkas')
            <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-3" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Error!</span> {{ $message }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @enderror
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-2">
            @foreach ($berkas_array as $item)
                <div class="col-span-1 border border-gray-100 rounded-lg p-4 shadow-md">
                    <div class="bg-blue-50 py-2 px-4 rounded-lg">
                        <p class="text-base font-bold">{{ $item['nama_berkas'] }}</p>
                        <p class="text-sm">{{ $item['deskripsi_berkas'] }}</p>
                    </div>
                    <form action="{{ route('spmb.admin.upload.store',$spmb_siswa->uuid) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="input-group">
                            @if (session('success'.$item['nama_berkas']))
                                <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-3" role="alert">
                                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Sukses!</span> Berkas berhasil diupload
                                    </div>
                                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            
                            <input type="hidden" name="nama_berkas" value="{{ $item['nama_berkas'] }}" />
                            @php
                                $nama_berkas = $item['nama_berkas'];
                                $berkas_ini = current(array_filter($siswa_berkas,function($elem) use ($nama_berkas) {
                                    return $elem['nama_berkas'] == $nama_berkas;
                                }));
                            @endphp
                            @if ($berkas_ini)
                                <div class="flex items-center justify-center w-full mt-3 flex-wrap">
                                    <div class="image-box">
                                        <img class="rounded-lg object-contain h-50 w-full" src="{{asset('storage/'.$berkas_ini['lokasi_berkas']) }}">
                                    </div>
                                    <button type="button" data-file="{{ $berkas_ini['nama_berkas'] }}" class="hapus_berkas w-full mt-3 bg-red-500 text-white hover:bg-red-700 px-2 py-1.5 rounded-lg cursor-pointer">Hapus Gambar</button>
                                </div>
                            @else
                                <div class="flex items-center justify-center w-full mt-3">
                                    <label for="file-berkas{{ $loop->iteration }}" class="flex flex-col items-center justify-center w-full h-64 bg-gray-50 border border-dashed border-default border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"/></svg>
                                            <p class="mb-2 text-sm"><span class="font-semibold">Klik Disini untuk Upload</span></p>
                                            <p class="text-xs">Format dalam bentuk gambar (Max. 5mb)</p>
                                        </div>
                                        <input id="file-berkas{{ $loop->iteration }}" name="file_berkas" type="file" class="hidden berkas-file" />
                                    </label>
                                </div>
                                <div class="file_name mt-3 hidden flex align-center">
                                    <span class="material-icons-two-tone me-2">insert_drive_file</span> <i class="nama_file text-sm"></i></p>
                                </div>
                                <div class="button-place">
                                    <button type="submit" class="mt-3 w-full bg-blue-600 text-white py-1.5 px-4 rounded-lg hover:bg-blue-700 cursor-pointer">Upload Berkas</button>
                                </div>
                            @endif
                            
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    <script type="module">
        $('.berkas-file').on('change',function() {
            var fileName = $(this).val().split('\\').pop();
            if(fileName) {
                $(this).closest('.input-group').find('.file_name .nama_file').text(fileName);
                $(this).closest('.input-group').find('.file_name').removeClass('hidden');
            }
        });
        $('.hapus_berkas').on('click',function() {
            var file = $(this).data('file');
            var id = '{{ $spmb_siswa->uuid }}';
            cConfirm("Perhatian","Yakin untuk menghapus gambar ini",function() {
                loading();
                var url = "{{ route('spmb.admin.upload.delete',':id') }}";
                url = url.replace(':id',id);
                $.ajax({
                    type: "post",
                    url : url,
                    headers: {'X-CSRF_TOKEN' : '{{ csrf_token() }}'},
                    data: {'berkas' : file},
                    success : function(data) {
                        removeLoading();
                        cAlert("green","Berhasil","Gambar Berhasil Dihapus",true);
                    },
                    error: function(data) {
                        console.log(data.responseText.message);
                    }
                })
            });
        });
    </script>
@endsection