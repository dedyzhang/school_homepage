@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>

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
    <div class="p-4 bg-white rounded-lg shadow-md mt-5">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <p>Masukkan Informasi SPMB yang lengkap untuk ditampilkan dihalaman depan website Sekolah</p>
            </div>
            <form action="{{ route('spmb.informasi.store',$sekolah->uuid) }}" method="POST">
                @csrf
                <div class="col-span-1 mt-3">
                    <label for="isi" class="block text-sm mb-2">Informasi SPMB</label>
                    <textarea id="textarea-tinymce" name="isi" id="isi" rows="30">{{old('isi',$isi)}}</textarea>
                    @error('isi')
                        <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-1 mt-3">
                    <button type="submit" class="w-full sm:w-auto rounded-lg bg-blue-500 text-white hover:bg-blue-800 px-2 py-1.5 cursor-pointer">Tambahkan Informasi</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var urlUpload = "route('spmb.informasi.upload',':id')";
        urlUpload = urlUpload.replace(':id','{{ $sekolah->uuid }}');
        tinymce.init({
            selector: "#textarea-tinymce",
            theme: 'silver',
            plugins: 'fullscreen, link, image, table, code, lists, emoticons, advlist, charmap, searchreplace, codesample',
            toolbar: [
            'undo redo | forecolor backcolor | formatting | align | outdent indent lineheight |  numlist bullist | blockquote | link | image | table | code | template | symbol | searchreplace | fullscreen ',
            'sizeselect | styles fontfamily | fontsize'
            ],
            content_style: "body {line-height: 2}",
            setup: function (editor) {
                editor.on('init', function () {
                // Example: Wrap the entire content in a div on initialization
                let content = editor.getContent();
                editor.setContent('<div class="initial-wrapper">' + content + '</div>');
                });
            },
        });
    </script>
@endsection