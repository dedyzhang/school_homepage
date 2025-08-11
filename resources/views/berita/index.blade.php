@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Data Berita</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur Berita yang ingin dimasukkan didalam website sekolah</p>
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
            <a class="px-3 py-2 rounded-lg bg-amber-300 hover:bg-amber-400 focus:outline-0 focus:ring-5 focus:ring-amber-200" href="{{ route('berita.create') }}">Tambah Berita</a>
        </div>
        <div class="mt-5 relative overflow-x-auto">
            <table class="w-full text-sm text-gray-500 text-left rtl:text-right text-gray-500" id="table-sekolah">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3"><span class="flex items-center">No <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Tanggal <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3 min-w-48 md:min-w-md"><span class="flex items-center">Judul <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Tingkat <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                        <th class="px-6 py-3"><span class="flex items-center">Action <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg></span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $item)
                        <tr class="bg-white border-b hover:bg-gray-50 text-gray-950">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ date('d M Y, H:i',strtotime($item->tanggal)) }}</td>
                            <td class="px-6 py-4">{{ Str::limit($item->judul, 50, '...') }}</td>
                            <td class="px-6 py-4">{{ $item->sekolah->kode ?? 'N/A' }}</td>
                            <td class="px-6 py-4 flex items-center gap-1">
                                <button data-uuid="{{ $item->uuid }}" class="px-2 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-0 focus:ring-5 focus:ring-blue-300 text-white preview-berita"><span class="material-icons-round" style="font-size:16px">remove_red_eye</span></button>
                                <a href="{{ route('berita.edit',$item->uuid) }}" class="px-2 py-2 rounded-lg bg-amber-300 hover:bg-amber-400 focus:outline-0 focus:ring-5 focus:ring-amber-200 text-gray-900"><span class="material-icons-round" style="font-size:16px">edit</span></a>
                                <button data-uuid="{{ $item->uuid }}" class="px-2 py-2 rounded-lg bg-red-500 hover:bg-red-700 focus:outline-0 focus:ring-5 focus:ring-red-500 text-white hapus-data"><span class="material-icons-round" style="font-size:16px">delete</span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Modal Berita --}}
    <div id="modal-preview-berita" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-[80%]">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Artikel
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white tutup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="picture-place flex align-center justify-center">
                        <div class="w-full sm:w-[50%]">
                            <img src="" class="image_berita" />
                        </div>
                    </div>
                    <h5 class="text-3xl text-gray-900 font-bold m-0 p-0 mt-10 judul_berita"></h5>
                    <p class="text-gray-800 italic text-md p-0 m-0 tingkat_berita"></p>
                    <p class="text-gray-600 text-md">Dibuat Pada Tanggal <span class="tanggal_berita"></span></p>
                    <div class="text-gray-900 text-sm leading-7 text-justify isi_berita">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="module">
        const $targetEl = document.getElementById("modal-preview-berita");

        // options with default values
        const options = {
            placement: "center",
            backdrop: "dynamic",
            backdropClasses: "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
            closable: true,
        };

        $('#table-sekolah').on('click','.preview-berita',function() {
            var uuid = $(this).data('uuid');
            var url = "{{ route('berita.show',':id') }}";
            url = url.replace(':id',uuid);
            loading();

            $.ajax({
                type: "get",
                url: url,
                success: function(data) {
                    if(data.success == true) {
                        var beritaImageUrl = "{{ asset('storage/berita/:image') }}";
                        beritaImageUrl = beritaImageUrl.replace(':image',data.berita.gambar);
                        $('.image_berita').attr('src',beritaImageUrl);
                        $('.judul_berita').text(data.berita.judul);
                        $('.tingkat_berita').text('Author Admin '+data.tingkat);

                        var tanggal = moment(data.berita.tanggal).format('DD MMMM YYYY hh:mm:ss');
                        $('.tanggal_berita').text(tanggal);
                        $('.isi_berita').html(data.berita.isi);

                        setTimeout(() => {
                            removeLoading();
                            const modal = new Modal($targetEl,options);
                            modal.toggle();

                            $('.tutup-modal').on('click',function() {
                                modal.hide();
                            })
                        }, 500);
                    }
                }
            });
        });
        $('#table-sekolah').on('click','.hapus-data',function() {
            var uuid = $(this).data('uuid');
            var hapusData = () => {
                loading();
                var url = "{{ route('berita.destroy',':id') }}";
                url = url.replace(':id',uuid);
                $.ajax({
                    type: "delete",
                    url: url,
                    headers: {'X-CSRF-TOKEN' : '{{ csrf_token() }}'},
                    success: function() {
                        removeLoading();
                        cAlert("green","Berhasil","Data Berhasil Dihapus",true);
                    }
                })
            };
            cConfirm("Perhatian","Apa anda yakin untuk menghapus data berita ini",hapusData);
        });
    </script>
@endsection
