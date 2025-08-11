@extends('layouts.main')

@section('container')
<div class="p-4 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold">Data Profile Sekolah</h1>
    <p class="text-gray-600 italic">Halaman untuk mengatur Profile Sekolah Naungan</p>
    <div class="border-b border-b-gray-300 mt-3"></div>
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
    <div class="mt-4">
        <a href="{{ route('profile.edit',$sekolah->uuid) }}" class="text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-amber-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">Edit Profile</a>
        <div class="grid grid-cols-6 mt-10">
            <div class="col-span-6 mb-2">
                <h5 class="font-black text-2xl">Profil Sekolah</h5>
            </div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Nama Sekolah</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->nama}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Nomor Pokok Sekolah Nasional ( NPSN )</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->npsn ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Nomor Statistik Sekolah ( NSS )</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->nss ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Email</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->email ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">No Telepon</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->contact ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">SK Izin Operasional</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->sk_izin_operasional ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Tanggal Izin Operasional</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{date('d F Y',strtotime($sekolah->profile->tanggal_izin_operasional ?? '')) ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Akreditasi</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->akreditasi ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Kepala Sekolah</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->nama_kepsek ?? ''}}</p></div>
            <div class="col-span-6"><p class="text-base font-bold mb-2">Alamat Sekolah</p>
            </div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Alamat Lengkap</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->alamat_jalan ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Kelurahan</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->alamat_kelurahan ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Kecamatan</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->alamat_kecamatan ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Kota</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->alamat_kota ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Provinsi</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->alamat_provinsi ?? ''}}</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-2 mb-0 sm:mb-2 text-gray-700 italic"><p class="text-sm md:text-base">Kode Pos</p></div>
            <div class="col-span-6 sm:col-span-3 md:col-span-4 mb-2"><p class="text-md/10">{{$sekolah->profile->alamat_kode_pos ?? ''}}</p></div>
            <div class="col-span-6 mb-4"><p class="text-base font-bold">Deskripsi Singkat Sekolah</p></div>
            <div class="col-span-6 mb-4"><p class="text-base">{!!  $sekolah->profile->deskripsi ?? '' !!}</p></div>
            <div class="col-span-6 mb-4"><p class="text-base font-bold">Visi Sekolah</p></div>
            <div class="col-span-6 mb-4"><p class="text-base">{!!  $sekolah->profile->visi_sekolah ?? '' !!}</p></div>
            <div class="col-span-6 mb-4"><p class="text-base font-bold">Misi Sekolah</p></div>
            <div class="col-span-6 mb-4 leading-8"><p class="text-base">{!!  $sekolah->profile->misi_sekolah ?? '' !!}</p></div>
            <div class="col-span-6 mb-4"><p class="text-base font-bold">Tabel Jumlah Guru</p></div>
            <div class="col-span-6 mb-4">
                @php
                    if($sekolah->profile != null && $sekolah->profile->jumlah_siswa != null) {
                        $jumlah_siswa = unserialize($sekolah->profile->jumlah_siswa);
                        $jumlah_siswa_perempuan = $jumlah_siswa['p'];
                        $jumlah_siswa_laki = $jumlah_siswa['l'];
                        $total_siswa = $jumlah_siswa_perempuan + $jumlah_siswa_laki;
                    }
                    if($sekolah->profile != null && $sekolah->profile->jumlah_guru != null) {
                        $jumlah_guru = unserialize($sekolah->profile->jumlah_guru);
                        $jumlah_guru_perempuan = $jumlah_guru['p'];
                        $jumlah_guru_laki = $jumlah_guru['l'];
                        $total_guru = $jumlah_guru_perempuan + $jumlah_guru_laki;
                    }
                    if($sekolah->profile != null && $sekolah->profile->pendik_akhir_guru != null) {
                        $pendik_akhir_guru = unserialize($sekolah->profile->pendik_akhir_guru);
                        $pendik_akhir_smp = $pendik_akhir_guru['smp'];
                        $pendik_akhir_sma = $pendik_akhir_guru['sma'];
                        $pendik_akhir_s1 = $pendik_akhir_guru['s1'];
                        $pendik_akhir_s2 = $pendik_akhir_guru['s2'];
                        $total_pendik = $pendik_akhir_smp + $pendik_akhir_sma + $pendik_akhir_s1 + $pendik_akhir_s2;
                    }
                @endphp
                <div class="w-max-full overflow-x-auto">
                    <table class="w-full text-sm text-gray-500 text-left rtl:text-right text-gray-500" id="table-statistic">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-collapse">
                            <tr>
                                <th class="px-6 py-3 border border-gray-500 text-center" colspan="3">Jumlah Siswa</th>
                                <th class="px-6 py-3 border border-gray-500 text-center" colspan="3">Jumlah Guru</th>
                                <th class="px-6 py-3 border border-gray-500 text-center" colspan="2">Sertifikasi Guru</th>
                                <th class="px-6 py-3 border border-gray-500 text-center" colspan="5">Pendidikan Terakhir Guru</th>
                            </tr>
                            <tr>
                                <th class="px-6 py-3 border border-gray-500 text-center">Lk</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Pr</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Jumlah</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Lk</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Pr</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Jumlah</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Iya</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Tidak</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">SMP</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">SMA</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">S1</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">S2</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$jumlah_siswa_perempuan ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$jumlah_siswa_laki ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$total_siswa ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$jumlah_guru_perempuan ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$jumlah_guru_laki ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$total_guru ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$sekolah->profile->jumlah_guru_sertifikasi ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$sekolah->profile && $sekolah->profile->jumlah_guru_sertifikasi ? $total_guru - $sekolah->profile->jumlah_guru_sertifikasi : 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$pendik_akhir_smp ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$pendik_akhir_sma ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$pendik_akhir_s1 ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$pendik_akhir_s2 ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$total_pendik ?? 0}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-6 mb-4"><p class="text-base font-bold">Tabel Jumlah Prestasi</p></div>
            <div class="col-span-6 mb-4">
                @php
                    if($sekolah->profile != null && $sekolah->profile->prestasi_akademik != null) {
                        $prestasi_akademik = unserialize($sekolah->profile->prestasi_akademik);
                        $prestasi_akademik_kota = $prestasi_akademik['kota'];
                        $prestasi_akademik_provinsi = $prestasi_akademik['provinsi'];
                        $prestasi_akademik_nasional = $prestasi_akademik['nasional'];
                        $total_akademik = $prestasi_akademik_kota + $prestasi_akademik_provinsi + $prestasi_akademik_nasional;
                    }
                    if($sekolah->profile != null && $sekolah->profile->prestasi_non_akademik != null) {
                        $prestasi_non_akademik = unserialize($sekolah->profile->prestasi_non_akademik);
                        $prestasi_non_akademik_kota = $prestasi_non_akademik['kota'];
                        $prestasi_non_akademik_provinsi = $prestasi_non_akademik['provinsi'];
                        $prestasi_non_akademik_nasional = $prestasi_non_akademik['nasional'];
                        $total_non_akademik = $prestasi_non_akademik_kota + $prestasi_non_akademik_provinsi + $prestasi_non_akademik_nasional;
                    }
                @endphp
                <div class="w-max-full overflow-x-auto">
                    <table class="w-full text-sm text-gray-500 text-left rtl:text-right text-gray-500" id="table-statistic">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-collapse">
                            <tr>
                                <th class="px-6 py-3 border border-gray-500 text-center" colspan="4">Jumlah Prestasi Akademik</th>
                                <th class="px-6 py-3 border border-gray-500 text-center" colspan="4">Jumlah Prestasi No Akademik</th>
                            </tr>
                            <tr>
                                <th class="px-6 py-3 border border-gray-500 text-center">Kota</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Provinsi</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Nasional</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Jumlah</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Kota</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Provinsi</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Nasional</th>
                                <th class="px-6 py-3 border border-gray-500 text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$prestasi_akademik_kota ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$prestasi_akademik_provinsi ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$prestasi_akademik_nasional ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$total_akademik ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$prestasi_non_akademik_kota ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$prestasi_non_akademik_provinsi ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$prestasi_non_akademik_nasional ?? 0}}</td>
                                <td class="px-6 py-3 border border-gray-500 text-center">{{$total_non_akademik ?? 0}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
