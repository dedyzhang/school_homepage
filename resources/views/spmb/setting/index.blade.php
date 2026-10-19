@extends('layouts.main')

@section('container')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('spmb.settings.index') }}" class="p-2.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition flex items-center justify-center shrink-0" title="Kembali ke Daftar Sekolah">
                    <span class="material-icons-round text-xl">arrow_back</span>
                </a>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <h1 class="text-xl md:text-2xl font-bold text-gray-900">Settings SPMB {{ $sekolah->nama }}</h1>
                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $sekolah->kode }}</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-0.5">Konfigurasi alur, formulir, berkas, wawancara, dan surat pernyataan pendaftaran</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ $mode_pendaftaran == 'online' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $mode_pendaftaran == 'online' ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
                    Mode: {{ ucfirst($mode_pendaftaran ?? 'Offline') }}
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ ($status['status'] ?? '') == 'buka' ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ ($status['status'] ?? '') == 'buka' ? 'bg-blue-500' : 'bg-rose-500' }}"></span>
                    Status: {{ ucfirst($status['status'] ?? 'Tutup') }} (Gel. {{ $status['gelombang'] ?? '1' }})
                </span>
            </div>
        </div>

        <!-- Quick Nav Pills -->
        <div class="flex items-center gap-2 overflow-x-auto pt-4 mt-4 border-t border-gray-100 text-xs md:text-sm">
            <a href="#sec-umum" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">tune</span> Mode & Gelombang
            </a>
            <a href="#sec-formulir" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">fact_check</span> Formulir Pendaftaran
            </a>
            <a href="#sec-berkas" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">folder_open</span> Berkas Persyaratan
            </a>
            <a href="#sec-interview" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">record_voice_over</span> Form Interview
            </a>
            <a href="#sec-hasil" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">campaign</span> Pengumuman Hasil
            </a>
            <a href="#sec-pernyataan" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">verified_user</span> Surat Pernyataan
            </a>
            <a href="#sec-kop" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-blue-50 hover:text-blue-600 text-gray-600 font-medium transition whitespace-nowrap">
                <span class="material-icons-round text-base text-gray-400">branding_watermark</span> Kop Surat
            </a>
        </div>
    </div>

    @if(session('success'))
        <div id="alert-1" class="flex items-center p-4 text-sm text-emerald-800 rounded-xl bg-emerald-50 border border-emerald-200" role="alert">
            <span class="material-icons-round text-xl me-2 text-emerald-600">check_circle</span>
            <div class="flex-1 font-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-emerald-50 text-emerald-500 rounded-lg p-1.5 hover:bg-emerald-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="material-icons-round text-base">close</span>
            </button>
        </div>
    @endif

    <!-- SECTION UMUM: Mode & Gelombang (2-Column Grid on Desktop) -->
    <div id="sec-umum" class="grid grid-cols-1 lg:grid-cols-2 gap-6 scroll-mt-6">
        <!-- Card Mode Pendaftaran -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <span class="material-icons-round text-2xl">language</span>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900">Pengaturan Mode Pendaftaran</h3>
                        <p class="text-xs text-gray-500">Pilih mekanisme pendaftaran calon siswa untuk tingkat ini</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('spmb.settings.mode.store', $sekolah->uuid) }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="mode_pendaftaran" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Mode Pendaftaran</label>
                        <select name="mode_pendaftaran" id="mode_pendaftaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Pilih Salah Satu</option>
                            <option value="offline" @if($mode_pendaftaran == 'offline') selected @endif>Offline (Pendaftaran langsung via panitia sekolah)</option>
                            <option value="online" @if($mode_pendaftaran == 'online') selected @endif>Online (Pendaftaran mandiri melalui website)</option>
                        </select>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200 text-xs text-gray-600">
                        Mode saat ini: <strong class="text-gray-900 uppercase">{{ $mode_pendaftaran ?? 'Offline' }}</strong>. Ketika mode Online aktif, pendaftar dapat mengisi formulir mandiri lewat link pendaftaran publik.
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2.5 transition">
                            <span class="material-icons-round text-base">save</span>
                            <span>Simpan Mode Pendaftaran</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Card Gelombang Pendaftaran -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <span class="material-icons-round text-2xl">event_available</span>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900">Pengaturan Gelombang Pendaftaran</h3>
                        <p class="text-xs text-gray-500">Atur status pendaftaran dibuka/ditutup dan gelombang aktif</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('spmb.settings.status.store', $sekolah->uuid) }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="status_pendaftaran" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Status Pendaftaran</label>
                            <select name="status_pendaftaran" id="status_pendaftaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="buka" @if($status['status'] == 'buka') selected @endif>Buka</option>
                                <option value="tutup" @if($status['status'] == 'tutup') selected @endif>Tutup</option>
                            </select>
                        </div>
                        <div>
                            <label for="gelombang" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Pilihan Gelombang</label>
                            <select name="gelombang" id="gelombang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="1" @if($status['gelombang'] != null && $status['gelombang'] == 1) selected @endif>Gelombang 1</option>
                                <option value="2" @if($status['gelombang'] != null && $status['gelombang'] == 2) selected @endif>Gelombang 2</option>
                                <option value="3" @if($status['gelombang'] != null && $status['gelombang'] == 3) selected @endif>Gelombang 3</option>
                                <option value="4" @if($status['gelombang'] != null && $status['gelombang'] == 4) selected @endif>Gelombang 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200 text-xs text-gray-600">
                        Status saat ini: <strong class="text-gray-900 uppercase">{{ $status['status'] ?? 'Tutup' }}</strong> pada <strong class="text-gray-900">Gelombang {{ $status['gelombang'] ?? '1' }}</strong>.
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2.5 transition">
                            <span class="material-icons-round text-base">save</span>
                            <span>Simpan Status & Gelombang</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SECTION FORMULIR PENDAFTARAN -->
    <div id="sec-formulir" class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 scroll-mt-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between pb-4 border-b border-gray-100 gap-2">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                    <span class="material-icons-round text-2xl">fact_check</span>
                </div>
                <div>
                    <h3 class="text-base md:text-lg font-bold text-gray-900">Pengaturan Formulir Pendaftaran</h3>
                    <p class="text-xs md:text-sm text-gray-500">Centang data yang ingin ditampilkan pada formulir pendaftaran SPMB</p>
                </div>
            </div>
            <div class="flex items-center gap-2 text-xs">
                <span class="inline-flex items-center gap-1 text-gray-600">
                    <span class="w-2.5 h-2.5 rounded bg-blue-600 inline-block"></span> Wajib (Sistem)
                </span>
                <span class="inline-flex items-center gap-1 text-gray-600 ml-2">
                    <span class="w-2.5 h-2.5 rounded bg-gray-300 inline-block"></span> Opsional
                </span>
            </div>
        </div>

        <form method="POST" action="{{ route('spmb.settings.formulir.store', $sekolah->uuid) }}" class="mt-6 space-y-8">
            @csrf

            <!-- I. Identitas Pribadi Siswa -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">I. Identitas Pribadi Siswa</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="nama" type="checkbox" checked disabled value="nama" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="nama" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Nama Siswa</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Formulir Data Nama Siswa</p>
                        </label>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="jk" type="checkbox" checked disabled value="jk" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="jk" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Jenis Kelamin</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Formulir Jenis Kelamin Siswa</p>
                        </label>
                    </div>

                    <label for="nisn" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nisn" type="checkbox" @if(in_array('nisn',$formulir)) checked @endif value="nisn" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">NISN</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor Induk Siswa Nasional</p>
                        </div>
                    </label>

                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="ttl" type="checkbox" checked disabled value="ttl" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="ttl" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Tempat & Tgl Lahir</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">TTL Siswa</p>
                        </label>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="agama" type="checkbox" checked disabled value="agama" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="agama" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Agama</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Agama Siswa</p>
                        </label>
                    </div>

                    <label for="no_handphone" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="no_handphone" type="checkbox" @if(in_array('no_handphone',$formulir)) checked @endif value="no_handphone" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No Handphone</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">No Handphone Siswa</p>
                        </div>
                    </label>

                    <label for="no_whatsapp" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="no_whatsapp" type="checkbox" @if(in_array('no_whatsapp',$formulir)) checked @endif value="no_whatsapp" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No WhatsApp</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">No WhatsApp Siswa</p>
                        </div>
                    </label>

                    <label for="no_telepon" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="no_telepon" type="checkbox" @if(in_array('no_telepon',$formulir)) checked @endif value="no_telepon" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No Telepon</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">No Telepon Rumah Siswa</p>
                        </div>
                    </label>

                    <label for="email" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="email" type="checkbox" value="email" @if(in_array('email',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Email Siswa</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Alamat Email Siswa</p>
                        </div>
                    </label>

                    <label for="tinggi_badan" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="tinggi_badan" type="checkbox" @if(in_array('tinggi_badan',$formulir)) checked @endif value="tinggi_badan" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Tinggi Badan</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Tinggi Badan Siswa (cm)</p>
                        </div>
                    </label>

                    <label for="berat_badan" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="berat_badan" type="checkbox" @if(in_array('berat_badan',$formulir)) checked @endif value="berat_badan" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Berat Badan</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Berat Badan Siswa (kg)</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- II. Data Tempat Tinggal -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">II. Data Tempat Tinggal</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="alamat" type="checkbox" checked disabled value="alamat" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="alamat" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Alamat Rumah</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Alamat Tempat Tinggal Siswa</p>
                        </label>
                    </div>

                    <label for="rt_rw" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="rt_rw" type="checkbox" value="rt_rw" @if(in_array('rt_rw',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">RT / RW</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">RT dan RW Siswa</p>
                        </div>
                    </label>

                    <label for="kelurahan" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="kelurahan" type="checkbox" value="kelurahan" @if(in_array('kelurahan',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Kelurahan / Desa</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Kelurahan atau Desa Siswa</p>
                        </div>
                    </label>

                    <label for="kecamatan" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="kecamatan" type="checkbox" value="kecamatan" @if(in_array('kecamatan',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Kecamatan</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Kecamatan Domisili Siswa</p>
                        </div>
                    </label>

                    <label for="kabupaten" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="kabupaten" type="checkbox" value="kabupaten" @if(in_array('kabupaten',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Kabupaten / Kota</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Kabupaten atau Kota Siswa</p>
                        </div>
                    </label>

                    <label for="provinsi" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="provinsi" type="checkbox" value="provinsi" @if(in_array('provinsi',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Provinsi</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Provinsi Tempat Tinggal</p>
                        </div>
                    </label>

                    <label for="tinggal_dengan" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="tinggal_dengan" type="checkbox" value="tinggal_dengan" @if(in_array('tinggal_dengan',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Tinggal Dengan</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Status Tempat Tinggal Siswa</p>
                        </div>
                    </label>

                    <label for="jarak" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="jarak" type="checkbox" value="jarak" @if(in_array('jarak',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Jarak ke Sekolah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Jarak Rumah ke Sekolah (KM)</p>
                        </div>
                    </label>

                    <label for="transportasi" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="transportasi" type="checkbox" @if(in_array('transportasi',$formulir)) checked @endif value="transportasi" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Transportasi</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Alat Transportasi ke Sekolah</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- III. Data Kependudukan -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">III. Data Kependudukan</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <label for="regis_akte" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="regis_akte" type="checkbox" @if(in_array('regis_akte',$formulir)) checked @endif value="regis_akte" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No Registrasi Akta</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor Akta Kelahiran</p>
                        </div>
                    </label>

                    <label for="nik" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nik" type="checkbox" value="nik" @if(in_array('nik',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">NIK Siswa</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor Induk Kependudukan</p>
                        </div>
                    </label>

                    <label for="anak_ke" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="anak_ke" type="checkbox" value="anak_ke" @if(in_array('anak_ke',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Anak Ke .. Bersaudara</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Urutan Kelahiran Siswa</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- IV. Identitas Ayah -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">IV. Identitas Ayah</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <label for="nama_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nama_ayah" type="checkbox" value="nama_ayah" @if(in_array('nama_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Nama Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nama Lengkap Ayah Kandung</p>
                        </div>
                    </label>

                    <label for="nik_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nik_ayah" type="checkbox" value="nik_ayah" @if(in_array('nik_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">NIK Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">NIK Ayah Siswa</p>
                        </div>
                    </label>

                    <label for="ttl_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="ttl_ayah" type="checkbox" value="ttl_ayah" @if(in_array('ttl_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">TTL Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Tempat & Tanggal Lahir Ayah</p>
                        </div>
                    </label>

                    <label for="pekerjaan_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="pekerjaan_ayah" type="checkbox" value="pekerjaan_ayah" @if(in_array('pekerjaan_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pekerjaan Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Pekerjaan Ayah Siswa</p>
                        </div>
                    </label>

                    <label for="pendidikan_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="pendidikan_ayah" type="checkbox" value="pendidikan_ayah" @if(in_array('pendidikan_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pendidikan Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Pendidikan Terakhir Ayah</p>
                        </div>
                    </label>

                    <label for="handphone_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="handphone_ayah" type="checkbox" value="handphone_ayah" @if(in_array('handphone_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No HP Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor Handphone Ayah</p>
                        </div>
                    </label>

                    <label for="penghasilan_ayah" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="penghasilan_ayah" type="checkbox" value="penghasilan_ayah" @if(in_array('penghasilan_ayah',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Penghasilan Ayah</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Penghasilan Perbulan Ayah</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- V. Identitas Ibu -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">V. Identitas Ibu</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <label for="nama_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nama_ibu" type="checkbox" value="nama_ibu" @if(in_array('nama_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Nama Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nama Lengkap Ibu Kandung</p>
                        </div>
                    </label>

                    <label for="nik_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nik_ibu" type="checkbox" value="nik_ibu" @if(in_array('nik_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">NIK Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">NIK Ibu Siswa</p>
                        </div>
                    </label>

                    <label for="ttl_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="ttl_ibu" type="checkbox" value="ttl_ibu" @if(in_array('ttl_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">TTL Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Tempat & Tanggal Lahir Ibu</p>
                        </div>
                    </label>

                    <label for="pekerjaan_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="pekerjaan_ibu" type="checkbox" value="pekerjaan_ibu" @if(in_array('pekerjaan_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pekerjaan Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Pekerjaan Ibu Siswa</p>
                        </div>
                    </label>

                    <label for="pendidikan_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="pendidikan_ibu" type="checkbox" value="pendidikan_ibu" @if(in_array('pendidikan_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pendidikan Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Pendidikan Terakhir Ibu</p>
                        </div>
                    </label>

                    <label for="handphone_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="handphone_ibu" type="checkbox" value="handphone_ibu" @if(in_array('handphone_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No HP Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor Handphone Ibu</p>
                        </div>
                    </label>

                    <label for="penghasilan_ibu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="penghasilan_ibu" type="checkbox" value="penghasilan_ibu" @if(in_array('penghasilan_ibu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Penghasilan Ibu</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Penghasilan Perbulan Ibu</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- VI. Identitas Wali -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">VI. Identitas Wali</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <label for="nama_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nama_wali" type="checkbox" value="nama_wali" @if(in_array('nama_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Nama Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nama Lengkap Wali Siswa</p>
                        </div>
                    </label>

                    <label for="nik_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="nik_wali" type="checkbox" value="nik_wali" @if(in_array('nik_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">NIK Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">NIK Wali Siswa</p>
                        </div>
                    </label>

                    <label for="ttl_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="ttl_wali" type="checkbox" value="ttl_wali" @if(in_array('ttl_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">TTL Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Tempat & Tanggal Lahir Wali</p>
                        </div>
                    </label>

                    <label for="pekerjaan_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="pekerjaan_wali" type="checkbox" value="pekerjaan_wali" @if(in_array('pekerjaan_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pekerjaan Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Pekerjaan Wali Siswa</p>
                        </div>
                    </label>

                    <label for="pendidikan_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="pendidikan_wali" type="checkbox" value="pendidikan_wali" @if(in_array('pendidikan_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pendidikan Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Pendidikan Terakhir Wali</p>
                        </div>
                    </label>

                    <label for="handphone_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="handphone_wali" type="checkbox" value="handphone_wali" @if(in_array('handphone_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No HP Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor Handphone Wali</p>
                        </div>
                    </label>

                    <label for="penghasilan_wali" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="penghasilan_wali" type="checkbox" value="penghasilan_wali" @if(in_array('penghasilan_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Penghasilan Wali</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Penghasilan Perbulan Wali</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- VII. Identitas Contact Orang Tua -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">VII. Identitas Contact Orang Tua</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <label for="whatsapp_ortu" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="whatsapp_ortu" type="checkbox" value="whatsapp_ortu" @if(in_array('whatsapp_ortu',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">WhatsApp Orang Tua</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Nomor WhatsApp Orang Tua/Wali</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- VIII. Penerima Kartu KPS / KIP -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">VIII. Penerima Kartu KPS / KIP</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <label for="kps" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="kps" type="checkbox" value="kps" @if(in_array('kps',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No KPS</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Kartu Perlindungan Sosial</p>
                        </div>
                    </label>

                    <label for="kip" class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:border-blue-300 hover:bg-blue-50/30 transition cursor-pointer select-none bg-white">
                        <input id="kip" type="checkbox" value="kip" @if(in_array('kip',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">No KIP</span>
                                <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-1.5 py-0.5 rounded">Opsional</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Kartu Indonesia Pintar</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- IX. Identitas Sekolah -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 pb-1 border-b border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <h4 class="text-xs md:text-sm font-bold text-gray-800 uppercase tracking-wider">IX. Identitas Sekolah</h4>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="jenis_pendaftaran" type="checkbox" checked disabled value="jenis_pendaftaran" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="jenis_pendaftaran" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Jenis Pendaftaran</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Siswa Baru / Pindahan</p>
                        </label>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="pindah_ke" type="checkbox" checked disabled value="pindah_ke" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="pindah_ke" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Pindah ke Tingkat</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Khusus Siswa Pindahan</p>
                        </label>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 bg-gray-50/70 select-none cursor-not-allowed">
                        <input id="sekolah_asal" type="checkbox" checked disabled value="sekolah_asal" name="formulir_spmb[]" class="w-4 h-4 mt-1 text-blue-600 rounded border-gray-300 focus:ring-blue-500 opacity-70">
                        <label for="sekolah_asal" class="flex-1 cursor-not-allowed">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-sm font-semibold text-gray-800">Sekolah Asal</span>
                                <span class="text-[10px] font-semibold text-blue-700 bg-blue-100 px-1.5 py-0.5 rounded">Wajib</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">Asal Sekolah Siswa</p>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Formulir -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end">
                <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-6 py-2.5 transition shadow-sm">
                    <span class="material-icons-round text-base">save</span>
                    <span>Simpan Pengaturan Formulir</span>
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION BERKAS PERSYARATAN -->
    <div id="sec-berkas" class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 scroll-mt-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <span class="material-icons-round text-2xl">folder_open</span>
            </div>
            <div>
                <h3 class="text-base md:text-lg font-bold text-gray-900">Pengaturan Berkas Persyaratan</h3>
                <p class="text-xs md:text-sm text-gray-500">Tentukan dokumen/berkas yang wajib diunggah oleh calon pendaftar</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Form Tambah Berkas -->
            <div class="lg:col-span-5 bg-gray-50/60 p-4 rounded-xl border border-gray-200">
                <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-1.5">
                    <span class="material-icons-round text-base text-blue-600">add_circle_outline</span>
                    <span>Tambah Berkas Baru</span>
                </h4>
                <form action="{{ route('spmb.settings.berkas.store', $sekolah->uuid) }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label for="nama_berkas" class="block text-xs font-semibold text-gray-700 mb-1">Nama Berkas</label>
                        <input type="text" name="nama_berkas" id="nama_berkas" required class="w-full bg-white px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Kartu Keluarga, Pas Foto">
                    </div>
                    <div>
                        <label for="deskripsi_berkas" class="block text-xs font-semibold text-gray-700 mb-1">Deskripsi / Keterangan Berkas</label>
                        <textarea name="deskripsi_berkas" id="deskripsi_berkas" rows="2" class="w-full bg-white px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Keterangan singkat agar pendaftar paham berkas yang dimaksud"></textarea>
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2.5 transition">
                        <span class="material-icons-round text-base">add</span>
                        <span>Tambah Berkas</span>
                    </button>
                </form>
            </div>

            <!-- List Berkas -->
            <div class="lg:col-span-7">
                <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-1.5">
                    <span class="material-icons-round text-base text-gray-600">list</span>
                    <span>Daftar Berkas Aktif ({{ count($berkas_spmb) }})</span>
                </h4>
                @if(count($berkas_spmb) > 0)
                    <div class="divide-y divide-gray-200 border border-gray-200 rounded-xl overflow-hidden bg-white shadow-xs">
                        @foreach ($berkas_spmb as $item)
                            <div class="p-3.5 flex items-center justify-between gap-3 hover:bg-gray-50/50 transition">
                                <div class="min-w-0 flex items-start gap-3">
                                    <span class="material-icons-round text-gray-400 mt-0.5">description</span>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $item['nama_berkas'] }}</p>
                                        <p class="text-xs text-gray-500 mt-0.5">{{ $item['deskripsi_berkas'] ?: 'Tidak ada deskripsi' }}</p>
                                    </div>
                                </div>
                                <button type="button" data-file="{{ $item['nama_berkas'] }}" class="p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition cursor-pointer hapus-berkas" title="Hapus berkas ini">
                                    <span class="material-icons-round text-xl">delete_outline</span>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50">
                        <span class="material-icons-round text-4xl text-gray-300">folder_off</span>
                        <p class="text-sm font-medium text-gray-600 mt-2">Belum ada berkas persyaratan</p>
                        <p class="text-xs text-gray-400 mt-0.5">Gunakan formulir di sebelah kiri untuk menambahkan dokumen yang wajib diunggah.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- SECTION FORM INTERVIEW -->
    <div id="sec-interview" class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 scroll-mt-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <span class="material-icons-round text-2xl">record_voice_over</span>
            </div>
            <div>
                <h3 class="text-base md:text-lg font-bold text-gray-900">Pengaturan Form Interview</h3>
                <p class="text-xs md:text-sm text-gray-500">Kelola kuesioner wawancara yang akan ditanyakan saat tahap interview seleksi</p>
            </div>
        </div>

        <!-- Warning Callout -->
        <div class="p-3 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-900 mb-5 flex items-start gap-2">
            <span class="material-icons-round text-amber-600 text-base shrink-0">info</span>
            <span>Pastikan tidak menambah atau mengedit kuesioner interview setelah siswa mulai mengisi kuesioner interviewnya agar data tetap sinkron.</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 bg-gray-50/60 rounded-xl border border-gray-200 mb-6">
            <div class="col-span-1">
                <label for="jenis" class="block text-xs font-semibold text-gray-700 mb-1.5">Jenis Kuesioner</label>
                <select name="jenis" id="jenis" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="teks">Teks Singkat</option>
                    <option value="longteks">Paragraf</option>
                    <option value="option">Opsi (Pilihan Tunggal)</option>
                    <option value="checkbox">Checkbox (Pilihan Berganda)</option>
                </select>
            </div>
            <div class="col-span-1 md:col-span-2">
                <label for="kuestioner" class="block text-xs font-semibold text-gray-700 mb-1.5">Pertanyaan / Soal Kuesioner</label>
                <input type="text" name="kuestioner" id="kuestioner" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan soal kuesioner interview">
            </div>

            <!-- Option and checkbox dynamic options -->
            <div class="col-span-1 md:col-span-3 optionKuestioner hidden flex-col gap-2 pt-2 border-t border-gray-200">
                <label class="block text-xs font-semibold text-gray-700">Daftar Pilihan Jawaban</label>
                <ul class="kuestioner-opsi space-y-2">
                    <li class="flex items-center gap-2">
                        <span class="text-xs font-bold text-gray-500 w-4">1</span>
                        <input type="text" name="opsi" class="flex-1 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan pilihan jawaban 1">
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-xs font-bold text-gray-500 w-4">2</span>
                        <input type="text" name="opsi" class="flex-1 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan pilihan jawaban 2">
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-xs font-bold text-gray-500 w-4">3</span>
                        <input type="text" name="opsi" class="flex-1 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan pilihan jawaban 3">
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-xs font-bold text-gray-500 w-4">4</span>
                        <input type="text" name="opsi" class="flex-1 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan pilihan jawaban 4">
                    </li>
                </ul>
                <div class="pt-2">
                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 hover:bg-amber-200 text-amber-800 rounded-lg text-xs font-semibold cursor-pointer add-kuestioner transition">
                        <span class="material-icons-round text-sm">add</span>
                        <span>Tambah Opsi Pilihan</span>
                    </button>
                </div>
            </div>

            <div class="col-span-1 md:col-span-3 pt-2">
                <button type="button" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 cursor-pointer simpan-kuestioner transition">
                    <span class="material-icons-round text-base">save</span>
                    <span>Simpan Kuesioner Interview</span>
                </button>
            </div>
        </div>

        <!-- List Kuestioner -->
        <div>
            <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-1.5">
                <span class="material-icons-round text-base text-gray-600">help_outline</span>
                <span>Daftar Kuesioner Interview ({{ count($interview_kuestioner) }})</span>
            </h4>
            @if(count($interview_kuestioner) > 0)
                <div class="divide-y divide-gray-200 border border-gray-200 rounded-xl overflow-hidden bg-white shadow-xs">
                    @foreach ($interview_kuestioner as $item)
                        <div class="p-4 flex items-start justify-between gap-4 hover:bg-gray-50/50 transition relative">
                            <div class="space-y-1 flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 text-[11px] font-bold rounded uppercase 
                                        {{ $item['jenis'] == 'teks' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $item['jenis'] == 'longteks' ? 'bg-indigo-100 text-indigo-700' : '' }}
                                        {{ $item['jenis'] == 'option' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                        {{ $item['jenis'] == 'checkbox' ? 'bg-purple-100 text-purple-700' : '' }}
                                    ">
                                        {{ $item['jenis'] }}
                                    </span>
                                </div>
                                <p class="text-sm font-medium text-gray-900 mt-1">{{ $item['kuestioner'] }}</p>
                                @if($item['jenis'] == 'option' || $item['jenis'] == 'checkbox')
                                    <div class="flex flex-wrap gap-1.5 pt-2">
                                        @foreach ($item['opsi'] as $opsi)
                                            <span class="px-2.5 py-0.5 bg-gray-100 text-gray-700 rounded-full text-xs">
                                                {{ $opsi }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg cursor-pointer transition delete-kuestioner-item shrink-0" data-id="{{ $item['id_kuestioner'] }}" title="Hapus soal ini">
                                <span class="material-icons-round text-xl">delete_outline</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-8 text-center border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50">
                    <span class="material-icons-round text-4xl text-gray-300">quiz</span>
                    <p class="text-sm font-medium text-gray-600 mt-2">Belum ada pertanyaan interview</p>
                    <p class="text-xs text-gray-400 mt-0.5">Tambahkan kuesioner pada form di atas untuk digunakan saat wawancara.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- SECTION DESKRIPSI HASIL PENGUMUMAN -->
    <div id="sec-hasil" class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 scroll-mt-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center shrink-0">
                <span class="material-icons-round text-2xl">campaign</span>
            </div>
            <div>
                <h3 class="text-base md:text-lg font-bold text-gray-900">Pengaturan Deskripsi Hasil SPMB</h3>
                <p class="text-xs md:text-sm text-gray-500">Teks atau informasi pengumuman yang ditampilkan kepada siswa saat memeriksa hasil seleksi</p>
            </div>
        </div>

        <form method="POST" action="{{ route('spmb.settings.deschasil.store', $sekolah->uuid) }}" class="space-y-4">
            @csrf
            <div>
                <label for="textarea-tinymce" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Konten Deskripsi Hasil</label>
                <textarea id="textarea-tinymce" name="desc_hasil" rows="8">{{ old('desc_hasil', $deskripsi) }}</textarea>
                @error('desc_hasil')
                    <p class="text-xs text-red-600 mt-1"><span class="font-medium">Perhatian!</span> {{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                    <span class="material-icons-round text-base">save</span>
                    <span>Simpan Deskripsi Hasil SPMB</span>
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION SURAT PERNYATAAN -->
    <div id="sec-pernyataan" class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 scroll-mt-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
                <span class="material-icons-round text-2xl">verified_user</span>
            </div>
            <div>
                <h3 class="text-base md:text-lg font-bold text-gray-900">Pengaturan Format Surat Pernyataan</h3>
                <p class="text-xs md:text-sm text-gray-500">Atur format surat pernyataan yang wajib disetujui pendaftar sebelum pendaftaran berhasil</p>
            </div>
        </div>

        <!-- Tag helper box -->
        <div class="mb-5 p-4 bg-blue-50/70 border border-blue-200 rounded-xl text-xs text-blue-900">
            <p class="font-bold flex items-center gap-1.5 mb-2">
                <span class="material-icons-round text-base text-blue-600">code</span>
                <span>Tag / Placeholder Otomatis yang Dapat Digunakan:</span>
            </p>
            <div class="flex flex-wrap gap-1.5">
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[NAMA_SISWA]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[NISN]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[TEMPAT_LAHIR]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[TANGGAL_LAHIR]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[JENIS_KELAMIN]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[AGAMA]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[SEKOLAH]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[TAHUN_AJARAN]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[NAMA_PENYETUJU]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[TANGGAL_PERNYATAAN]</span>
                <span class="px-2 py-0.5 bg-white border border-blue-200 rounded text-blue-800 font-mono shadow-2xs">[NIS]</span>
            </div>
            <p class="mt-2 text-gray-500 italic">*Tag di atas akan otomatis digantikan dengan data pendaftar saat formulir dilihat atau dicetak.</p>
        </div>

        <form method="POST" action="{{ route('spmb.settings.pernyataan.store', $sekolah->uuid) }}" class="space-y-5">
            @csrf
            
            <!-- Toggle Switch Status Surat Pernyataan -->
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-bold text-gray-900">Status Surat Pernyataan</p>
                    <p class="text-xs text-gray-600 mt-0.5">Jika aktif, pendaftar wajib membaca dan menyetujui surat pernyataan serta memasukkan nama pencentang sebelum pendaftaran berhasil. Jika dinonaktifkan, pendaftaran langsung berhasil tanpa surat pernyataan.</p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <label class="relative inline-flex items-center cursor-pointer select-none">
                        <input type="checkbox" name="status_pernyataan" id="status_pernyataan_toggle" value="aktif" class="sr-only peer" @if($status_pernyataan == 'aktif') checked @endif>
                        <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span id="label_status_pernyataan" class="ms-3 text-sm font-bold @if($status_pernyataan == 'aktif') text-green-700 @else text-gray-500 @endif">
                            {{ $status_pernyataan == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </label>
                </div>
            </div>

            <div>
                <label for="textarea-pernyataan" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Isi Format Surat Pernyataan</label>
                <textarea id="textarea-pernyataan" name="surat_pernyataan" rows="14">{{ old('surat_pernyataan', $surat_pernyataan) }}</textarea>
                @error('surat_pernyataan')
                    <p class="text-xs text-red-600 mt-1"><span class="font-medium">Perhatian!</span> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                    <span class="material-icons-round text-base">save</span>
                    <span>Simpan Pengaturan Surat Pernyataan</span>
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION KOP SURAT CETAK -->
    <div id="sec-kop" class="bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 md:p-6 scroll-mt-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <span class="material-icons-round text-2xl">branding_watermark</span>
            </div>
            <div>
                <h3 class="text-base md:text-lg font-bold text-gray-900">Pengaturan Kop Surat Dokumen Cetak</h3>
                <p class="text-xs md:text-sm text-gray-500">Sesuaikan logo kiri, logo kanan, dan teks kop surat resmi untuk seluruh halaman cetak (Biodata Siswa, Surat Pernyataan, dll.)</p>
            </div>
        </div>

        <!-- Live Kop Surat Preview Box -->
        <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-xl">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-bold text-gray-700 uppercase tracking-wider flex items-center gap-1.5">
                    <span class="material-icons-round text-sm text-blue-600">visibility</span>
                    <span>Preview Kop Surat Saat Ini</span>
                </span>
                <span class="text-[11px] text-gray-500 italic">*Format tampilan dokumen saat dicetak</span>
            </div>
            <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-2xs overflow-x-auto">
                @include('spmb.cetak.kop', ['kop' => $kop_surat, 'sekolah' => $sekolah])
            </div>
        </div>

        <form method="POST" action="{{ route('spmb.settings.kop.store', $sekolah->uuid) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Upload Logo Kiri & Logo Kanan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Logo Kiri -->
                <div class="p-4 rounded-xl border border-gray-200 bg-gray-50/60">
                    <label class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1">Logo Kiri (Logo Yayasan / Instansi)</label>
                    <p class="text-xs text-gray-500 mb-3">Format: PNG, JPG, WEBP, atau SVG. Disarankan berlatar transparan.</p>
                    
                    @if(!empty($kop_surat['logo_kiri']) && file_exists(public_path('storage/' . $kop_surat['logo_kiri'])))
                        <div class="flex items-center gap-4 mb-3 p-3 bg-white border border-gray-200 rounded-lg">
                            <img src="{{ asset('storage/' . $kop_surat['logo_kiri']) }}" alt="Logo Kiri" class="h-16 w-16 object-contain border p-1 rounded bg-gray-50">
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-800">Logo Kiri Aktif</p>
                                <label class="inline-flex items-center gap-1.5 text-xs text-red-600 hover:text-red-800 cursor-pointer mt-1">
                                    <input type="checkbox" name="hapus_logo_kiri" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    <span>Hapus logo ini</span>
                                </label>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="logo_kiri" id="logo_kiri" accept="image/*" class="block w-full text-xs text-gray-700 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>

                <!-- Logo Kanan -->
                <div class="p-4 rounded-xl border border-gray-200 bg-gray-50/60">
                    <label class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1">Logo Kanan (Logo Sekolah / Akreditasi / ISO)</label>
                    <p class="text-xs text-gray-500 mb-3">Format: PNG, JPG, WEBP, atau SVG. Opsional di sebelah kanan kop.</p>

                    @if(!empty($kop_surat['logo_kanan']) && file_exists(public_path('storage/' . $kop_surat['logo_kanan'])))
                        <div class="flex items-center gap-4 mb-3 p-3 bg-white border border-gray-200 rounded-lg">
                            <img src="{{ asset('storage/' . $kop_surat['logo_kanan']) }}" alt="Logo Kanan" class="h-16 w-16 object-contain border p-1 rounded bg-gray-50">
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-800">Logo Kanan Aktif</p>
                                <label class="inline-flex items-center gap-1.5 text-xs text-red-600 hover:text-red-800 cursor-pointer mt-1">
                                    <input type="checkbox" name="hapus_logo_kanan" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    <span>Hapus logo ini</span>
                                </label>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="logo_kanan" id="logo_kanan" accept="image/*" class="block w-full text-xs text-gray-700 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>
            </div>

            <!-- Teks Kop Surat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nama_yayasan" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Nama Yayasan / Badan Penyelenggara</label>
                    <input type="text" name="nama_yayasan" id="nama_yayasan" value="{{ old('nama_yayasan', $kop_surat['nama_yayasan']) }}" placeholder="Contoh: YAYASAN MAITREYAWIRA TANJUNGPINANG" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="nama_sekolah" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Nama Satuan Pendidikan / Sekolah</label>
                    <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah', $kop_surat['nama_sekolah']) }}" placeholder="Contoh: SMP MAITREYAWIRA TANJUNGPINANG" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="md:col-span-2">
                    <label for="alamat_kop" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat_kop" value="{{ old('alamat', $kop_surat['alamat']) }}" placeholder="Contoh: Jl. Ir. Sutami No. 1, Bukit Bestari, Tanjungpinang, Kepulauan Riau" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="kontak_kop" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Telepon / WhatsApp</label>
                    <input type="text" name="kontak" id="kontak_kop" value="{{ old('kontak', $kop_surat['kontak']) }}" placeholder="Contoh: (0771) 23456 / 0812-3456-7890" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <label for="email_kop" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Email Resmi</label>
                    <input type="email" name="email" id="email_kop" value="{{ old('email', $kop_surat['email']) }}" placeholder="Contoh: info@maitreyawira.sch.id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="md:col-span-2">
                    <label for="keterangan_kop" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Website / Keterangan Lain (Opsional)</label>
                    <input type="text" name="keterangan" id="keterangan_kop" value="{{ old('keterangan', $kop_surat['keterangan']) }}" placeholder="Contoh: Website: www.maitreyawira.sch.id | NPSN: 69949747" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-6 py-2.5 transition shadow-sm">
                    <span class="material-icons-round text-base">save</span>
                    <span>Simpan Pengaturan Kop Surat</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script type="module">
    $('.hapus-berkas').on('click', function() {
        var namaBerkas = $(this).data('file');
        var idSekolah = "{{ $sekolah->uuid }}";
        cConfirm("Perhatian", 'Yakin untuk menghapus berkas ini, pastikan tidak ada siswa yang sudah mengupload berkas ini', function() {
            loading();
            var url = "{{ route('spmb.settings.berkas.delete', ':id') }}";
            url = url.replace(':id', idSekolah);
            $.ajax({
                url: url,
                type: 'delete',
                data: {namaBerkas: namaBerkas},
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(data) {
                    removeLoading();
                    cAlert('green', "Berhasil", "Berhasil menghapus berkas ini", true);
                },
                error: function(data) {
                    removeLoading();
                    console.log(data.responseText);
                }
            });
        });
    });

    $('#jenis').on('change', function() {
        if($(this).val() == 'option' || $(this).val() == 'checkbox') {
            $('.optionKuestioner').addClass('flex').removeClass('hidden');

            $('.add-kuestioner').off('click').on('click', function() {
                var countOpsi = $('.kuestioner-opsi li').length + 1;
                var newOpsi = `<li class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-500 w-4">` + countOpsi + `</span>
                    <input type="text" name="opsi" class="flex-1 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan pilihan jawaban ` + countOpsi + `">
                    <button type="button" class="p-1.5 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg cursor-pointer delete-kuestioner transition"><span class="material-icons-round text-lg">delete</span></button>
                </li>`;
                $('.kuestioner-opsi').append(newOpsi);
            });

            $('.optionKuestioner').off('click', '.delete-kuestioner').on('click', '.delete-kuestioner', function(){
                $(this).closest('li').remove();
            });
        } else {
            $('.optionKuestioner').addClass('hidden').removeClass('flex');
        }
    });

    $('.simpan-kuestioner').on('click', function() {
        var jenis = $('#jenis').val();
        var kuestioner = $('#kuestioner').val();
        var opsiJawaban = [];
        var idSekolah = "{{ $sekolah->uuid }}";

        if(jenis == '' || kuestioner == '') {
            oAlert('red', 'Gagal', 'Jenis dan Kuesioner harus diisi');
            return false;
        } else {
            if(jenis == 'option' || jenis == 'checkbox') {
                $('.kuestioner-opsi input[name="opsi"]').each(function() {
                    if($(this).val() != '') {
                        opsiJawaban.push($(this).val());
                    }
                });
                if(opsiJawaban.length < 2) {
                    oAlert('red', 'Gagal', 'Untuk jenis opsi dan checkbox minimal harus ada 2 opsi jawaban');
                    return false;
                }
            }
            loading();
            var url = "{{ route('spmb.settings.interview.store', ':id') }}";
            url = url.replace(':id', idSekolah);
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    jenis: jenis,
                    kuestioner: kuestioner,
                    option: opsiJawaban
                },
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(data) {
                    removeLoading();
                    if(data.success) {
                        cAlert('green', 'Berhasil', data.success, true);
                    }
                },
                error: function(data) {
                    removeLoading();
                    console.log(data.responseJSON ? data.responseJSON.message : data.responseText);
                }
            });
        }
    });

    $('.delete-kuestioner-item').on('click', function() {
        var idKuestioner = $(this).data('id');
        var idSekolah = "{{ $sekolah->uuid }}";
        cConfirm('Perhatian', 'Yakin untuk menghapus kuestioner ini?', function() {
            loading();
            var url = "{{ route('spmb.settings.interview.delete', ':id') }}";
            url = url.replace(':id', idSekolah);
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {id_kuestioner: idKuestioner},
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(data) {
                    removeLoading();
                    if(data.success) {
                        cAlert('green', 'Berhasil', data.success, true);
                    }
                },
                error: function(data) {
                    removeLoading();
                    console.log(data.responseJSON ? data.responseJSON.message : data.responseText);
                }
            });
        });
    });

    $('#status_pernyataan_toggle').on('change', function() {
        if($(this).is(':checked')) {
            $('#label_status_pernyataan').text('Aktif').removeClass('text-gray-500').addClass('text-green-700');
        } else {
            $('#label_status_pernyataan').text('Nonaktif').removeClass('text-green-700').addClass('text-gray-500');
        }
    });

    tinymce.init({
        selector: "#textarea-tinymce, #textarea-pernyataan",
        theme: 'silver',
        plugins: 'fullscreen, link, image, table, code, lists, emoticons, advlist, charmap, searchreplace, codesample',
        toolbar: [
            'undo redo | forecolor backcolor | formatting | align | outdent indent lineheight | numlist bullist | blockquote | link | image | table | code | template | symbol | searchreplace | fullscreen',
            'sizeselect | styles fontfamily | fontsize'
        ],
        content_style: "body {line-height: 2}",
        setup: function (editor) {
            editor.on('init', function () {
                if (editor.id === 'textarea-tinymce') {
                    let content = editor.getContent();
                    if (!content.includes('initial-wrapper')) {
                        editor.setContent('<div class="initial-wrapper">' + content + '</div>');
                    }
                }
            });
        },
    });
</script>
@endsection