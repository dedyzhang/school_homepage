@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
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
    @if($status['status'] == null || $status['status'] == 'tutup')
        <div class="my-10 px-5 md:px-0 w-full md:w-[85%] mx-auto">
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">Pendaftaran Ditutup</p>
                <p>Maaf, saat ini pendaftaran penerimaan siswa baru di {{$sekolah->nama}} sedang ditutup. Silakan kunjungi kembali di lain waktu.</p>
            </div>
        </div>
    @else 
    <form action="{{ route('home.spmb.store',$sekolah->uuid) }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 my-15 px-10 sm:px-2 w-full md:w-[85%] mx-auto gap-5">
            <div class="col-span-1 sm:col-span-2 md:col-span-3 text-center mb-10">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold">Formulir Penerimaan Siswa Baru</h2>
            </div>
            <div class="col-span-1 gap-3 grid grid-cols-1">
                <div class="form-group">
                    <p><b>I. Identitas Pribadi Siswa</b></p>
                </div>
                <div class="form-group">
                    <label for="nama" class="block text-sm @error('nama') text-red-800 @else text-gray-800 @endif mb-1">Nama Lengkap Siswa</label>
                    <input type="text" name="nama" id="nama" class="block w-full min-w-0 grow py-1.5 px-3 text-base @error('nama') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror focus:outline-none sm:text-sm/6 rounded-lg  outline-0 focus:border-indigo-500" placeholder="Masukkan Nama Lengkap Siswa" value="{{ old('nama') }}" />
                    @error('nama')
                        <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk" class="block text-sm @error('jk') text-red-800 @else text-gray-800 @endif mb-2">Jenis Kelamin Siswa</label>
                    <div class="flex">
                        <div class="flex items-center me-4">
                            <input id="lk" type="radio" value="l" name="jk" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none" @if(@old('jk') == 'l') checked @endif>
                            <label for="lk" class="select-none ms-2 text-sm font-medium text-heading">Laki-Laki</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="pr" type="radio" value="p" name="jk" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none" @if(@old('jk') == 'p') checked @endif>
                            <label for="pr" class="select-none ms-2 text-sm font-medium text-heading">Perempuan</label>
                        </div>
                         @error('jk')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                </div>
                @if(in_array('nisn',$formulir))
                    <div class="form-group">
                        <label for="nisn" class="block text-sm @error('nisn') text-red-800 @else text-gray-800 @endif mb-1">Nomor Induk Siswa Nasional (NISN)</label>
                        <input type="text" name="nisn" id="nisn" class="block w-full min-w-0 grow py-1.5 px-3 text-base @error('nisn') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500" placeholder="Masukkan NISN Siswa" value="{{old('nisn')}}" />
                        @error('nisn')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                <div class="form-group">
                    <label for="tempat_lahir" class="block text-sm @error('tempat_lahir') text-red-800 @else text-gray-800 @endif mb-1">Tempat Lahir Siswa</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="block w-full min-w-0 grow py-1.5 px-3 text-base @error('tempat_lahir') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500" placeholder="Masukkan Tempat Lahir Siswa" value="{{old('tempat_lahir')}}" />
                    @error('tempat_lahir')
                        <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class="block text-sm @error('tanggal_lahir') text-red-800 @else text-gray-800 @endif mb-1">Tanggal Lahir Siswa</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block w-full min-w-0 grow py-1.5 px-3 text-base @error('tanggal_lahir') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500" placeholder="Masukkan Tanggal Lahir Siswa" value="{{old('tanggal_lahir')}}" />
                    @error('tanggal_lahir')
                        <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="agama" class="block text-sm @error('agama') text-red-800 @else text-gray-800 @endif mb-1">Agama Siswa</label>
                    <select name="agama" id="agama" class="block w-full min-w-0 grow py-1.5 px-3 text-base @error('agama') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500">
                        <option value="">Pilih salah satu</option>
                        <option value="Buddha" @if(old('agama') == "Buddha") selected @endif>Buddha</option>
                        <option value="Islam" @if(old('agama') == "Islam") selected @endif>Islam</option>
                        <option value="Protestan" @if(old('agama') == "Protestan") selected @endif>Kristen Protestan</option>
                        <option value="Katolik" @if(old('agama') == "Katolik") selected @endif>Kristen Katolik</option>
                        <option value="Hindu" @if(old('agama') == "Hindu") selected @endif>Hindu</option>
                        <option value="Konghucu" @if(old('agama') == "Konghucu") selected @endif>Konghucu</option>
                    </select>
                    @error('agama')
                        <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                    @enderror
                </div>
                @if(in_array('no_handphone',$formulir))
                    <div class="form-group">
                        <label for="no_handphone" class="block text-sm @error('no_handphone') text-red-800 @else text-gray-800 @endif mb-1">No Handphone Siswa</label>
                        <input type="text" name="no_handphone" id="no_handphone" class="block w-full min-w-0 grow py-1.5 px-3 text-base @error('no_handphone') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 mask-phone" placeholder="Masukkan No Handphone Siswa" value="{{old('no_handphone')}}" />
                        @error('no_handphone')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
        
                @if(in_array('no_whatsapp',$formulir))
                    <div class="form-group">
                        <label for="no_whatsapp" class="block text-sm @error('no_whatsapp') text-red-800 @else text-gray-800 @endif mb-1">No Whatsapp Siswa</label>
                        <input type="text" name="no_whatsapp" id="no_whatsapp" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('no_whatsapp') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500 mask-phone" placeholder="Masukkan No Whatsapp Siswa" value="{{ old('no_whatsapp') }}" />
                        @error('no_whatsapp')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('no_telepon',$formulir))
                    <div class="form-group">
                        <label for="no_telepon" class="block text-sm @error('no_telepon') text-red-800 @else text-gray-800 @endif mb-1">No Telepon Rumah</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('no_telepon') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500 mask-phone" placeholder="Masukkan No Telepon Rumah Siswa" value="{{ old('no_telepon') }}" />
                    </div>
                    @error('no_telepon')
                        <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                    @enderror
                @endif
                @if(in_array('email',$formulir))
                    <div class="form-group">
                        <label for="email" class="block text-sm @error('email') text-red-800 @else text-gray-800 @endif mb-1">Email Siswa</label>
                        <input type="text" name="email" id="email" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('email') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Email Siswa" value="{{ old('email') }}" />
                         @error('email')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('tinggi_badan',$formulir))
                    <div class="form-group">
                        <label for="tinggi_badan" class="block text-sm @error('tinggi_badan') text-red-800 @else text-gray-800 @endif mb-1">Tinggi Badan Siswa (cm)</label>
                        <input type="number" name="tinggi_badan" id="tinggi_badan" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('tinggi_badan') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Dalam Bentuk Angka Saja" value="{{ old('tinggi_badan') }}" />
                        @error('tinggi_badan')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('berat_badan',$formulir))
                    <div class="form-group">
                        <label for="berat_badan" class="block text-sm @error('berat_badan') text-red-800 @else text-gray-800 @endif mb-1">Berat Badan Siswa (kg)</label>
                        <input type="number" name="berat_badan" id="berat_badan" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('berat_badan') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Dalam Bentuk Angka Saja" value="{{ old('berat_badan') }}" />
                         @error('berat_badan')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('whatsapp_ortu',$formulir))
                    <div class="form-group">
                        <label for="whatsapp_ortu" class="block text-sm @error('whatsapp_ortu') text-red-800 @else text-gray-800 @endif mb-1">Whatsapp Orang Tua</label>
                        <input type="text" name="whatsapp_ortu" id="whatsapp_ortu" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('whatsapp_ortu') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500 mask-phone" placeholder="Masukkan Dalam Bentuk Angka Saja" value="{{ old('whatsapp_ortu') }}" />
                        @error('whatsapp_ortu')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
            </div>
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>II. Identitas Tempat Tinggal</b></p>
                </div>
                <div class="form-group">
                    <label for="alamat" class="block text-sm @error('alamat') text-red-800 @else text-gray-800 @endif mb-1">Alamat Siswa</label>
                    <textarea name="alamat" id="alamat" class="block w-full min-w-0 grow py-1.5 px-3 text-base  focus:outline-none sm:text-sm/6 rounded-lg @error('alamat') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Alamat Siswa">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                    @enderror
                </div>
                @if(in_array('rt_rw',$formulir))
                    <div class="form-group">
                        <label for="rt_rw" class="block text-sm @error('rt_rw') text-red-800 @else text-gray-800 @endif mb-1">RT / RW</label>
                        <input type="text" name="rt_rw" id="rt_rw" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('rt_rw') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan RT / RW Alamat Siswa" value="{{ old('rt_rw') }}" />
                        @error('rt_rw')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('kelurahan',$formulir))
                    <div class="form-group">
                        <label for="kelurahan" class="block text-sm @error('kelurahan') text-red-800 @else text-gray-800 @endif mb-1">Kelurahan</label>
                        <input type="text" name="kelurahan" id="kelurahan" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('kelurahan') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Kelurahan Alamat Siswa" value="{{ old('kelurahan') }}" />
                        @error('kelurahan')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('kecamatan',$formulir))
                    <div class="form-group">
                        <label for="kecamatan" class="block text-sm @error('kecamatan') text-red-800 @else text-gray-800 @endif mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('kecamatan') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Kecamatan Alamat Siswa" value="{{ old('kecamatan') }}" />
                        @error('kecamatan')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('kabupaten',$formulir))
                    <div class="form-group">
                        <label for="kabupaten" class="block text-sm @error('kabupaten') text-red-800 @else text-gray-800 @endif mb-1">Kabupaten/Kota</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('kabupaten') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Kabupaten/Kota Alamat Siswa" value="{{ old('kabupaten') }}" />
                        @error('kabupaten')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('provinsi',$formulir))
                    <div class="form-group">
                        <label for="provinsi" class="block text-sm @error('provinsi') text-red-800 @else text-gray-800 @endif mb-1">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('provinsi') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Provinsi Alamat Siswa" value="{{ old('provinsi') }}" />
                        @error('provinsi')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('tinggal_dengan',$formulir))
                    <div class="form-group">
                        <label for="tinggal_dengan" class="block text-sm @error('tinggal_dengan') text-red-800 @else text-gray-800 @endif mb-1">Siswa Tinggal dengan</label>
                        <input type="text" name="tinggal_dengan" id="tinggal_dengan" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('tinggal_dengan') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Siswa tinggal dengan siapa" value="{{ old('tinggal_dengan') }}" />
                        @error('tinggal_dengan')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('jarak',$formulir))
                    <div class="form-group">
                        <label for="jarak" class="block text-sm @error('jarak') text-red-800 @else text-gray-800 @endif mb-1">Jarak Rumah ke Sekolah ( km )</label>
                        <input type="text" name="jarak" id="jarak" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('tanggal_lahir') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan dalam bentuk angka saja" value="{{ old('jarak') }}" />
                        @error('jarak')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('transportasi',$formulir))
                    <div class="form-group">
                        <label for="transportasi" class="block text-sm @error('transportasi') text-red-800 @else text-gray-800 @endif mb-1">Alat Transportasi ke sekolah</label>
                        <input type="text" name="transportasi" id="transportasi" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('transportasi') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Menggunakan Apa siswa ke sekolah ?" value="{{ old('transportasi') }}" />
                        @error('transportasi')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
            </div>

            {{-- Data Kependudukan --}}
            @if(count(array_intersect($formulir, ['regis_akte','nik','anak_ke'])) > 0)
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>Identitas Data Kependudukan</b></p>
                </div>
        
                @if(in_array('regis_akte',$formulir))
                    <div class="form-group">
                        <label for="regis_akte" class="block text-sm @error('regis_akte') text-red-800 @else text-gray-800 @endif mb-1">No Registrasi Akta Kelahiran Siswa</label>
                        <input type="text" name="regis_akte" id="regis_akte" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('regis_akte') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan No Registrasi Akta Kelahiran Siswa" value="{{ old('regis_akte') }}" />
                        @error('regis_akte')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('nik',$formulir))
                    <div class="form-group">
                        <label for="nik" class="block text-sm @error('nik') text-red-800 @else text-gray-800 @endif mb-1">No Induk Kependudukan Siswa</label>
                        <input type="text" name="nik" id="nik" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('nik') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Nomor Induk Kependudukan Siswa" value="{{ old('nik'); }}" />
                        @error('nik')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('anak_ke',$formulir))
                    <div class="form-group inline w-full my-2">
                        <label for="anak_ke" class="text-sm @error('anak_ke') text-red-800 @else text-gray-800 @endif mb-1">Anak Ke</label>
                        <input type="number" name="anak_ke" id="anak_ke" class="w-30 sm:w-20 md:w-30 min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('anak_ke') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Anak Ke" value="{{ old('anak_ke') }}"/>
                        <label for="dari_ke" class="text-sm @error('dari_ke') text-red-800 @else text-gray-800 @endif mb-1">Dari</label>
                        <input type="number" name="dari_ke" id="dari_ke" class="w-30 min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('dari_ke') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Dari" value="{{ old('dari_ke') }}" />
                        @error('anak_ke')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom Anak Ke wajib diisi.</p>
                        @enderror
                        @error('dari_ke')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom Dari Ke wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                
            </div>
            @endif

            {{-- Ayah --}}
            @if(count(array_intersect($formulir, ['nama_ayah,','nik_ayah','ttl_ayah','pekerjaan_ayah','pendidikan_ayah','handphone_ayah','penghasilan_ayah'])) > 0)
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>Identitas Data Ayah</b></p>
                </div>
                @if(in_array('nama_ayah',$formulir))
                    <div class="form-group">
                        <label for="nama_ayah" class="block text-sm text-gray-800 mb-1">Nama Ayah</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Nama Ayah" value="{{ old('nama_ayah') }}" />
                    </div>
                @endif
                @if(in_array('nik_ayah',$formulir))
                    <div class="form-group">
                        <label for="nik_ayah" class="block text-sm text-gray-800 mb-1">NIK Ayah</label>
                        <input type="text" name="nik_ayah" id="nik_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan NIK Ayah" value="{{ old('nik_ayah') }}" />
                    </div>
                @endif
                @if(in_array('ttl_ayah',$formulir))
                    <div class="form-group">
                        <label for="tempat_lahir_ayah" class="block text-sm text-gray-800 mb-1">Tempat Lahir Ayah</label>
                        <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Tempat Lahir Ayah" value="{{ old('tempat_lahir_ayah') }}" />
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_ayah" class="block text-sm text-gray-800 mb-1">Tanggal Lahir Ayah</label>
                        <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Tanggal Lahir Ayah" value="{{ old('tanggal_lahir_ayah') }}" />
                    </div>
                @endif
                @if(in_array('pekerjaan_ayah',$formulir))
                    <div class="form-group">
                        <label for="pekerjaan_ayah" class="block text-sm text-gray-800 mb-1">Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}" />
                    </div>
                @endif
                @if(in_array('pendidikan_ayah',$formulir))
                    <div class="form-group">
                        <label for="pendidikan_ayah" class="block text-sm text-gray-800 mb-1">Pendidikan Ayah</label>
                        <select name="pendidikan_ayah" id="pendidikan_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300">
                            <option value="">Pilih salah satu</option>
                            <option value="Tidak Sekolah" @if(old('pendidikan_ayah') == 'Tidak Sekolah') selected @endif>Tidak Sekolah</option>
                            <option value="Putus SD" @if(old('pendidikan_ayah') == 'Putus SD') selected @endif>Putus SD</option>
                            <option value="SD" @if(old('pendidikan_ayah') == 'SD') selected @endif>SD</option>
                            <option value="SMP" @if(old('pendidikan_ayah') == 'SMP') selected @endif>SMP</option>
                            <option value="SMA/SMK" @if(old('pendidikan_ayah') == 'SMA/SMK') selected @endif>SMA/SMK</option>
                            <option value="Strata 1 (S1)" @if(old('pendidikan_ayah') == 'Strata 1 (S1)') selected @endif>Strata 1 (S1)</option>
                            <option value="Strata 2 (S2)" @if(old('pendidikan_ayah') == 'Strata 2 (S2)') selected @endif>Strata 2 (S2)</option>
                            <option value="Strata 3 (S3)" @if(old('pendidikan_ayah') == 'Strata 3 (S3)') selected @endif>Strata 3 (S3)</option>
                        </select>
                    </div>
                @endif
                @if(in_array('handphone_ayah',$formulir))
                    <div class="form-group">
                        <label for="handphone_ayah" class="block text-sm text-gray-800 mb-1">No Handphone Ayah</label>
                        <input type="text" name="handphone_ayah" id="handphone_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 border-neutral-300 focus:border-indigo-500 mask-phone" placeholder="Masukkan Nomor Handphone Ayah" value="{{ old('handphone_ayah') }}" />
                    </div>
                @endif
                @if(in_array('penghasilan_ayah',$formulir))
                    <div class="form-group">
                        <label for="penghasilan_ayah" class="block text-sm text-gray-800 mb-1">Penghasilan Ayah</label>
                        <select name="penghasilan_ayah" id="penghasilan_ayah" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300">
                            <option value="">Pilih salah satu</option>
                            <option value="Kurang dari Rp. 500.000" @if(old('penghasilan_ayah') == 'Kurang dari Rp. 500.000') selected @endif>Kurang dari Rp. 500.000</option>
                            <option value="Rp. 500.000 - Rp. 999.999" @if(old('penghasilan_ayah') == 'Rp. 500.000 - Rp. 999.999') selected @endif>Rp. 500.000 - Rp. 999.999</option>
                            <option value="Rp. 1.000.000 - Rp. 1.999.999" @if(old('penghasilan_ayah') == 'Rp. 1.000.000 - Rp. 1.999.999') selected @endif>Rp. 1.000.000 - Rp. 1.999.999</option>
                            <option value="Rp. 2.000.000 - Rp. 4.999.999" @if(old('penghasilan_ayah') == 'Rp. 2.000.000 - Rp. 4.999.999') selected @endif>Rp. 2.000.000 - Rp. 4.999.999</option>
                            <option value="Rp. 5.000.000 - Rp. 20.000.000" @if(old('penghasilan_ayah') == 'Rp. 5.000.000 - Rp. 20.000.000') selected @endif>Rp. 5.000.000 - Rp. 20.000.000</option>
                            <option value="Tidak Berpenghasilan" @if(old('penghasilan_ayah') == 'Tidak Berpenghasilan') selected @endif>Tidak Berpenghasilan</option>
                        </select>
                    </div>
                @endif
            </div>
            @endif

            {{-- Ibu --}}
            @if(count(array_intersect($formulir, ['nama_ibu,','nik_ibu','ttl_ibu','pekerjaan_ibu','pendidikan_ibu','handphone_ibu','penghasilan_ibu'])) > 0)
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>Identitas Data Ibu</b></p>
                </div>
                @if(in_array('nama_ibu',$formulir))
                    <div class="form-group">
                        <label for="nama_ibu" class="block text-sm text-gray-800 mb-1">Nama Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Nama Ibu" value="{{ old('nama_ibu') }}" />
                    </div>
                @endif
                @if(in_array('nik_ibu',$formulir))
                    <div class="form-group">
                        <label for="nik_ibu" class="block text-sm text-gray-800 mb-1">NIK Ibu</label>
                        <input type="text" name="nik_ibu" id="nik_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan NIK Ibu" value="{{ old('nik_ibu') }}" />
                    </div>
                @endif
                @if(in_array('ttl_ibu',$formulir))
                    <div class="form-group">
                        <label for="tempat_lahir_ibu" class="block text-sm text-gray-800 mb-1">Tempat Lahir Ibu</label>
                        <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Tempat Lahir Ibu" value="{{ old('tempat_lahir_ibu') }}" />
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_ibu" class="block text-sm text-gray-800 mb-1">Tanggal Lahir Ibu</label>
                        <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Tanggal Lahir Ibu" value="{{ old('tanggal_lahir_ibu') }}" />
                    </div>
                @endif
                @if(in_array('pekerjaan_ibu',$formulir))
                    <div class="form-group">
                        <label for="pekerjaan_ibu" class="block text-sm text-gray-800 mb-1">Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Pekerjaan Ibu" value="{{ old('pekerjaan_ibu') }}" />
                    </div>
                @endif
                @if(in_array('pendidikan_ibu',$formulir))
                    <div class="form-group">
                        <label for="pendidikan_ibu" class="block text-sm text-gray-800 mb-1">Pendidikan Ibu</label>
                        <select name="pendidikan_ibu" id="pendidikan_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300">
                            <option value="">Pilih salah satu</option>
                            <option value="Tidak Sekolah" @if(old('pendidikan_ibu') == 'Tidak Sekolah') selected @endif>Tidak Sekolah</option>
                            <option value="Putus SD" @if(old('pendidikan_ibu') == 'Putus SD') selected @endif>Putus SD</option>
                            <option value="SD" @if(old('pendidikan_ibu') == 'SD') selected @endif>SD</option>
                            <option value="SMP" @if(old('pendidikan_ibu') == 'SMP') selected @endif>SMP</option>
                            <option value="SMA/SMK" @if(old('pendidikan_ibu') == 'SMA/SMK') selected @endif>SMA/SMK</option>
                            <option value="Strata 1 (S1)" @if(old('pendidikan_ibu') == 'Strata 1 (S1)') selected @endif>Strata 1 (S1)</option>
                            <option value="Strata 2 (S2)" @if(old('pendidikan_ibu') == 'Strata 2 (S2)') selected @endif>Strata 2 (S2)</option>
                            <option value="Strata 3 (S3)" @if(old('pendidikan_ibu') == 'Strata 3 (S3)') selected @endif>Strata 3 (S3)</option>
                        </select>
                    </div>
                @endif
                @if(in_array('handphone_ibu',$formulir))
                    <div class="form-group">
                        <label for="handphone_ibu" class="block text-sm text-gray-800 mb-1">No Handphone Ibu</label>
                        <input type="text" name="handphone_ibu" id="handphone_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 border-neutral-300 focus:border-indigo-500 mask-phone" placeholder="Masukkan Nomor Handphone Ibu" value="{{ old('handphone_ibu') }}" />
                    </div>
                @endif
                @if(in_array('penghasilan_ibu',$formulir))
                    <div class="form-group">
                        <label for="penghasilan_ibu" class="block text-sm text-gray-800 mb-1">Penghasilan Ibu</label>
                        <select name="penghasilan_ibu" id="penghasilan_ibu" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300">
                            <option value="">Pilih salah satu</option>
                            <option value="Kurang dari Rp. 500.000" @if(old('penghasilan_ibu') == 'Kurang dari Rp. 500.000') selected @endif>Kurang dari Rp. 500.000</option>
                            <option value="Rp. 500.000 - Rp. 999.999" @if(old('penghasilan_ibu') == 'Rp. 500.000 - Rp. 999.999') selected @endif>Rp. 500.000 - Rp. 999.999</option>
                            <option value="Rp. 1.000.000 - Rp. 1.999.999" @if(old('penghasilan_ibu') == 'Rp. 1.000.000 - Rp. 1.999.999') selected @endif>Rp. 1.000.000 - Rp. 1.999.999</option>
                            <option value="Rp. 2.000.000 - Rp. 4.999.999" @if(old('penghasilan_ibu') == 'Rp. 2.000.000 - Rp. 4.999.999') selected @endif>Rp. 2.000.000 - Rp. 4.999.999</option>
                            <option value="Rp. 5.000.000 - Rp. 20.000.000" @if(old('penghasilan_ibu') == 'Rp. 5.000.000 - Rp. 20.000.000') selected @endif>Rp. 5.000.000 - Rp. 20.000.000</option>
                            <option value="Tidak Berpenghasilan" @if(old('penghasilan_ibu') == 'Tidak Berpenghasilan') selected @endif>Tidak Berpenghasilan</option>
                        </select>
                    </div>
                @endif
            </div>
            @endif

            {{-- Wali --}}
            @if(count(array_intersect($formulir, ['nama_wali,','nik_wali','ttl_wali','pekerjaan_wali','pendidikan_wali','handphone_wali','penghasilan_wali'])) > 0)
            
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>Identitas Data Wali</b></p>
                </div>
                @if(in_array('nama_wali',$formulir))
                    <div class="form-group">
                        <label for="nama_wali" class="block text-sm text-gray-800 mb-1">Nama Wali</label>
                        <input type="text" name="nama_wali" id="nama_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Nama Wali" value="{{ old('nama_wali') }}" />
                    </div>
                @endif
                @if(in_array('nik_wali',$formulir))
                    <div class="form-group">
                        <label for="nik_wali" class="block text-sm text-gray-800 mb-1">NIK Wali</label>
                        <input type="text" name="nik_wali" id="nik_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan NIK Wali" value="{{ old('nik_wali') }}" />
                    </div>
                @endif
                @if(in_array('ttl_wali',$formulir))
                    <div class="form-group">
                        <label for="tempat_lahir_wali" class="block text-sm text-gray-800 mb-1">Tempat Lahir Wali</label>
                        <input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Tempat Lahir Wali" value="{{ old('tempat_lahir_wali') }}" />
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_wali" class="block text-sm text-gray-800 mb-1">Tanggal Lahir Wali</label>
                        <input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Tanggal Lahir Wali" value="{{ old('tanggal_lahir_wali') }}" />
                    </div>
                @endif
                @if(in_array('pekerjaan_wali',$formulir))
                    <div class="form-group">
                        <label for="pekerjaan_wali" class="block text-sm text-gray-800 mb-1">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300" placeholder="Masukkan Pekerjaan Wali" value="{{ old('pekerjaan_wali') }}" />
                    </div>
                @endif
                @if(in_array('pendidikan_wali',$formulir))
                    <div class="form-group">
                        <label for="pendidikan_wali" class="block text-sm text-gray-800 mb-1">Pendidikan Wali</label>
                        <select name="pendidikan_wali" id="pendidikan_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300">
                            <option value="">Pilih salah satu</option>
                            <option value="Tidak Sekolah" @if(old('pendidikan_wali') == 'Tidak Sekolah') selected @endif>Tidak Sekolah</option>
                            <option value="Putus SD" @if(old('pendidikan_wali') == 'Putus SD') selected @endif>Putus SD</option>
                            <option value="SD" @if(old('pendidikan_wali') == 'SD') selected @endif>SD</option>
                            <option value="SMP" @if(old('pendidikan_wali') == 'SMP') selected @endif>SMP</option>
                            <option value="SMA/SMK" @if(old('pendidikan_wali') == 'SMA/SMK') selected @endif>SMA/SMK</option>
                            <option value="Strata 1 (S1)" @if(old('pendidikan_wali') == 'Strata 1 (S1)') selected @endif>Strata 1 (S1)</option>
                            <option value="Strata 2 (S2)" @if(old('pendidikan_wali') == 'Strata 2 (S2)') selected @endif>Strata 2 (S2)</option>
                            <option value="Strata 3 (S3)" @if(old('pendidikan_wali') == 'Strata 3 (S3)') selected @endif>Strata 3 (S3)</option>
                        </select>
                    </div>
                @endif
                @if(in_array('handphone_wali',$formulir))
                    <div class="form-group">
                        <label for="handphone_wali" class="block text-sm text-gray-800 mb-1">No Handphone Wali</label>
                        <input type="text" name="handphone_wali" id="handphone_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 border-neutral-300 focus:border-indigo-500 mask-phone" placeholder="Masukkan Nomor Handphone Wali" value="{{ old('handphone_wali') }}" />
                    </div>
                @endif
                @if(in_array('penghasilan_wali',$formulir))
                    <div class="form-group">
                        <label for="penghasilan_wali" class="block text-sm text-gray-800 mb-1">Penghasilan Wali</label>
                        <select name="penghasilan_wali" id="penghasilan_wali" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg outline-0 focus:border-indigo-500 border-neutral-300">
                            <option value="">Pilih salah satu</option>
                            <option value="Kurang dari Rp. 500.000" @if(old('penghasilan_wali') == 'Kurang dari Rp. 500.000') selected @endif>Kurang dari Rp. 500.000</option>
                            <option value="Rp. 500.000 - Rp. 999.999" @if(old('penghasilan_wali') == 'Rp. 500.000 - Rp. 999.999') selected @endif>Rp. 500.000 - Rp. 999.999</option>
                            <option value="Rp. 1.000.000 - Rp. 1.999.999" @if(old('penghasilan_wali') == 'Rp. 1.000.000 - Rp. 1.999.999') selected @endif>Rp. 1.000.000 - Rp. 1.999.999</option>
                            <option value="Rp. 2.000.000 - Rp. 4.999.999" @if(old('penghasilan_wali') == 'Rp. 2.000.000 - Rp. 4.999.999') selected @endif>Rp. 2.000.000 - Rp. 4.999.999</option>
                            <option value="Rp. 5.000.000 - Rp. 20.000.000" @if(old('penghasilan_wali') == 'Rp. 5.000.000 - Rp. 20.000.000') selected @endif>Rp. 5.000.000 - Rp. 20.000.000</option>
                            <option value="Tidak Berpenghasilan" @if(old('penghasilan_wali') == 'Tidak Berpenghasilan') selected @endif>Tidak Berpenghasilan</option>
                        </select>
                    </div>
                @endif
            </div>
            @endif

            {{-- Penerima Kartu KPS/KIP --}}
            @if(count(array_intersect($formulir, ['kps,','kip'])) > 0)
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>Penerima Kartu KPS / KIP</b></p>
                </div>
                @if(in_array('kps',$formulir))
                    <div class="form-group">
                        <label for="kps" class="block text-sm text-gray-800 mb-1">No KPS ( Kartu Perlindungan Sosial )</label>
                        <input type="text" name="kps" id="kps" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg border-neutral-300 outline-0 focus:border-indigo-500" placeholder="Masukkan No KPS Siswa" value="{{old('kps')}}" />
                    </div>
                @endif
                @if(in_array('kip',$formulir))
                    <div class="form-group">
                        <label for="kip" class="block text-sm text-gray-800 mb-1">No KIP ( Kartu Indonesia Pintar )</label>
                        <input type="text" name="kip" id="kip" class="block w-full min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 rounded-lg border-neutral-300 outline-0 focus:border-indigo-500" placeholder="Masukkan No KIP Siswa" value="{{old('kip')}}" />
                    </div>
                @endif
            
            </div>
            @endif

            {{-- Identitas Sekolah --}}
            @if(count(array_intersect($formulir, ['jenis_pendaftaran,','pindah_ke','sekolah_asal'])) > 0)
            <div class="col-span-1 gap-3 grid grid-cols-1 content-start">
                <div class="form-group">
                    <p><b>Identitas Sekolah</b></p>
                </div>
                @if(in_array('jenis_pendaftaran',$formulir))
                    <div class="form-group">
                        <label for="jenis_pendaftaran" class="block text-sm @error('jenis_pendaftaran') text-red-800 @else text-gray-800 @endif mb-1">Jenis Pendaftaran Siswa</label>
                        <select name="jenis_pendaftaran" id="jenis_pendaftaran" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('jenis_pendaftaran') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500">
                            <option value="">Pilih salah satu</option>
                            <option value="Siswa Baru" @if(old('jenis_pendaftaran') == 'Siswa Baru') selected @endif>Siswa Baru</option>
                            <option value="Mutasi" @if(old('jenis_pendaftaran') == 'Mutasi') selected @endif>Siswa Mutasi/Pindahan</option>
                        </select>
                        @error('jenis_pendaftaran')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('pindah_ke',$formulir))
                    <div class="form-group">
                        <label for="pindah_ke" class="block text-sm @error('pindah_ke') text-red-800 @else text-gray-800 @endif mb-1">Pindah Ke Tingkat ( Khusus Pindahan Saja)</label>
                        <input type="text" name="pindah_ke" id="pindah_ke" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('pindah_ke') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Pindah ke tingkat" value="{{old('pindah_ke')}}" />
                        @error('pindah_ke')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
                @if(in_array('sekolah_asal',$formulir))
                    <div class="form-group">
                        <label for="sekolah_asal" class="block text-sm @error('sekolah_asal') text-red-800 @else text-gray-800 @endif mb-1">Sekolah Asal</label>
                        <input type="text" name="sekolah_asal" id="sekolah_asal" class="block w-full min-w-0 grow py-1.5 px-3 text-base focus:outline-none sm:text-sm/6 rounded-lg @error('sekolah_asal') text-red-500 border-red-200 placeholder:text-red-800 @else text-gray-900 placeholder:text-gray-400 border-neutral-300 @enderror outline-0 focus:border-indigo-500" placeholder="Masukkan Ke Sekolah Asal" value="{{old('sekolah_asal')}}" />
                        @error('sekolah_asal')
                            <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Kolom ini wajib diisi.</p>
                        @enderror
                    </div>
                @endif
            </div>
            @endif
        </div>
        <div class="grid grid-cols-1 w-full md:w-[85%] px-10 md:px-0 md:mx-auto gap-5">
            <div class="col-span-1">
                <div class="flex">
                    <div class="flex items-center me-4">
                        <input id="konfirmasi1" type="checkbox" value="konfirmasi1" name="konfirmasi1" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft @error('konfirmasi1') border-red-500 bg-red-100 @enderror" @if(old('konfirmasi1')) checked @endif>
                        <label for="konfirmasi1" class="select-none ms-2 text-sm font-medium text-heading">Dengan ini saya menyatakan saya sudah membaca ketentuan SPMB dan sudah memahami prosedural SPMB online yang diselenggarakan.</label>
                    </div>
                </div>
                @error('konfirmasi1')
                    <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Anda harus menyetujui ketentuan ini untuk melanjutkan.</p>
                @enderror
            </div>
            <div class="col-span-1">
                <div class="flex">
                    <div class="flex items-center me-4">
                        <input id="konfirmasi2" type="checkbox" value="konfirmasi2" name="konfirmasi2" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft @error('konfirmasi2') border-red-500 bg-red-100 @enderror" @if(old('konfirmasi2')) checked @endif>
                        <label for="konfirmasi2" class="select-none ms-2 text-sm font-medium text-heading">Dengan ini telah mengisi formulir penerimaan siswa baru dengan benar dan lengkap dan sesuai dengan data sebenarnya.</label>
                    </div>
                </div>
                @error('konfirmasi2')
                    <p class="mt-1 text-[12px] text-red-700"><span class="font-medium">Perhatian!</span> Anda harus menyetujui ketentuan ini untuk melanjutkan.</p>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 my-10 w-full md:w-[85%] px-10 md:px-0 md:mx-auto gap-5">
            <div class="col-span-1 gap-3">
                <button type="submit" class="bg-blue-300 outline-0 border-0 text-blue-950 rounded-lg px-2 py-2 cursor-pointer">Daftar & Kirim Formulir Ke Sekolah</button>
            </div>
        </div>
    </form>
    @endif
    <script type="module">
        $('.mask-phone').mask('0000-0000-00000');
        $('#rt_rw').mask('000 / 000');
    </script>
@endsection
