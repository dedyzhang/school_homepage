@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur data SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        @if($user->access == 'admin' || $user->access == 'superadmin')
            <div class="mt-10 col-span-1">
                <a class="button-d bg-blue-300 hover:bg-blue-400 focus:ring-blue-200" href="">Cetak Formulir</a>
            </div>
        @endif
    </div>
    <div class="p-4 mt-5 bg-white rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-y-10">
            <div class="col-span-1 md:col-span-2 flex justify-center items-center">
                @php
                    if($spmb_siswa->dokumen != "") {
                        $dokumen = unserialize($spmb_siswa->dokumen);
                        $find = current(array_filter($dokumen,function($item) {
                            return $item['nama_berkas'] == "Foto Siswa";
                        }));
                        if(isset($find)) {
                            $gambar = asset('Storage/'.$find['lokasi_berkas']);
                        } else {
                            $gambar = Vite::asset('resources/images/no_image.jpg');
                        }
                    } else {
                        $gambar = Vite::asset('resources/images/no_image.jpg');
                    }
                @endphp
                <div class="w-[80%] h-full">
                    <img class="rounded-lg w-full h-full object-cover" src="{{ $gambar }}" />
                </div>
            </div>
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-base mb-3"><b>Identitas Pribadi</b></h1>
                <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                    <div class="formulir-key md:w-[50%] lg:w-[40%]">ID SPMB</div>
                    <div class="formulir-value">: {{$spmb_siswa->nis}}</div>
                </div>
                @php
                    $array_allowed = array(
                        'nama' => 'Nama',
                        'jk' => 'Jenis Kelamin',
                        'nisn' => 'NISN',
                        'tempat_lahir' => 'Tempat Lahir',
                        'tanggal_lahir' => 'Tanggal_lahir',
                        'agama' => 'Agama',
                        'no_handphone' => 'No Handphone',
                        'no_whatsapp' => 'No Whatsapp',
                        'no_telepon' => 'No Telepon',
                        'whatsapp_ortu' => 'No Whatsapp Ortu',
                        'email' => 'Email',
                        'tinggi_badan' => 'Tinggi Badan (cm)',
                        'berat_badan' => 'Berat Badan (kg)');
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    @php
                        if($key == 'jk') {
                            if($value == 'l') {
                                $value = "Laki-laki";
                            } else {
                                $value = "Perempuan";
                            }
                        } else if($key == 'tanggal_lahir') {
                            $value = date('d F Y', strtotime($value));
                        }
                    @endphp  
                    <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                        <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                        <div class="formulir-value">: {{$value}}</div>
                    </div>
                @endforeach
            </div>
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-base mb-3"><b>Data Tempat Tinggal</b></h1>
                @php
                    $array_allowed = array(
                        'alamat' => 'Alamat Lengkap',
                        'rt_rw' => 'RT / RW',
                        'kelurahan' => 'Kelurahan',
                        'kecamatan' => 'Kecamatan',
                        'kota' => 'Kota',
                        'provinsi' => 'Provinsi',
                        'tinggal_dengan' => 'Tinggal Dengan',
                        'jarak' => 'Jarak ke Sekolah',
                        'transportasi' => 'Transportasi'
                        );
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    @if($key == 'alamat')
                        <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                            <div class="formulir-key">{{$array_allowed[$key]}}: </div>
                        </div>
                        <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                            <div class="formulir-value">{{$value}}</div>
                        </div>
                    @else
                        <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                            <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                            <div class="formulir-value">: {{$value}}</div>
                        </div>
                    @endif
                @endforeach
                <h1 class="text-base mb-3 mt-3"><b>Data Kependudukan</b></h1>
                @php
                    $array_allowed = array(
                        'regis_akte' => 'No Registrasi Akta Kelahiran',
                        'NIK' => 'Nomor Induk Kependudukan (NIK)',
                        'anak_ke' => 'Anak Ke-',
                        'dari_ke' => 'Dari Ke-',
                    );
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                        <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                        <div class="formulir-value">: {{$value}}</div>
                    </div>
                @endforeach
            </div>
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-base mb-3"><b>Identitas Ayah</b></h1>
                @php
                    $array_allowed = array(
                        'nama_ayah' => 'Nama',
                        'nik_ayah' => 'NIK',
                        'tempat_lahir_ayah' => 'Tempat Lahir',
                        'tanggal_lahir_ayah' => 'Tanggal lahir',
                        'pekerjaan_ayah' => 'Pekerjaan',
                        'pendidikan_ayah' => 'Pendidikan Terakhir',
                        'handphone_ayah' => 'No Handphone',
                        'penghasilan_ayah' => 'Penghasilan',
                    );
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    @php
                        if($key == 'tanggal_lahir_ayah') {
                            $value = date('d F Y', strtotime($value));
                        }
                    @endphp
                    <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                        <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                        <div class="formulir-value">: {{$value}}</div>
                    </div>
                @endforeach
            </div>
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-base mb-3"><b>Identitas Ibu</b></h1>
                @php
                    $array_allowed = array(
                        'nama_ibu' => 'Nama',
                        'nik_ibu' => 'NIK',
                        'tempat_lahir_ibu' => 'Tempat Lahir',
                        'tanggal_lahir_ibu' => 'Tanggal lahir',
                        'pekerjaan_ibu' => 'Pekerjaan',
                        'pendidikan_ibu' => 'Pendidikan Terakhir',
                        'handphone_ibu' => 'No Handphone',
                        'penghasilan_ibu' => 'Penghasilan',
                    );
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    @php
                        if($key == 'tanggal_lahir_ibu') {
                            $value = date('d F Y', strtotime($value));
                        }
                    @endphp
                    <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                        <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                        <div class="formulir-value">: {{$value}}</div>
                    </div>
                @endforeach
            </div>
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-base mb-3"><b>Identitas Wali</b></h1>
                @php
                    $array_allowed = array(
                        'nama_wali' => 'Nama',
                        'nik_wali' => 'NIK',
                        'tempat_lahir_wali' => 'Tempat Lahir',
                        'tanggal_lahir_wali' => 'Tanggal lahir',
                        'pekerjaan_wali' => 'Pekerjaan',
                        'pendidikan_wali' => 'Pendidikan Terakhir',
                        'handphone_wali' => 'No Handphone',
                        'penghasilan_wali' => 'Penghasilan',
                    );
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    @php
                        if($key == 'tanggal_lahir_wali') {
                            $value = date('d F Y', strtotime($value));
                        }
                    @endphp
                    <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                        <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                        <div class="formulir-value">: {{$value}}</div>
                    </div>
                @endforeach
            </div>
            @php
                $array_allowed = array(
                    'kps' => 'Kartu Perlindungan Sosial (KPS)',
                    'kip' => 'Kartu Indonesia Pintar (KIP)',
                );
                $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                
            @endphp
            @if (count($array_identitas_pribadi) > 0)
                <div class="col-span-1 md:col-span-2">
                    <h1 class="text-base mb-3"><b>Data KPS/KIP</b></h1>
                    @php
                        $array_allowed = array(
                            'kps' => 'Kartu Perlindungan Sosial (KPS)',
                            'kip' => 'Kartu Indonesia Pintar (KIP)',
                        );
                        $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                        
                    @endphp
                    @foreach ($array_identitas_pribadi as $key => $value)
                        <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                            <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                            <div class="formulir-value">: {{$value}}</div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-base mb-3"><b>Identitas Sekolah</b></h1>
                @php
                    $array_allowed = array(
                        'jenis_pendaftaran' => 'Jenis Pendaftaran',
                        'pindah_ke' => 'Pindah Ke',
                        'sekolah_asal' => 'Sekolah Asal'
                    );
                    $array_identitas_pribadi = array_intersect_key($biodata,$array_allowed);
                    
                @endphp
                @foreach ($array_identitas_pribadi as $key => $value)
                    <div class="formulir-group w-full block md:inline-flex md:items-start lg:items-center mb-2">
                        <div class="formulir-key md:w-[50%] lg:w-[40%]">{{$array_allowed[$key]}}</div>
                        <div class="formulir-value">: {{$value}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection