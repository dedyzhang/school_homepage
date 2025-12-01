@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data Settings SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
    </div>
    @if(session('success'))
                {{-- Error Alerts --}}
        <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-3" role="alert">
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
    <div class="p-4 bg-white rounded-lg shadow-md mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-2 ">
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <h4 class="text-lg"><b>Pengaturan Mode Pendafaran</b></h4>
                <p class="text-sm">Mode Pendaftaran Untuk Tingkat ini</p>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <form method="POST" action="{{ route('spmb.settings.mode.store', $sekolah->uuid) }}" class="mt-4">
                    @csrf
                    <select name="mode_pendaftaran" id="mode_pendaftaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Pilih Salah Satu</option>
                        <option value="offline" @if($mode_pendaftaran == 'offline') selected @endif>Offline</option>
                        <option value="online" @if($mode_pendaftaran == 'online') selected @endif>online</option>
                    </select>
                    <div class="mt-4">
                        <button type="submit" class="button-d bg-blue-500 hover:bg-blue-600 focus:ring-blue-300">Simpan Pengaturan Mode Pendafaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-md mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-2 ">
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <h4 class="text-lg"><b>Pengaturan Gelombang Pendaftaran</b></h4>
                <p class="text-sm">Mengatur Pembukaan atau penutupan Pendaftaran Gelombang</p>
            </div>
            <form method="POST" action="{{ route('spmb.settings.status.store', $sekolah->uuid) }}" class="mt-4 col-span-1 md:col-span-2 lg:col-span-4 gap-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                @csrf
                <div class="col-span-1 md:col-span-1 lg:col-span-2">
                    <select name="status_pendaftaran" id="status_pendaftaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="buka" @if($status['status'] == 'buka') selected @endif>Buka</option>
                        <option value="tutup" @if($status['status'] == 'tutup') selected @endif>Tutup</option>
                    </select>
                </div>
                <div class="col-span-1 md:col-span-1 lg:col-span-2">
                    <select name="gelombang" id="gelombang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="1" @if($status['gelombang'] != null && $status['gelombang'] == 1) selected @endif>Gelombang 1</option>
                        <option value="2" @if($status['gelombang'] != null && $status['gelombang'] == 2) selected @endif>Gelombang 2</option>
                        <option value="3" @if($status['gelombang'] != null && $status['gelombang'] == 3) selected @endif>Gelombang 3</option>
                        <option value="4" @if($status['gelombang'] != null && $status['gelombang'] == 4) selected @endif>Gelombang 4</option>
                    </select>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4">
                    <div class="mt-4">
                        <button type="submit" class="button-d bg-blue-500 hover:bg-blue-600 focus:ring-blue-300">Simpan Pengaturan Mode Pendafaran</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-md mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-2 ">
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <h4 class="text-lg"><b>Pengaturan Formulir Pendafaran</b></h4>
                <p class="text-sm">Centang Formulir Pendaftaran SPMB Yang Ingin ditampilkan didalam Sistem SPMB, Buatkan Perkategori</p>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                <h4 class="text-base"><b>I. Identitas Pribadi Siswa</b></h4>
                <p class="text-sm">Mencakup Formulir Identitas pribadi siswa.</p>
            </div>
            <form method="POST" action="{{ route('spmb.settings.formulir.store', $sekolah->uuid) }}" class="col-span-1 md:col-span-2 lg:col-span-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-2 ">
                @csrf
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nama" type="checkbox" checked disabled value="nama" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nama" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Nama Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Data Nama Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="jk" type="checkbox" checked disabled value="jk" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="jk" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Jenis Kelamin</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Jenis Kelamin Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nisn" type="checkbox" @if(in_array('nisn',$formulir)) checked @endif value="nisn" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nisn" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">NISN</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Nomor Induk Siswa Nasional</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="ttl" type="checkbox" checked disabled value="ttl" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="ttl" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Tempat & Tanggal Lahir Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Tempat & Tanggal Lahir Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="agama" type="checkbox" checked disabled value="agama" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="agama" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Agama Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Agama Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="no_handphone" type="checkbox" @if(in_array('no_handphone',$formulir)) checked @endif value="no_handphone" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="no_handphone" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Handphone Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Handphone Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="no_whatsapp" type="checkbox" @if(in_array('no_whatsapp',$formulir)) checked @endif value="no_whatsapp" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="no_whatsapp" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Whatsapp Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Whatsapp Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="no_telepon" type="checkbox" @if(in_array('no_telepon',$formulir)) checked @endif value="no_telepon" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="no_telepon" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Telepon Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Telepon Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="email" type="checkbox" value="email" @if(in_array('email',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="email" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Email Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Email Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="tinggi_badan" type="checkbox" @if(in_array('tinggi_badan',$formulir)) checked @endif value="tinggi_badan" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="tinggi_badan" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Tinggi Badan Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Tinggi Badan Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="berat_badan" type="checkbox" @if(in_array('berat_badan',$formulir)) checked @endif value="berat_badan" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="berat_badan" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Berat Badan Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Berat Badan Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>II. Data Tempat Tinggal</b></h4>
                    <p class="text-sm">Mencakup Formulir Data Tempat Tinggal Siswa.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="alamat" type="checkbox" checked disabled value="alamat" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="alamat" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Alamat</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Alamat Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="rt_rw" type="checkbox" value="rt_rw" @if(in_array('rt_rw',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="rt_rw" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">RT / RW Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir RT / RW Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="kelurahan" type="checkbox" value="kelurahan" @if(in_array('kelurahan',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="kelurahan" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Kelurahan / Desa Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Kelurahan / Desa Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="kecamatan" type="checkbox" value="kecamatan" @if(in_array('kecamatan',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="kecamatan" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Kecamatan Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Kecamatan Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="kabupaten" type="checkbox" value="kabupaten" @if(in_array('kabupaten',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="kabupaten" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Kabupaten / Kota Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Kabupaten / Kota Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="provinsi" type="checkbox" value="provinsi" @if(in_array('provinsi',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="provinsi" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Provinsi Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Provinsi Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="tinggal_dengan" type="checkbox" value="tinggal_dengan" @if(in_array('tinggal_dengan',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="tinggal_dengan" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Tinggal Dengan Siswa</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Tinggal Dengan Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="jarak" type="checkbox" value="jarak" @if(in_array('jarak',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="jarak" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Jarak dari Rumah Ke Sekolah ( Berdasarkan KM )</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Jarak dari Rumah Ke Sekolah ( Berdasarkan KM )</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="transportasi" type="checkbox" @if(in_array('transportasi',$formulir)) checked @endif  value="transportasi" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="transportasi" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Alat Transportasi Ke Sekolah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Alat Transportasi Ke Sekolah</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>III. Data Kependudukan</b></h4>
                    <p class="text-sm">Mencakup Formulir Data Kependudukan Siswa.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="regis_akte" type="checkbox" @if(in_array('regis_akte',$formulir)) checked @endif  value="regis_akte" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="regis_akte" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Registrasi Akta Lahir</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Nomor Registrasi Akta Lahir</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nik" type="checkbox" value="nik" @if(in_array('nik',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nik" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Nomor Induk Kependudukan</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Nomor Induk Kependudukan Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="anak_ke" type="checkbox" value="anak_ke" @if(in_array('anak_ke',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="anak_ke" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Anak Ke .. dari .. Bersaudara</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Anak Ke .. dari .. Bersaudara</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>IV. Identitas Ayah</b></h4>
                    <p class="text-sm">Mencakup Formulir Data Identitas Ayah.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nama_ayah" type="checkbox" value="nama_ayah" @if(in_array('nama_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nama_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Nama Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Nama Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nik_ayah" type="checkbox" value="nik_ayah" @if(in_array('nik_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nik_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">NIK Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir NIK Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="ttl_ayah" type="checkbox" value="ttl_ayah" @if(in_array('ttl_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="ttl_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Tempat & Tanggal Lahir Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Tempat & Tanggal Lahir Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pekerjaan_ayah" type="checkbox" value="pekerjaan_ayah" @if(in_array('pekerjaan_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pekerjaan_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pekerjaan Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pekerjaan Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pendidikan_ayah" type="checkbox" value="pendidikan_ayah" @if(in_array('pendidikan_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pendidikan_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pendidikan Terakhir Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pendidikan Terakhir Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="handphone_ayah" type="checkbox" value="handphone_ayah" @if(in_array('handphone_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="handphone_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Handphone Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Handphone Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="penghasilan_ayah" type="checkbox" value="penghasilan_ayah" @if(in_array('penghasilan_ayah',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="penghasilan_ayah" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Penghasilan Perbulan Ayah</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Penghasilan Perbulan Ayah Siswa</p>
                        </label>
                    </div>
                </div>
                {{-- Ibu --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>V. Identitas Ibu</b></h4>
                    <p class="text-sm">Mencakup Formulir Data Identitas Ibu.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nama_ibu" type="checkbox" value="nama_ibu" @if(in_array('nama_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nama_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Nama Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Nama Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nik_ibu" type="checkbox" value="nik_ibu" @if(in_array('nik_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nik_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">NIK Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir NIK Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="ttl_ibu" type="checkbox" value="ttl_ibu" @if(in_array('ttl_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="ttl_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Tempat & Tanggal Lahir Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Tempat & Tanggal Lahir Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pekerjaan_ibu" type="checkbox" value="pekerjaan_ibu" @if(in_array('pekerjaan_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pekerjaan_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pekerjaan Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pekerjaan Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pendidikan_ibu" type="checkbox" value="pendidikan_ibu" @if(in_array('pendidikan_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pendidikan_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pendidikan Terakhir Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pendidikan Terakhir Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="handphone_ibu" type="checkbox" value="handphone_ibu" @if(in_array('handphone_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="handphone_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Handphone Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Handphone Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="penghasilan_ibu" type="checkbox" value="penghasilan_ibu" @if(in_array('penghasilan_ibu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="penghasilan_ibu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Penghasilan Perbulan Ibu</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Penghasilan Perbulan Ibu Siswa</p>
                        </label>
                    </div>
                </div>
                {{-- Wali --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>VI. Identitas Wali</b></h4>
                    <p class="text-sm">Mencakup Formulir Data Identitas Wali.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nama_wali" type="checkbox" value="nama_wali" @if(in_array('nama_wali',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nama_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Nama Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Nama Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="nik_wali" type="checkbox" value="nik_wali" @if(in_array('nik_wali',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="nik_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">NIK Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir NIK Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="ttl_wali" type="checkbox" value="ttl_wali" @if(in_array('ttl_wali',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="ttl_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Tempat & Tanggal Lahir Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Tempat & Tanggal Lahir Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pekerjaan_wali" type="checkbox" value="pekerjaan_wali" @if(in_array('pekerjaan_wali',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pekerjaan_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pekerjaan Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pekerjaan Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pendidikan_wali" type="checkbox" value="pendidikan_wali" @if(in_array('pendidikan_wali',$formulir)) checked @endif name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pendidikan_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pendidikan Terakhir Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pendidikan Terakhir Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="handphone_wali" type="checkbox" value="handphone_wali" @if(in_array('handphone_wali',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="handphone_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Handphone Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Handphone Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="penghasilan_wali" type="checkbox" value="penghasilan_wali" @if(in_array('penghasilan_wali',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="penghasilan_wali" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Penghasilan Perbulan Wali</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Penghasilan Perbulan Wali Siswa</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>VII. Identitas Contact Orang Tua</b></h4>
                    <p class="text-sm">Mencakup Data Contact Orang Tua.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="whatsapp_ortu" type="checkbox" value="whatsapp_ortu" @if(in_array('whatsapp_ortu',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="whatsapp_ortu" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No Whatsapp Orang Tua</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No Whatsapp Orang Tua</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>VIII. Penerima Kartu KPS / KIP</b></h4>
                    <p class="text-sm">Mencakup Data Kartu Indonesia Pintar dan Kartu Perlindungan Sosial.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="kps" type="checkbox" value="kps" @if(in_array('kps',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="kps" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No KPS ( Kartu Perlindungan Sosial )</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No KPS</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-neutral-primary-soft border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="kip" type="checkbox" value="kip" @if(in_array('kip',$formulir)) checked @endif  name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="kip" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">No KIP ( Kartu Indonesia Pintar )</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir No KIP</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <h4 class="text-base"><b>IX. Identitas Sekolah</b></h4>
                    <p class="text-sm">Mencakup Data Identitas Sekolah Sebelumnya.</p>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="jenis_pendaftaran" type="checkbox" checked disabled value="jenis_pendaftaran" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="jenis_pendaftaran" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Jenis Pendaftaran</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Jenis Pendaftaran</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="pindah_ke" type="checkbox" checked disabled value="pindah_ke" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="pindah_ke" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Pindah ke tingkat ( Khusus Siswa Pindahan )</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Pindah ke tingkat ( Khusus Siswa Pindahan )</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex space-x-2.5 bg-gray-200 border border-default rounded-lg border-gray-300 shadow-xs h-full">
                        <input id="sekolah_asal" type="checkbox" checked disabled value="sekolah_asal" name="formulir_spmb[]" class="w-4 h-4 mt-4 ms-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="sekolah_asal" class="py-3 pe-4">
                            <p class="select-none w-full text-sm font-medium text-heading">Sekolah Asal</p>
                            <p id="helper-checkbox-bordered-1" class="select-none text-sm text-body">Formulir Sekolah Asal Siswa Pendaftaran</p>
                        </label>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-4">
                    <button type="submit" class="button-d simpan-formulir bg-amber-300 hover:bg-amber-400 w-full sm:w-auto focus:ring-amber-200" href="{{ route('spmb.settings',$sekolah->uuid) }}">Setting SPMB</button>
                </div>
            </form>
        </div>
    </div>

    {{-- setting Apa yang harus di upload SPMB --}}
    <div class="p-4 bg-white rounded-lg shadow-md mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-2 ">
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <h4 class="text-lg"><b>Pengaturan Berkas</b></h4>
                <p class="text-sm">Set Berkas Yang harus diupload dalam aplikasi SPMB ini</p>
            </div>
            <form action="{{ route('spmb.settings.berkas.store',$sekolah->uuid) }}" method="POST" class="col-span-1 md:col-span-2 lg:col-span-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-2">
                @csrf
                <div class="col-span-1 md:col-span-1 lg:col-span-2">
                    <label for="nama_berkas">Nama Berkas</label>
                    <input type="text" name="nama_berkas" id="nama_berkas" class="w-full mt-1 mb-2 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200" placeholder="Masukkan Nama Berkas yang harus diupload">
                </div>
                <div class="col-span-1 md:col-span-1 lg:col-span-2">
                    <label for="deskripsi_berkas">Deskripsi Berkas</label>
                    <input type="text" name="deskripsi_berkas" id="deskripsi_berkas" class="w-full mt-1 mb-2 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200" placeholder="Masukkan Deskripsi agar pendaftar paham berkas apa yang harus diupload">
                </div>
                <div class="col-span-1 md:col-span-2 lg-col-span-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-950 text-white px-2.5 py-1.5 rounded-lg cursor-pointer">Simpan Pengaturan Berkas</button>
                </div>
            </form>
            <div class="col-span-1 md:col-span-2 lg:col-span-2">
                <ul class="w-full text-sm font-medium text-heading bg-neutral-primary-soft border border-neutral-400 rounded-lg mt-3">
                    @foreach ($berkas_spmb as $item)
                        <li class="w-full px-4 py-2 border-b border-neutral-400 rounded-t-lg flex justify-between align-items-center">
                            <div class="text-box">
                                <p class="text-base">{{$item['nama_berkas']}}</p>
                                <p class="text-[12px] text-gray-700"><i>{{$item['deskripsi_berkas']}}</i></p>
                            </div>
                            <div class="text-box">
                                <button data-file="{{ $item['nama_berkas'] }}" class="text-red-600 hover:text-red-800 px-1 py-1 hover:bg-neutral-50 rounded-lg cursor-pointer hapus-berkas"><span class="material-icons-round" style="font-size: 24px">delete_outline</span></button>
                            </div>
                        </li>        
                    @endforeach
                
                </ul>
            </div>
        </div>
    </div>
    <script type="module">
        $('.hapus-berkas').on('click', function() {
            var namaBerkas = $(this).data('file');
            var idSekolah = "{{ $sekolah->uuid }}";
            cConfirm("Perhatian",'Yakin untuk menghapus berkas ini, pastikan tidak ada siswa yang sudah mengupload berkas ini',function() {
                loading();
                var url = "{{ route('spmb.settings.berkas.delete',':id') }}";
                url = url.replace(':id',idSekolah);
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: {namaBerkas : namaBerkas},
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(data) {
                        removeLoading();
                        cAlert('green',"Berhasil","Berhasil menghapus berkas ini",true);

                    },
                    error : function(data) {
                        console.log(data.responseText.message);
                    }
                })
            });
        });
    </script>
@endsection