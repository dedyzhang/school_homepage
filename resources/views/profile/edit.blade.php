@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Data Profile Sekolah</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur Profile Sekolah Naungan</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        {{-- Add your dashboard content here --}}
        @php
            if($sekolah->profile != null && $sekolah->profile->jumlah_siswa != null) {
                $jumlah_siswa = unserialize($sekolah->profile->jumlah_siswa);
                $jumlah_siswa_perempuan = $jumlah_siswa['p'];
                $jumlah_siswa_laki = $jumlah_siswa['l'];
            }
            if($sekolah->profile != null && $sekolah->profile->jumlah_guru != null) {
                $jumlah_guru = unserialize($sekolah->profile->jumlah_guru);
                $jumlah_guru_perempuan = $jumlah_guru['p'];
                $jumlah_guru_laki = $jumlah_guru['l'];
            }
            if($sekolah->profile != null && $sekolah->profile->pendik_akhir_guru != null) {
                $pendik_akhir_guru = unserialize($sekolah->profile->pendik_akhir_guru);
                $pendik_akhir_smp = $pendik_akhir_guru['smp'];
                $pendik_akhir_sma = $pendik_akhir_guru['sma'];
                $pendik_akhir_s1 = $pendik_akhir_guru['s1'];
                $pendik_akhir_s2 = $pendik_akhir_guru['s2'];
            }
            if($sekolah->profile != null && $sekolah->profile->prestasi_akademik != null) {
                $prestasi_akademik = unserialize($sekolah->profile->prestasi_akademik);
                $prestasi_akademik_kota = $prestasi_akademik['kota'];
                $prestasi_akademik_provinsi = $prestasi_akademik['provinsi'];
                $prestasi_akademik_nasional = $prestasi_akademik['nasional'];
            }
            if($sekolah->profile != null && $sekolah->profile->prestasi_non_akademik != null) {
                $prestasi_non_akademik = unserialize($sekolah->profile->prestasi_non_akademik);
                $prestasi_non_akademik_kota = $prestasi_non_akademik['kota'];
                $prestasi_non_akademik_provinsi = $prestasi_non_akademik['provinsi'];
                $prestasi_non_akademik_nasional = $prestasi_non_akademik['nasional'];
            }

        @endphp
        <div class="mt-5">
            <p class="text-md font-bold">Form Edit Profile Sekolah</p>
            <form method="post" action="{{ route('profile.update', $sekolah->uuid) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid grid-cols-4 sm:grid-cols-4 mt-5 gap-2">
                    <div class="mb-2 col-span-4">
                        <label for="nama" class="block text-sm mb-2">Nama Sekolah</label>
                        <input type="text" id="nama" name="nama" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 rounded-lg" placeholder="Masukkan Nama Sekolah" value="{{ old('nama',$sekolah->nama) }}" disabled />
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="nss" class="block text-sm mb-2">NSS Sekolah </label>
                        <input type="number" id="nss" name="nss" class="@error('nss') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan nss Sekolah" value="{{ old('nss',$sekolah->profile->nss ?? '' ) }}" />
                        @error('nss')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="npsn" class="block text-sm mb-2">Nomor Pokok Sekolah Nasional (NPSN) </label>
                        <input type="number" id="npsn" name="npsn" class="@error('npsn') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan npsn Sekolah" value="{{ old('npsn',$sekolah->profile->npsn ?? '' ) }}" />
                        @error('npsn')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4">
                        <label for="alamat" class="block text-sm mb-2">Alamat Sekolah</label>
                        <textarea id="alamat" name="alamat" class="@error('alamat') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Alamat Sekolah" rows="3">{{ old('alamat',$sekolah->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="kelurahan" class="block text-sm mb-2">Kelurahan </label>
                        <input type="text" id="kelurahan" name="kelurahan" class="@error('kelurahan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan kelurahan Sekolah" value="{{ old('kelurahan',$sekolah->profile->alamat_kelurahan ?? '' ) }}" />
                        @error('kelurahan')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="kecamatan" class="block text-sm mb-2">Kecamatan </label>
                        <input type="text" id="kecamatan" name="kecamatan" class="@error('kecamatan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan kecamatan Sekolah" value="{{ old('kecamatan',$sekolah->profile->alamat_kecamatan ?? '' ) }}" />
                        @error('kecamatan')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="kota" class="block text-sm mb-2">Kota </label>
                        <input type="text" id="kota" name="kota" class="@error('kota') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan kota Sekolah" value="{{ old('kota',$sekolah->profile->alamat_kota ?? '' ) }}" />
                        @error('kota')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="provinsi" class="block text-sm mb-2">Provinsi </label>
                        <input type="text" id="provinsi" name="provinsi" class="@error('provinsi') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan provinsi Sekolah" value="{{ old('provinsi',$sekolah->profile->alamat_provinsi ?? '' ) }}" />
                        @error('provinsi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="kode_pos" class="block text-sm mb-2">Kode Pos </label>
                        <input type="text" id="kode_pos" name="kode_pos" class="@error('kode_pos') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Kode Pos Sekolah" value="{{ old('kode_pos',$sekolah->profile->alamat_kode_pos ?? '' ) }}" />
                        @error('kode_pos')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-4">
                        <label for="maps" class="block text-sm mb-2">IFrame Peta Lokasi Sekolah </label>
                        <input type="text" id="maps" name="maps" class="@error('maps') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan IFrame Lokasi Sekolah" value="{{ old('maps',$sekolah->profile->maps ?? '' ) }}" />
                        @error('maps')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>

                    <div class="mb-2 col-span-4">
                        <label for="contact" class="block text-sm mb-2">Kontak Sekolah</label>
                        <input type="text" id="contact" name="contact" class="@error('contact') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Kontak Sekolah" value="{{ old('contact',$sekolah->contact) }}" />
                        @error('contact')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4">
                        <label for="email" class="block text-sm mb-2">Email Sekolah</label>
                        <input type="text" id="email" name="email" class="@error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Email Sekolah" value="{{ old('email',$sekolah->email) }}" />
                        @error('email')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi dan Harus Berformat Email</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4">
                        <label for="nama_kepsek" class="block text-sm mb-2">Nama Kepala Sekolah</label>
                        <input type="text" id="nama_kepsek" name="nama_kepsek" class="@error('nama_kepsek') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Nama Kepala Sekolah" value="{{ old('nama_kepsek',$sekolah->profile->nama_kepsek ?? '') }}" />
                        @error('nama_kepsek')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4">
                        @if ($sekolah->profile && $sekolah->profile->gambar_kepsek != "")
                            <p class="text-sm mb-2">Gambar Kepala Sekolah Yang Sudah Diupload</p>
                            <img class="w-full sm:w-[35%] mb-2" src="{{ asset('storage/kepsek/'.$sekolah->profile->gambar_kepsek) }}"></img>
                        @endif
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="gambar_kepsek">Upload Gambar Kepsek</label>
                        <input class="block w-full text-sm border rounded-lg cursor-pointer  @error('gambar_kepsek') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border-gray-300 text-gray-900 placeholder-gray-700 @endif" id="gambar_kepsek" name="gambar_kepsek" type="file" placeholder="Masukkan File Gambar Yang Akan Diupload">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG atau JPG dengan size max.2MB .</p>
                        @error('gambar_kepsek')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4">
                        @if ($sekolah->profile && $sekolah->profile->gambar_sekolah != "")
                            <p class="text-sm mb-2">Gambar Sekolah</p>
                            <img class="w-full sm:w-[35%] mb-2" src="{{ asset('storage/sekolah/'.$sekolah->profile->gambar_sekolah) }}"></img>
                        @endif
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="gambar_sekolah">Upload Gambar Sekolah</label>
                        <input class="block w-full text-sm border rounded-lg cursor-pointer  @error('gambar_sekolah') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border-gray-300 text-gray-900 placeholder-gray-700 @endif" id="gambar_sekolah" name="gambar_sekolah" type="file" placeholder="Masukkan File Gambar Yang Akan Diupload">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG atau JPG dengan size max.2MB .</p>
                        @error('gambar_sekolah')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="sk_izin_operasional" class="block text-sm mb-2">SK Izin Operasional</label>
                        <input type="text" id="sk_izin_operasional" name="sk_izin_operasional" class="@error('sk_izin_operasional') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan sk_izin_operasional Sekolah" value="{{ old('sk_izin_operasional',$sekolah->profile->sk_izin_operasional ?? '') }}" />
                        @error('sk_izin_operasional')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4 sm:col-span-2">
                        <label for="tanggal_izin_operasional" class="block text-sm mb-2">Tanggal Izin Operasional</label>
                        <input type="date" id="tanggal_izin_operasional" name="tanggal_izin_operasional" class="@error('tanggal_izin_operasional') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan tanggal_izin_operasional Sekolah" value="{{ old('tanggal_izin_operasional',$sekolah->profile->tanggal_izin_operasional ?? '') }}" />
                        @error('tanggal_izin_operasional')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-4">
                        <label for="deskripsi" class="block text-sm mb-2">Deskripsi Singkat Sekolah</label>
                        <textarea class="textarea-tinymce" id="deskripsi" name="deskripsi" id="deskripsi">{{old('deskripsi',$sekolah->profile->deskripsi ?? '')}}</textarea>
                        @error('deskripsi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-4">
                        <label for="visi_sekolah" class="block text-sm mb-2">Visi Sekolah</label>
                        <textarea class="textarea-tinymce" id="visi_sekolah" name="visi_sekolah" id="visi_sekolah">{{old('visi_sekolah',$sekolah->profile->visi_sekolah ?? '')}}</textarea>
                        @error('visi_sekolah')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-4">
                        <label for="misi_sekolah" class="block text-sm mb-2">Misi Sekolah</label>
                        <textarea class="textarea-tinymce" id="misi_sekolah" name="misi_sekolah" id="misi_sekolah">{{old('misi_sekolah',$sekolah->profile->misi_sekolah ?? '')}}</textarea>
                        @error('misi_sekolah')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-4 col-span-4">
                        <label for="kata_sambutan_kepsek" class="block text-sm mb-2">Kata Sambutan Kepala Sekolah</label>
                        <textarea class="textarea-tinymce" id="kata_sambutan_kepsek" name="kata_sambutan_kepsek" id="kata_sambutan_kepsek">{{old('kata_sambutan_kepsek',$sekolah->profile->kata_sambutan_kepsek ?? '')}}</textarea>
                        @error('kata_sambutan_kepsek')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mb-2 col-span-4">
                        <label for="akreditasi" class="block text-sm mb-2">Akreditasi</label>
                        <select id="akreditasi" class="@error('akreditasi') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror rounded-lg block w-full p-2.5" name="akreditasi">
                            <option value="">Pilih Salah Satu</option>
                            <option value="A" @if(old('akreditasi',$sekolah->profile->akreditasi ?? '') == 'A') selected @endif>A</option>
                            <option value="A" @if(old('akreditasi',$sekolah->profile->akreditasi ?? '') == 'B') selected @endif>B</option>
                            <option value="A" @if(old('akreditasi',$sekolah->profile->akreditasi ?? '') == 'C') selected @endif>C</option>
                            <option value="A" @if(old('akreditasi',$sekolah->profile->akreditasi ?? '') == 'D') selected @endif>D</option>

                        </select>
                        @error('akreditasi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-4 sm:col-span-2">
                        <label for="jumlah_siswa_perempuan" class="block text-sm mb-2">Jumlah Siswa Perempuan</label>
                        <input type="number" id="jumlah_siswa_perempuan" name="jumlah_siswa_perempuan" class="@error('jumlah_siswa_perempuan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Jumlah Siswa Perempuan di Sekolah" value="{{ old('jumlah_siswa_perempuan',$jumlah_siswa_perempuan ?? '') }}" />
                        @error('jumlah_siswa_perempuan')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-4 sm:col-span-2">
                        <label for="jumlah_siswa_laki" class="block text-sm mb-2">Jumlah Siswa Laki-laki</label>
                        <input type="number" id="jumlah_siswa_laki" name="jumlah_siswa_laki" class="@error('jumlah_siswa_laki') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Jumlah Siswa Laki-Laki di Sekolah" value="{{ old('jumlah_siswa_laki',$jumlah_siswa_laki ?? '') }}" />
                        @error('jumlah_siswa_laki')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>

                    <div class="mt-4 col-span-4 sm:col-span-2">
                        <label for="jumlah_guru_perempuan" class="block text-sm mb-2">Jumlah Guru Perempuan</label>
                        <input type="number" id="jumlah_guru_perempuan" name="jumlah_guru_perempuan" class="@error('jumlah_guru_perempuan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Jumlah Guru Perempuan di Sekolah" value="{{ old('jumlah_guru_perempuan',$jumlah_guru_perempuan ?? '') }}" />
                        @error('jumlah_guru_perempuan')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-4 sm:col-span-2">
                        <label for="jumlah_guru_laki" class="block text-sm mb-2">Jumlah Guru Laki Laki</label>
                        <input type="number" id="jumlah_guru_laki" name="jumlah_guru_laki" class="@error('jumlah_guru_laki') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Jumlah Guru Laki-Laki di Sekolah" value="{{ old('jumlah_guru_laki',$jumlah_guru_laki ?? '') }}" />
                        @error('jumlah_guru_laki')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-4">
                        <label for="jumlah_guru_sertifikasi" class="block text-sm mb-2">Jumlah Guru Sertifikasi</label>
                        <input type="number" id="jumlah_guru_sertifikasi" name="jumlah_guru_sertifikasi" class="@error('jumlah_guru_sertifikasi') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Jumlah Guru sertifikasi di Sekolah" value="{{ old('jumlah_guru_sertifikasi',$sekolah->profile->jumlah_guru_sertifikasi ?? '') }}" />
                        @error('jumlah_guru_sertifikasi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="pendik_akhir_guru_smp" class="block text-sm mb-2">Pendidikan Akhir Guru SMP</label>
                        <input type="number" id="pendik_akhir_guru_smp" name="pendik_akhir_guru_smp" class="@error('pendik_akhir_guru_smp') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Pendidikan Akhir Guru SMP di Sekolah" value="{{ old('pendik_akhir_guru_smp',$pendik_akhir_smp ?? '') }}" />
                        @error('pendik_akhir_guru_smp')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="pendik_akhir_guru_sma" class="block text-sm mb-2">Pendidikan Akhir Guru SMA/K</label>
                        <input type="number" id="pendik_akhir_guru_sma" name="pendik_akhir_guru_sma" class="@error('pendik_akhir_guru_sma') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Pendidikan Akhir Guru SMA/K di Sekolah" value="{{ old('pendik_akhir_guru_sma',$pendik_akhir_sma ?? '') }}" />
                        @error('pendik_akhir_guru_sma')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="pendik_akhir_guru_s1" class="block text-sm mb-2">Pendidikan Akhir Guru S1</label>
                        <input type="number" id="pendik_akhir_guru_s1" name="pendik_akhir_guru_s1" class="@error('pendik_akhir_guru_s1') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Pendidikan Akhir Guru S1 di Sekolah" value="{{ old('pendik_akhir_guru_s1',$pendik_akhir_s1 ?? '') }}" />
                        @error('pendik_akhir_guru_s1')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="pendik_akhir_guru_s2" class="block text-sm mb-2">Pendidikan Akhir Guru S2</label>
                        <input type="number" id="pendik_akhir_guru_s2" name="pendik_akhir_guru_s2" class="@error('pendik_akhir_guru_s2') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Pendidikan Akhir Guru S2 di Sekolah" value="{{ old('pendik_akhir_guru_s2',$pendik_akhir_s2 ?? '') }}" />
                        @error('pendik_akhir_guru_s2')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="prestasi_akademik_kota" class="block text-sm mb-2">Prestasi Akademik Kota</label>
                        <input type="number" id="prestasi_akademik_kota" name="prestasi_akademik_kota" class="@error('prestasi_akademik_kota') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Prestasi Akademik Kota di Sekolah" value="{{ old('prestasi_akademik_kota',$prestasi_akademik_kota ?? '') }}" />
                        @error('prestasi_akademik_kota')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="prestasi_akademik_provinsi" class="block text-sm mb-2">Prestasi Akademik Provinsi</label>
                        <input type="number" id="prestasi_akademik_provinsi" name="prestasi_akademik_provinsi" class="@error('prestasi_akademik_provinsi') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Prestasi Akademik Provinsi di Sekolah" value="{{ old('prestasi_akademik_provinsi',$prestasi_akademik_provinsi ?? '') }}" />
                        @error('prestasi_akademik_provinsi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="col-span-2 grid grid-cols-subgrid gap-2">
                        <div class="mt-4 col-span-2 col-start-1 col-end-2">
                            <label for="prestasi_akademik_nasional" class="block text-sm mb-2">Prestasi Akademik Nasional</label>
                            <input type="number" id="prestasi_akademik_nasional" name="prestasi_akademik_nasional" class="@error('prestasi_akademik_nasional') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Prestasi Akademik Nasional di Sekolah" value="{{ old('prestasi_akademik_nasional',$prestasi_akademik_nasional ?? '') }}" />
                            @error('prestasi_akademik_nasional')
                                <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="prestasi_non_akademik_kota" class="block text-sm mb-2">Prestasi Non Akademik Kota</label>
                        <input type="number" id="prestasi_non_akademik_kota" name="prestasi_non_akademik_kota" class="@error('prestasi_non_akademik_kota') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Prestasi Akademik Kota di Sekolah" value="{{ old('prestasi_non_akademik_kota',$prestasi_non_akademik_kota ?? '') }}" />
                        @error('prestasi_non_akademik_kota')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="prestasi_non_akademik_provinsi" class="block text-sm mb-2">Prestasi Non Akademik Provinsi</label>
                        <input type="number" id="prestasi_non_akademik_provinsi" name="prestasi_non_akademik_provinsi" class="@error('prestasi_non_akademik_provinsi') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Prestasi Akademik Provinsi di Sekolah" value="{{ old('prestasi_non_akademik_provinsi',$prestasi_non_akademik_provinsi ?? '') }}" />
                        @error('prestasi_non_akademik_provinsi')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-2 sm:col-span-1">
                        <label for="prestasi_non_akademik_nasional" class="block text-sm mb-2">Prestasi Non Akademik Nasional</label>
                        <input type="number" id="prestasi_non_akademik_nasional" name="prestasi_non_akademik_nasional" class="@error('prestasi_non_akademik_nasional') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-200 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 @enderror block w-full p-2.5 rounded-lg" placeholder="Masukkan Prestasi Akademik Nasional di Sekolah" value="{{ old('prestasi_non_akademik_nasional',$prestasi_non_akademik_nasional ?? '') }}" />
                        @error('prestasi_non_akademik_nasional')
                            <p class="text-xs text-red-600 dark:text-red-500 mt-1"><span class="font-medium">Perhatian!</span> Wajib Diisi</p>
                        @enderror
                    </div>
                    <div class="mt-4 col-span-4">
                        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        tinymce.init({
            selector: ".textarea-tinymce",
            theme: 'silver',
            plugins:
                "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount",
            toolbar1:
                "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough removeformat",
            toolbar2:
                "link image media table mergetags | hecklist numlist bullist indent outdent | align lineheight",
        });
    </script>
@endsection
