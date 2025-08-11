@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Data Admin</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data admin yang dapat mengakses aplikasi ini</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        {{-- Add your dashboard content here --}}
        @if(session('success'))
                {{-- Error Alerts --}}
            <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-3 w-full" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Sukses!</span> {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
        <div class="mt-10">
            <a class="px-3 py-2 rounded-lg bg-amber-300 hover:bg-amber-400 focus:outline-0 focus:ring-5 focus:ring-amber-200" href="{{ route('user.create') }}">Tambah Admin</a>
        </div>
        <div class="mt-5 relative overflow-x-auto">
            <table class="w-full text-sm text-gray-500 text-left rtl:text-right text-gray-500" id="table-sekolah">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3"><span class="flex items-center">No <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Sekolah <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">NIK <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Nama Admin <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Role <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Action <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $item)
                        <tr class="bg-white border-b hover:bg-gray-50 text-gray-950">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $item->sekolah->kode ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $item->username }}</td>
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4">{{ $item->access }}</td>
                            <td class="px-6 py-4 flex items-center gap-1">
                                <a href="{{ route('user.edit',$item->uuid) }}" class="px-2 py-2 rounded-lg bg-amber-300 hover:bg-amber-400 focus:outline-0 focus:ring-5 focus:ring-amber-200 text-gray-900"><span class="material-icons-round" style="font-size:16px">edit</span></a>
                                <button data-uuid="{{ $item->uuid }}" class="px-2 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-0 focus:ring-5 focus:ring-blue-300 text-white reset-data"><span class="material-icons-round" style="font-size:16px">history</span></button>
                                <button data-uuid="{{ $item->uuid }}" class="px-2 py-2 rounded-lg bg-red-500 hover:bg-red-700 focus:outline-0 focus:ring-5 focus:ring-red-500 text-white hapus-data"><span class="material-icons-round" style="font-size:16px">delete</span></button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="module">
        $('#table-sekolah').on('click','.hapus-data',function() {
            var uuid = $(this).data('uuid');
            var hapusAdmin = function() {
                loading();
                var url = "{{ route('user.destroy',':id') }}";
                url = url.replace(':id',uuid);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        removeLoading();
                        cAlert("green","Sukses","Data Admin Berhasil Dihapus",true);
                    }

                })
            }
            cConfirm("Perhatian","Apakah anda yakin untuk menghapus admin ini",hapusAdmin);
        });
        $('#table-sekolah').on('click','.reset-data',function() {
            var uuid = $(this).data('uuid');
            function resetPassword() {
                loading();
                var url = "{{ route('user.resetPassword',':id') }}";
                url = url.replace(':id',uuid);
                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        removeLoading();
                        console.log(data);
                        oAlert("green","Sukses","<p>Password Admin Berhasil Di Reset</p><strong>Password Baru Adalah : "+data.password+"</strong>");
                    },
                    error: function(data) {
                        console.log(data.responseJSON.message);
                    }
                })
            }
            cConfirm("Perhatian","Apakah anda yakin untuk mereset password admin ini ?",resetPassword);
        })
    </script>
@endsection
