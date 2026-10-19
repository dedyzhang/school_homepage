<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Siswa SPMB - {{ $biodata['nama'] ?? 'Calon Siswa' }} ({{ $spmb_siswa->nis }})</title>
    @include('layouts.head')
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm 15mm 10mm 15mm;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background-color: #fff !important;
                padding: 0 !important;
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .print-page {
                box-shadow: none !important;
                border: none !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
            }
        }
        .kop-border {
            border-bottom: 3px double #000;
        }
        .doc-content {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10.5pt;
            color: #111;
            line-height: 1.4;
        }
        .table-data {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }
        .table-data th, .table-data td {
            padding: 4px 6px;
            vertical-align: top;
        }
        .table-bordered {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5pt;
        }
        .table-bordered th {
            background-color: #f1f5f9;
            border: 1px solid #334155;
            padding: 5px 6px;
            text-align: center;
            font-weight: 600;
        }
        .table-bordered td {
            border: 1px solid #334155;
            padding: 5px 6px;
        }
        .section-header {
            font-size: 10.5pt;
            font-weight: bold;
            background-color: #e2e8f0;
            padding: 4px 8px;
            margin-top: 10px;
            margin-bottom: 6px;
            border-left: 4px solid #1e3a8a;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased font-sans">

    {{-- Top Action Bar (hidden on print) --}}
    <div class="no-print bg-slate-800 text-white px-4 py-3 sticky top-0 z-50 shadow-md flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <span class="material-icons-round text-emerald-400">print</span>
            <span class="font-semibold text-sm sm:text-base">Cetak Biodata Siswa: {{ $biodata['nama'] ?? 'Calon Siswa' }} ({{ $spmb_siswa->nis }})</span>
        </div>
        <div class="flex items-center space-x-3">
            <button onclick="window.print()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-xs sm:text-sm px-4 py-2 rounded-lg flex items-center gap-1.5 cursor-pointer shadow transition">
                <span class="material-icons-round text-base">print</span> Cetak Sekarang
            </button>
            <button onclick="window.close()" class="bg-gray-600 hover:bg-gray-700 text-white text-xs sm:text-sm px-3 py-2 rounded-lg cursor-pointer transition">
                Tutup
            </button>
        </div>
    </div>

    {{-- Printable Document Canvas (A4 Size) --}}
    <div class="print-page max-w-[840px] mx-auto my-6 p-8 bg-white shadow-xl rounded-sm border border-gray-200 doc-content">
        
        {{-- Kop Surat Resmi --}}
        @include('spmb.cetak.kop')

        {{-- Judul Dokumen --}}
        <div class="text-center mb-4">
            <h2 class="text-base sm:text-lg font-bold tracking-wide uppercase text-black underline">
                FORMULIR BIODATA PENDAFTARAN PESERTA DIDIK BARU
            </h2>
            <p class="text-xs text-gray-600 mt-0.5">
                Nomor Pendaftaran (ID SPMB): <strong class="font-mono text-black">{{ $spmb_siswa->nis }}</strong>
                &nbsp;|&nbsp; Gelombang: <strong class="text-black">{{ $spmb_siswa->gelombang }}</strong>
                &nbsp;|&nbsp; Tanggal Daftar: <strong class="text-black">{{ $spmb_siswa->created_at->format('d/m/Y H:i') }}</strong>
            </p>
        </div>

        {{-- Top Section: Pas Foto & Data Singkat --}}
        <div class="flex gap-4 items-start mb-2">
            <div class="flex-1">
                {{-- I. IDENTITAS PRIBADI SISWA --}}
                <div class="section-header">I. IDENTITAS PRIBADI SISWA</div>
                <table class="table-data">
                    <tr>
                        <td style="width: 28%;">Nama Lengkap</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 70%;" class="font-bold uppercase text-black">{{ $biodata['nama'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            @php
                                $jk = strtolower($biodata['jk'] ?? '');
                                echo ($jk == 'l' || $jk == 'laki-laki') ? 'Laki-laki' : (($jk == 'p' || $jk == 'perempuan') ? 'Perempuan' : '-');
                            @endphp
                        </td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td class="font-mono">{{ $biodata['nisn'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td class="font-mono">{{ $biodata['nik'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>No. Registrasi Akta</td>
                        <td>:</td>
                        <td>{{ $biodata['regis_akte'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            {{ $biodata['tempat_lahir'] ?? '-' }},
                            {{ !empty($biodata['tanggal_lahir']) ? \App\Helpers\SpmbHelper::formatTanggalIndonesia($biodata['tanggal_lahir']) : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ $biodata['agama'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Anak Ke- / Bersaudara</td>
                        <td>:</td>
                        <td>
                            Anak ke- {{ $biodata['anak_ke'] ?? '-' }} dari {{ $biodata['dari_ke'] ?? '-' }} bersaudara
                        </td>
                    </tr>
                    <tr>
                        <td>No. HP / WhatsApp</td>
                        <td>:</td>
                        <td>{{ $biodata['no_handphone'] ?? ($biodata['no_whatsapp'] ?? '-') }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Email</td>
                        <td>:</td>
                        <td>{{ $biodata['email'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tinggi / Berat Badan</td>
                        <td>:</td>
                        <td>
                            {{ !empty($biodata['tinggi_badan']) ? $biodata['tinggi_badan'].' cm' : '-' }} / 
                            {{ !empty($biodata['berat_badan']) ? $biodata['berat_badan'].' kg' : '-' }}
                        </td>
                    </tr>
                </table>
            </div>

            {{-- Pas Foto Box (3x4 cm) --}}
            <div class="shrink-0 text-center pt-2">
                @if(!empty($foto_siswa))
                    <div class="w-[3cm] h-[4cm] border border-gray-400 p-1 bg-white shadow-xs mx-auto overflow-hidden flex items-center justify-center">
                        <img src="{{ $foto_siswa }}" alt="Foto Siswa" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-[3cm] h-[4cm] border-2 border-dashed border-gray-300 rounded flex flex-col items-center justify-center text-gray-400 text-xs p-2 text-center mx-auto bg-gray-50">
                        <span class="material-icons-round text-2xl text-gray-300">person</span>
                        <span class="mt-1 font-medium">Pas Foto</span>
                        <span class="text-[10px]">3 x 4 cm</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- II. DATA TEMPAT TINGGAL --}}
        <div class="section-header">II. DATA TEMPAT TINGGAL</div>
        <table class="table-data">
            <tr>
                <td style="width: 25%;">Alamat Tempat Tinggal</td>
                <td style="width: 2%;">:</td>
                <td style="width: 73%;" colspan="4">{{ $biodata['alamat'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td>:</td>
                <td style="width: 25%;">{{ $biodata['rt_rw'] ?? '-' }}</td>
                <td style="width: 20%;">Kelurahan / Desa</td>
                <td style="width: 2%;">:</td>
                <td style="width: 26%;">{{ $biodata['kelurahan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>{{ $biodata['kecamatan'] ?? '-' }}</td>
                <td>Kabupaten / Kota</td>
                <td>:</td>
                <td>{{ $biodata['kabupaten'] ?? ($biodata['kota'] ?? '-') }}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>{{ $biodata['provinsi'] ?? '-' }}</td>
                <td>Tinggal Bersama</td>
                <td>:</td>
                <td>{{ $biodata['tinggal_dengan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Jarak ke Sekolah</td>
                <td>:</td>
                <td>{{ !empty($biodata['jarak']) ? $biodata['jarak'].' km' : '-' }}</td>
                <td>Alat Transportasi</td>
                <td>:</td>
                <td>{{ $biodata['transportasi'] ?? '-' }}</td>
            </tr>
        </table>

        {{-- III. DATA ORANG TUA / WALI --}}
        <div class="section-header">III. DATA ORANG TUA / WALI</div>
        <table class="table-bordered mt-1">
            <thead>
                <tr>
                    <th style="width: 25%;">Keterangan</th>
                    <th style="width: 25%;">Ayah Kandung</th>
                    <th style="width: 25%;">Ibu Kandung</th>
                    <th style="width: 25%;">Wali</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-medium bg-gray-50/50">Nama Lengkap</td>
                    <td class="font-semibold">{{ $biodata['nama_ayah'] ?? '-' }}</td>
                    <td class="font-semibold">{{ $biodata['nama_ibu'] ?? '-' }}</td>
                    <td>{{ $biodata['nama_wali'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-medium bg-gray-50/50">NIK</td>
                    <td class="font-mono">{{ $biodata['nik_ayah'] ?? '-' }}</td>
                    <td class="font-mono">{{ $biodata['nik_ibu'] ?? '-' }}</td>
                    <td class="font-mono">{{ $biodata['nik_wali'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-medium bg-gray-50/50">Tempat, Tgl Lahir</td>
                    <td>
                        {{ $biodata['tempat_lahir_ayah'] ?? '-' }}
                        @if(!empty($biodata['tanggal_lahir_ayah'])), {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia($biodata['tanggal_lahir_ayah']) }} @endif
                    </td>
                    <td>
                        {{ $biodata['tempat_lahir_ibu'] ?? '-' }}
                        @if(!empty($biodata['tanggal_lahir_ibu'])), {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia($biodata['tanggal_lahir_ibu']) }} @endif
                    </td>
                    <td>
                        {{ $biodata['tempat_lahir_wali'] ?? '-' }}
                        @if(!empty($biodata['tanggal_lahir_wali'])), {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia($biodata['tanggal_lahir_wali']) }} @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-medium bg-gray-50/50">Pendidikan Terakhir</td>
                    <td>{{ $biodata['pendidikan_ayah'] ?? '-' }}</td>
                    <td>{{ $biodata['pendidikan_ibu'] ?? '-' }}</td>
                    <td>{{ $biodata['pendidikan_wali'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-medium bg-gray-50/50">Pekerjaan</td>
                    <td>{{ $biodata['pekerjaan_ayah'] ?? '-' }}</td>
                    <td>{{ $biodata['pekerjaan_ibu'] ?? '-' }}</td>
                    <td>{{ $biodata['pekerjaan_wali'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-medium bg-gray-50/50">Penghasilan Bulanan</td>
                    <td>{{ $biodata['penghasilan_ayah'] ?? '-' }}</td>
                    <td>{{ $biodata['penghasilan_ibu'] ?? '-' }}</td>
                    <td>{{ $biodata['penghasilan_wali'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-medium bg-gray-50/50">No. Handphone / Telepon</td>
                    <td>{{ $biodata['handphone_ayah'] ?? '-' }}</td>
                    <td>{{ $biodata['handphone_ibu'] ?? '-' }}</td>
                    <td>{{ $biodata['handphone_wali'] ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        {{-- IV. DATA ASAL SEKOLAH & INFORMASI TAMBAHAN --}}
        <div class="section-header">IV. DATA ASAL SEKOLAH & INFORMASI LAINNYA</div>
        <table class="table-data">
            <tr>
                <td style="width: 25%;">Jenis Pendaftaran</td>
                <td style="width: 2%;">:</td>
                <td style="width: 73%;" colspan="4">
                    {{ ucfirst($biodata['jenis_pendaftaran'] ?? 'Siswa Baru') }}
                    @if(!empty($biodata['pindah_ke'])) (Pindah ke: {{ $biodata['pindah_ke'] }}) @endif
                </td>
            </tr>
            <tr>
                <td>Sekolah Asal</td>
                <td>:</td>
                <td colspan="4">{{ $biodata['sekolah_asal'] ?? '-' }}</td>
            </tr>
            @if(!empty($biodata['kps']) || !empty($biodata['kip']))
            <tr>
                <td>Penerima KPS / KIP</td>
                <td>:</td>
                <td style="width: 25%;">No. KPS: {{ $biodata['kps'] ?? '-' }}</td>
                <td style="width: 20%;">No. KIP</td>
                <td style="width: 2%;">:</td>
                <td style="width: 26%;">{{ $biodata['kip'] ?? '-' }}</td>
            </tr>
            @endif
            @if(!empty($spmb_siswa->pernyataan_setuju))
            <tr>
                <td>Status Pernyataan</td>
                <td>:</td>
                <td colspan="4">
                    Disetujui oleh: <strong>{{ $spmb_siswa->nama_penyetuju }}</strong>
                    @if($spmb_siswa->tanggal_pernyataan)
                        pada {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia($spmb_siswa->tanggal_pernyataan) }}
                    @endif
                </td>
            </tr>
            @endif
        </table>

        {{-- V. TANDA TANGAN & PENGESAHAN --}}
        <div class="mt-8 pt-4">
            <div class="flex justify-between items-start text-center">
                <div class="w-1/3">
                    <p class="text-xs text-gray-600 mb-1">Mengetahui,</p>
                    <p class="font-medium text-xs">Petugas / Panitia SPMB</p>
                    <div class="h-20"></div>
                    <p class="border-b border-black inline-block min-w-[160px] pb-0.5 font-bold text-xs"></p>
                    <p class="text-[10px] text-gray-500 mt-0.5">Tanda Tangan & Nama Terang</p>
                </div>

                <div class="w-1/3"></div>

                <div class="w-1/3">
                    <p class="text-xs text-gray-600 mb-1">
                        Tanjungpinang, {{ \App\Helpers\SpmbHelper::formatTanggalIndonesia(now()) }}
                    </p>
                    <p class="font-medium text-xs">Orang Tua / Wali Siswa</p>
                    <div class="h-20"></div>
                    <p class="border-b border-black inline-block min-w-[160px] pb-0.5 font-bold text-xs">
                        {{ $biodata['nama_ayah'] ?? ($biodata['nama_ibu'] ?? ($biodata['nama_wali'] ?? ($spmb_siswa->nama_penyetuju ?? '..................................'))) }}
                    </p>
                    <p class="text-[10px] text-gray-500 mt-0.5">Tanda Tangan & Nama Terang</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
