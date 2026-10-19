@extends('layouts.mainhome')

@section('container')
    @php
        // Resolusi password awal (format DDMMYYYY dari tanggal lahir)
        if (!isset($pass) || empty($pass)) {
            if (isset($spmb) && !empty($spmb->biodata)) {
                $bio = is_array($spmb->biodata) ? $spmb->biodata : @unserialize($spmb->biodata);
                if (!empty($bio['tanggal_lahir'])) {
                    $pass = date('dmY', strtotime($bio['tanggal_lahir']));
                }
            }
        }
        $pass = $pass ?? '-';

        // Resolusi nama calon siswa
        $nama_pendaftar = '';
        if (isset($biodata) && !empty($biodata['nama'])) {
            $nama_pendaftar = $biodata['nama'];
        } elseif (isset($spmb) && !empty($spmb->biodata)) {
            $bio = is_array($spmb->biodata) ? $spmb->biodata : @unserialize($spmb->biodata);
            $nama_pendaftar = $bio['nama'] ?? '';
        }
    @endphp

    <style>
        @media print {
            .no-print, header, footer, .section-4, #first-div, .long-horizontal-wrapper {
                display: none !important;
            }
            body {
                background: #ffffff !important;
                margin: 0 !important;
                padding: 10mm !important;
            }
            .print-card {
                box-shadow: none !important;
                border: 1px solid #94a3b8 !important;
                margin: 0 !important;
                width: 100% !important;
            }
        }
    </style>

    <div id="first-div" class="no-print flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[500] w-screen bg-black/50">
                <img class="w-screen h-[500] background-horizontalscroll object-cover brightness-75" src="{{ Vite::asset('resources/images/header/spmb.png') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-8xl font-bold">SPMB {{$sekolah->kode}}</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Sistem Penerimaan Siswa Baru</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center w-[95%] my-12 md:my-16 md:w-[85%] lg:w-[75%] mx-auto px-4 sm:px-8 md:px-12 flex-wrap text-center py-10 md:py-14 border border-slate-200 bg-white rounded-3xl shadow-2xl print-card">
        {{-- Success Icon & Header --}}
        <div class="w-full flex justify-center mb-3">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center ring-8 ring-green-50 shadow-inner">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 w-full mb-2">Pendaftaran Berhasil!</h2>
        <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto mb-8">
            Data pendaftaran calon peserta didik baru telah berhasil tersimpan di sistem <strong class="text-blue-900">{{ $sekolah->nama }}</strong>.
        </p>

        {{-- KOTAK KREDENSIAL AKUN LOGIN (USERNAME & PASSWORD) --}}
        <div class="w-full max-w-xl mx-auto bg-gradient-to-br from-blue-50/90 via-indigo-50/70 to-slate-50 border-2 border-blue-400/80 rounded-2xl p-5 sm:p-7 shadow-lg text-left mb-8">
            <div class="flex items-center justify-between pb-4 border-b border-blue-200/80 mb-5">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center shadow-xs">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-base sm:text-lg">Akun Login Calon Siswa</h3>
                        <p class="text-xs text-gray-500">Gunakan akun ini untuk masuk ke portal penerimaan siswa</p>
                    </div>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-green-100 text-green-800 border border-green-200">
                    Akun Aktif
                </span>
            </div>

            @if(!empty($nama_pendaftar))
                <div class="mb-4 pb-3 border-b border-blue-100 text-xs sm:text-sm text-gray-700">
                    <span class="text-gray-500">Nama Pendaftar:</span>
                    <strong class="text-gray-900 ms-1">{{ $nama_pendaftar }}</strong>
                </div>
            @endif

            {{-- Row 1: Username / NIS --}}
            <div class="mb-4">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                    <span>Username (NIS)</span>
                    <span class="text-[11px] font-normal text-blue-700 bg-blue-100/70 px-2 py-0.5 rounded">ID Login</span>
                </label>
                <div class="flex items-center gap-2 bg-white border-2 border-blue-300 rounded-xl p-2.5 sm:p-3 shadow-xs focus-within:border-blue-600 transition">
                    <div class="text-gray-400 px-1">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input type="text" id="credential-username" value="{{ $nis }}" readonly class="w-full bg-transparent font-mono font-bold text-lg sm:text-xl text-blue-900 outline-none border-none p-0 focus:ring-0 select-all cursor-text tracking-wide" />
                    <button type="button" onclick="salinKredensial('credential-username', this)" class="no-print px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold flex items-center gap-1.5 shadow-xs transition cursor-pointer shrink-0 active:scale-95">
                        <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                        <span class="btn-text">Salin</span>
                    </button>
                </div>
            </div>

            {{-- Row 2: Password --}}
            <div class="mb-4">
                <div class="flex items-center justify-between mb-1.5">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider flex items-center gap-1.5">
                        <span>Password Awal</span>
                        <span class="text-[11px] font-normal text-amber-800 bg-amber-100 px-2 py-0.5 rounded">Format Tanggal Lahir</span>
                    </label>
                    <span class="text-[11px] text-gray-500 italic">DDMMYYYY ({{ $pass }})</span>
                </div>
                <div class="flex items-center gap-2 bg-white border-2 border-blue-300 rounded-xl p-2.5 sm:p-3 shadow-xs focus-within:border-blue-600 transition">
                    <div class="text-gray-400 px-1">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input type="text" id="credential-password" value="{{ $pass }}" readonly class="w-full bg-transparent font-mono font-bold text-lg sm:text-xl text-gray-900 outline-none border-none p-0 focus:ring-0 select-all cursor-text tracking-wider" />
                    
                    {{-- Toggle Hide/Show Button --}}
                    <button type="button" onclick="togglePasswordDisplay(this)" class="no-print p-1.5 text-gray-400 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition cursor-pointer" title="Sembunyikan / Tampilkan Password">
                        <svg id="eye-icon-visible" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        <svg id="eye-icon-hidden" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path></svg>
                    </button>

                    <button type="button" onclick="salinKredensial('credential-password', this)" class="no-print px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold flex items-center gap-1.5 shadow-xs transition cursor-pointer shrink-0 active:scale-95">
                        <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                        <span class="btn-text">Salin</span>
                    </button>
                </div>
            </div>

            {{-- Action Salin Semua Info Akun --}}
            <div class="pt-3 border-t border-blue-200/80 flex flex-col sm:flex-row items-center justify-between gap-3">
                <button type="button" id="btn-salin-semua" onclick="salinSemuaDataAkun()" class="no-print w-full sm:w-auto py-2 px-4 bg-white hover:bg-blue-50 border border-blue-400 text-blue-700 hover:text-blue-900 rounded-lg text-xs font-bold flex items-center justify-center gap-2 shadow-xs transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    <span id="btn-salin-semua-text">Salin Semua Informasi Akun</span>
                </button>
                <span class="text-[11px] text-gray-500 italic text-center sm:text-right">
                    * Harap simpan atau screenshot akun ini
                </span>
            </div>

            {{-- Information box --}}
            <div class="mt-4 p-3 bg-blue-100/60 rounded-lg text-xs text-blue-900 leading-relaxed flex items-start gap-2">
                <svg class="w-4 h-4 text-blue-700 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <strong>Penting:</strong> Akun di atas digunakan untuk login ke portal SPMB guna mengunggah berkas persyaratan, melihat jadwal seleksi & wawancara, serta memeriksa pengumuman kelulusan.
                </div>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="no-print w-full flex flex-wrap justify-center gap-3 sm:gap-4 mb-6">
            {{-- Tombol Masuk ke Halaman Login (Username otomatis terisi) --}}
            <a href="/user/signin?username={{ $nis }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl px-6 sm:px-8 py-3.5 flex items-center gap-2 shadow-lg hover:shadow-xl transition transform active:scale-95 text-sm sm:text-base">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                <span>Masuk ke Halaman Login</span>
            </a>

            {{-- Tombol Cetak Surat Pernyataan --}}
            @if(isset($spmb) && $spmb != null && $spmb->pernyataan_setuju)
                <a href="{{ route('home.spmb.cetak.pernyataan', [$sekolah->uuid, $spmb->uuid]) }}" target="_blank" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl px-6 py-3.5 flex items-center gap-2 shadow-md hover:shadow-lg transition text-sm sm:text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    <span>Cetak Surat Pernyataan</span>
                </a>
            @endif

            {{-- Tombol Cetak Bukti Pendaftaran / Akun --}}
            <button type="button" onclick="window.print()" class="bg-slate-700 hover:bg-slate-800 text-white font-semibold rounded-xl px-5 sm:px-6 py-3.5 flex items-center gap-2 shadow-md hover:shadow-lg transition text-sm sm:text-base cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                <span>Cetak Bukti Pendaftaran</span>
            </button>
        </div>

        @if(isset($spmb) && $spmb != null && $spmb->pernyataan_setuju)
            <p class="no-print text-xs sm:text-sm text-green-800 font-medium w-full">
                * Surat pernyataan telah berhasil disetujui oleh: <strong>{{ $spmb->nama_penyetuju }}</strong>. Simpan atau cetak surat pernyataan sebagai bukti sah pendaftaran.
            </p>
        @endif
    </div>

    <div class="long-horizontal-wrapper flex justify-center items-center no-print">
        <div class="h-[200px] w-full">
            <img class="w-screen h-[300px] long-horizontal object-cover" src="{{ Vite::asset('resources/images/spmb/all_spmb_student.svg') }}"/>
        </div>
    </div>

    <script>
        function salinKredensial(inputId, btn) {
            const input = document.getElementById(inputId);
            if (!input) return;
            
            // Simpan tipe asli jika password
            const originalType = input.type;
            if (input.type === 'password') {
                input.type = 'text';
            }
            
            input.select();
            input.setSelectionRange(0, 99999);
            
            try {
                navigator.clipboard.writeText(input.value).then(function() {
                    berikanFeedbackSalin(btn);
                }).catch(function() {
                    document.execCommand('copy');
                    berikanFeedbackSalin(btn);
                });
            } catch(e) {
                document.execCommand('copy');
                berikanFeedbackSalin(btn);
            }
            
            input.type = originalType;
        }

        function berikanFeedbackSalin(btn) {
            if (!btn) return;
            const textEl = btn.querySelector('.btn-text');
            const originalText = textEl ? textEl.innerText : 'Salin';
            if (textEl) textEl.innerText = 'Tersalin!';
            btn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            btn.classList.add('bg-green-600', 'hover:bg-green-700');
            
            setTimeout(function() {
                if (textEl) textEl.innerText = originalText;
                btn.classList.remove('bg-green-600', 'hover:bg-green-700');
                btn.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }, 2000);
        }

        function togglePasswordDisplay(btn) {
            const input = document.getElementById('credential-password');
            const iconVisible = document.getElementById('eye-icon-visible');
            const iconHidden = document.getElementById('eye-icon-hidden');
            if (!input) return;
            
            if (input.type === 'password') {
                input.type = 'text';
                iconVisible.classList.remove('hidden');
                iconHidden.classList.add('hidden');
            } else {
                input.type = 'password';
                iconVisible.classList.add('hidden');
                iconHidden.classList.remove('hidden');
            }
        }

        function salinSemuaDataAkun() {
            const username = document.getElementById('credential-username').value;
            const password = document.getElementById('credential-password').value;
            const nama = "{{ $nama_pendaftar }}";
            const sekolah = "{{ $sekolah->nama }}";
            const loginUrl = window.location.origin + '/user/signin?username=' + encodeURIComponent(username);

            const teksSalin = 
`AKUN PENDAFTARAN SPMB
Sekolah: ${sekolah}
Nama Calon Siswa: ${nama}
Username / NIS: ${username}
Password: ${password}
Link Login: ${loginUrl}

Simpan informasi ini dengan baik untuk login ke sistem SPMB.`;

            navigator.clipboard.writeText(teksSalin).then(function() {
                const btnText = document.getElementById('btn-salin-semua-text');
                const originalText = btnText.innerText;
                btnText.innerText = 'Semua Info Berhasil Tersalin!';
                const btn = document.getElementById('btn-salin-semua');
                btn.classList.remove('bg-white', 'text-blue-700');
                btn.classList.add('bg-green-100', 'text-green-800', 'border-green-400');
                
                setTimeout(function() {
                    btnText.innerText = originalText;
                    btn.classList.remove('bg-green-100', 'text-green-800', 'border-green-400');
                    btn.classList.add('bg-white', 'text-blue-700');
                }, 2500);
            }).catch(function() {
                alert('Gagal menyalin teks secara otomatis. Silakan salin manual.');
            });
        }
    </script>
@endsection
