@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">HASIL SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur Interview Siswa SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        <div class="mt-10">
            <a class="button-d bg-green-400 hover:bg-green-600 focus:ring-green-400 w-full block sm:inline sm:w-auto mb-1" href="{{ route('spmb.cetak.siswa',$sekolah->uuid) }}">Cetak Daftar Siswa</a>
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
                        <th class="px-6 py-3" width="5%"><span class="flex items-center">No <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="15%"><span class="flex items-center">Nama Siswa<svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="7%"><span class="flex items-center">ID SPMB <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="5%"><span class="flex items-center">Gel <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="15%"><span class="flex items-center">Status <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="10%"><span class="flex items-center">Bank <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="15%"><span class="flex items-center">No VA <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="10%"><span class="flex items-center">Biaya <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3" width="15%"><span class="flex items-center">Show <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spmb_siswa as $siswa)
                        @php
                            $data_siswa = unserialize($siswa->biodata);
                            $nama_siswa = $data_siswa['nama'];
                            
                        @endphp
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600" data-uuid="{{ $siswa->uuid }}">
                            <td class="px-6 py-3">{{$loop->iteration}}</td>
                            <td class="px-6 py-3">{{ $nama_siswa }}</td>
                            <td class="px-6 py-3">{{ $siswa->nis }}</td>
                            <td class="px-6 py-3">{{ $siswa->gelombang }}</td>
                            <td class="px-6 py-3">
                                <select class="w-full px-2 py-1 fs-12 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" data-jenis="status">
                                    <option value="mendaftar" {{ $siswa->status == 'mendaftar' ? 'selected' : '' }}>Mendaftar</option>
                                    <option value="lulus" {{ $siswa->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
                                    <option value="tidak_lulus" {{ $siswa->status == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                                </select>
                            </td>
                            <td class="px-6 py-3 editable" data-jenis="bank" contenteditable="true">{{$siswa->bank}}</td>
                            <td class="px-6 py-3 editable" data-jenis="VA" contenteditable="true">{{$siswa->VA}}</td>
                            <td class="px-6 py-3 editable" data-jenis="biaya" contenteditable="true">{{$siswa->biaya}}</td>
                            <td class="px-6 py-3">
                                <select class="w-full px-2 py-1 fs-12 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" data-jenis="keterangan">
                                    <option value="" {{ $siswa->keterangan == '' ? 'selected' : '' }}>Pilih Salah Satu</option>
                                    <option value="1" {{ $siswa->keterangan == '1' ? 'selected' : '' }}>Tampilkan</option>
                                    <option value="0" {{ $siswa->keterangan == '0' ? 'selected' : '' }}>Sembunyikan</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="module">
        var textAwal;
        $('table').on('focus','.editable',function(){
            textAwal = $(this).text();
        });
        $('table').on('blur','.editable',function() {
            $('.editable').prop('contenteditable',false);
            loading();
            var ini = this;
            var values = $(this).text();
            var jenis = $(this).data('jenis');
            var id = $(this).closest('tr').data('uuid');
            
            if(textAwal != values) {
                var url = "{{ route('spmb.hasil.update',':id') }}";
                url = url.replace(':id',id);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        jenis: jenis,
                        nilai: values
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success == true) {
                            removeLoading();
                            $('.editable').prop('contenteditable',true);
                        }
                    },
                    error: function(xhr) {
                        removeLoading();
                        $('.editable').prop('contenteditable',true);
                        oAlert('Gagal menyimpan data. Silakan coba lagi.');
                    }
                });
            } else {
                removeLoading();
                $('.editable').prop('contenteditable',true);
            }
        });
        $('table').on('keydown','.editable',function(e){
            if(e.keyCode == 13) {
                e.preventDefault();
            }
        });
         $('table').on('change','select',function() {
            loading();
            var ini = this;
            var values = $(this).val();
            var jenis = $(this).data('jenis');
            var id = $(this).closest('tr').data('uuid');
            
            if(textAwal != values) {
                var url = "{{ route('spmb.hasil.update',':id') }}";
                url = url.replace(':id',id);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        jenis: jenis,
                        nilai: values
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success == true) {
                            removeLoading();
                        }
                    },
                    error: function(xhr) {
                        removeLoading();
                        oAlert('Gagal menyimpan data. Silakan coba lagi.');
                    }
                });
            } else {
                removeLoading();
            }
        });
    </script>
@endsection