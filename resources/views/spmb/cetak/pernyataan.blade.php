<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan SPMB - {{ $biodata['nama'] ?? 'Calon Siswa' }} ({{ $spmb_siswa->nis }})</title>
    @include('layouts.head')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background-color: #fff !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .print-page {
                box-shadow: none !important;
                border: none !important;
                margin: 0 !important;
                padding: 10mm 15mm !important;
                width: 100% !important;
                max-width: 100% !important;
            }
        }
        .kop-border {
            border-bottom: 3px double #000;
        }
        .surat-content {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11.5pt;
            line-height: 1.6;
            color: #111;
        }
        .surat-content table {
            font-size: 11.5pt;
        }
        .surat-content p {
            margin-bottom: 0.6em;
            text-align: justify;
        }
        .surat-content ol, .surat-content ul {
            margin-bottom: 0.8em;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased font-sans">

    {{-- Top Action Bar (hidden on print) --}}
    <div class="no-print bg-slate-800 text-white px-4 py-3 sticky top-0 z-50 shadow-md flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <span class="material-icons-round text-blue-400">description</span>
            <span class="font-semibold text-sm sm:text-base">Bukti Surat Pernyataan Pendaftaran SPMB</span>
        </div>
        <div class="flex items-center space-x-3">
            <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs sm:text-sm px-4 py-2 rounded-lg flex items-center gap-1.5 cursor-pointer shadow transition">
                <span class="material-icons-round text-base">print</span> Cetak Sekarang
            </button>
            <button onclick="window.close()" class="bg-gray-600 hover:bg-gray-700 text-white text-xs sm:text-sm px-3 py-2 rounded-lg cursor-pointer transition">
                Tutup
            </button>
        </div>
    </div>

    {{-- Printable Document Canvas --}}
    <div class="print-page max-w-[820px] mx-auto my-6 p-10 bg-white shadow-xl rounded-sm border border-gray-200">
        
        {{-- Kop Surat Resmi --}}
        @include('spmb.cetak.kop')

        {{-- Nomor & Tanda Bukti --}}
        <div class="flex justify-between items-center text-xs text-gray-600 mb-4 px-1 pb-2 border-b border-gray-200">
            <div>
                <span>Nomor Pendaftaran (ID SPMB): </span>
                <strong class="text-black font-mono text-sm">{{ $spmb_siswa->nis }}</strong>
            </div>
            <div>
                <span>Waktu Persetujuan: </span>
                <strong class="text-black">{{ \App\Helpers\SpmbHelper::formatTanggalIndonesia($spmb_siswa->tanggal_pernyataan ?? $spmb_siswa->created_at) }}</strong>
            </div>
        </div>

        {{-- Dynamic Surat Pernyataan Content --}}
        <div class="surat-content px-2">
            {!! $spmb_siswa->isi_pernyataan !!}
        </div>

        {{-- Tanda Tangan & Bukti Persetujuan Digital --}}
        <div class="surat-content mt-8 pt-4 px-2">
            <div class="grid grid-cols-2 gap-4 text-center">
                <div>
                    <p class="mb-1">Mengetahui,</p>
                    <p class="font-bold mb-16">{{ $sekolah->nama }}</p>
                    <p class="font-bold underline uppercase">Panitia SPMB</p>
                </div>
                <div>
                    <p class="mb-1">
                        Tanjungpinang, {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia($spmb_siswa->tanggal_pernyataan ?? $spmb_siswa->created_at) }}
                    </p>
                    <p class="font-bold mb-2">Yang Menyatakan / Menyetujui,</p>
                    <div class="my-3 py-2 px-3 border border-dashed border-green-600 bg-green-50 rounded text-center inline-block">
                        <span class="text-[10px] text-green-800 font-sans block font-semibold uppercase tracking-wider">
                            &#10003; Telah Disetujui Secara Digital
                        </span>
                        <span class="text-[9px] text-gray-600 font-sans block">
                            Pada {{ date('d/m/Y H:i', strtotime($spmb_siswa->tanggal_pernyataan ?? $spmb_siswa->created_at)) }} WIB
                        </span>
                    </div>
                    <p class="font-bold underline uppercase mt-2">
                        {{ $spmb_siswa->nama_penyetuju ?: ($biodata['nama_penyetuju'] ?? $biodata['nama']) }}
                    </p>
                    <p class="text-xs text-gray-600">(Orang Tua / Wali / Calon Siswa)</p>
                </div>
            </div>
        </div>

        {{-- Footer Verifikasi Dokumen --}}
        <div class="mt-12 pt-3 border-t border-gray-300 text-[10px] text-gray-500 flex justify-between items-center">
            <div>
                <p>Dokumen ini adalah bukti resmi persetujuan surat pernyataan pendaftaran secara elektronik melalui SPMB {{ $sekolah->nama }}.</p>
                <p>Dicetak pada: {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia(now()) }} {{ date('H:i:s') }} WIB</p>
            </div>
            <div class="font-mono text-right text-[9px] text-gray-400">
                NIS: {{ $spmb_siswa->nis }}
            </div>
        </div>

    </div>

</body>
</html>
