<!DOCTYPE html>
<html>
    <head>
        @include('layouts.head')
    </head>
    <body class="antialiased bg-gray-200 w-full overflow-x-hidden">
        <div class="w-full sm:w-[400px] px-4 py-5 border-2 border-gray-200 rounded-lg shadow-md bg-white mx-auto my-10">
            <h3 class="text-base font-medium text-gray-900 text-center">Kartu Pembayaran SPMB</h3>
            <h3 class="text-base font-medium text-gray-900 mb-4 text-center">{{$sekolah->nama}}</h3>
            <div class="text-sm">
                <ul class="mt-2">
                    <li>Nama Siswa : {{$biodata['nama']}}</li>
                    <li>NIS : {{$spmb_siswa->nis}}</li>
                </ul>
                <p class="mt-3"><b>I. Pembayaran Pendaftaran</b></p>
                <ul class="mt-2 list-disc list-inside">
                    <li><b>Nama Bank</b> : {{$spmb_siswa->bank}}</li>
                    <li><b>No Virtual Account</b> : {{$spmb_siswa->VA}}</li>
                    <li><b>Biaya</b> : {{$spmb_siswa->biaya}}</li>
                </ul>
                {!! $deskripsi !!}

                <p class="mt-3"><b>Lakukan Screenshot atau print kartu ini dan tunjukkan ke bank yang dituju untuk melakukan pembayaran</b></p>
            </div>
        </div>
    </body>
</html>