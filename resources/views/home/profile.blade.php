@extends('layouts.mainhome')

@section('container')
    @php
        if($sekolah !== null) {
            if($sekolah->profile != null && $sekolah->profile->jumlah_siswa != null) {
                $jumlah_siswa = unserialize($sekolah->profile->jumlah_siswa);
                $jumlah_siswa_perempuan = $jumlah_siswa['p'];
                $jumlah_siswa_laki = $jumlah_siswa['l'];
                $total_siswa = $jumlah_siswa_perempuan + $jumlah_siswa_laki;
            } else {
                $total_siswa = 0;
            }
            if($sekolah->profile != null && $sekolah->profile->jumlah_guru != null) {
                $jumlah_guru = unserialize($sekolah->profile->jumlah_guru);
                $jumlah_guru_perempuan = $jumlah_guru['p'];
                $jumlah_guru_laki = $jumlah_guru['l'];
                $total_guru = $jumlah_guru_perempuan + $jumlah_guru_laki;
            } else {
                $total_guru = 0;
            }
            if($sekolah->profile != null && $sekolah->profile->jumlah_guru_sertifikasi != null) {
                $sertifikasi = $sekolah->profile->jumlah_guru_sertifikasi;
            } else {
                $sertifikasi = 0;
            }
            if($sekolah->profile != null && $sekolah->profile->pendik_akhir_guru != null) {
                $pendik_akhir_guru = unserialize($sekolah->profile->pendik_akhir_guru);
                $pendik_akhir_smp = $pendik_akhir_guru['smp'];
                $pendik_akhir_sma = $pendik_akhir_guru['sma'];
                $pendik_akhir_s1 = $pendik_akhir_guru['s1'];
                $pendik_akhir_s2 = $pendik_akhir_guru['s2'];
                $total_pendik = $pendik_akhir_smp + $pendik_akhir_sma + $pendik_akhir_s1 + $pendik_akhir_s2;
            }
            if($sekolah->profile != null && $sekolah->profile->prestasi_akademik != null) {
                $prestasi_akademik = unserialize($sekolah->profile->prestasi_akademik);
                $prestasi_akademik_kota = $prestasi_akademik['kota'];
                $prestasi_akademik_provinsi = $prestasi_akademik['provinsi'];
                $prestasi_akademik_nasional = $prestasi_akademik['nasional'];
                $total_akademik = $prestasi_akademik_kota + $prestasi_akademik_provinsi + $prestasi_akademik_nasional;
            } else {
                $total_akademik = 0;
                $prestasi_akademik_kota = 0;
                $prestasi_akademik_provinsi = 0;
                $prestasi_akademik_nasional = 0;
            }
            if($sekolah->profile != null && $sekolah->profile->prestasi_non_akademik != null) {
                $prestasi_non_akademik = unserialize($sekolah->profile->prestasi_non_akademik);
                $prestasi_non_akademik_kota = $prestasi_non_akademik['kota'];
                $prestasi_non_akademik_provinsi = $prestasi_non_akademik['provinsi'];
                $prestasi_non_akademik_nasional = $prestasi_non_akademik['nasional'];
                $total_non_akademik = $prestasi_non_akademik_kota + $prestasi_non_akademik_provinsi + $prestasi_non_akademik_nasional;
            } else {
                $total_non_akademik = 0;
                $prestasi_non_akademik_kota = 0;
                $prestasi_non_akademik_provinsi = 0;
                $prestasi_non_akademik_nasional = 0;
            }
        }
        $kode = $sekolah->kode;
        if($kode == 'KBTK' || $kode == 'KBTKBC') {
            $warnabg = 'bg-green-300/50';
        } else if($kode == 'SD' || $kode == 'SDBC') {
            $warnabg = 'bg-red-300/50';
        } elseif($kode == 'SMP' || $kode == 'SMPBC') {
            $warnabg = 'bg-blue-300/50';
        } elseif($kode == 'SMA' || $kode == 'SMK') {
            $warnabg = 'bg-gray-300/50';
        }
        if($kode == 'KBTK') {
            $linkheader = Vite::asset('resources/images/profile/kbtk.jpeg');
        } else if($kode == 'KBTKBC') {
            $linkheader = Vite::asset('resources/images/profile/kbtkbc.jpg');
        } else if($kode == 'SD') {
            $linkheader = Vite::asset('resources/images/profile/sd.jpg');
        } else if($kode == 'SDBC') {
            $linkheader = Vite::asset('resources/images/profile/sdbc.jpeg');
        } else if($kode == 'SMP') {
            $linkheader = Vite::asset('resources/images/profile/smp.jpg');
        } else if($kode == 'SMPBC') {
            $linkheader = Vite::asset('resources/images/profile/smpbc.jpg');
        } else if($kode == 'SMA') {
            $linkheader = Vite::asset('resources/images/profile/sma.jpeg');
        } else if($kode == 'SMK') {
            $linkheader = Vite::asset('resources/images/profile/smk.jpg');
        };
    @endphp
    {{-- Headers Awal --}}
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="h-screen w-screen">
            <div class="relative w-screen h-screen bg-black/50">
                <img class="w-screen h-screen object-cover brightness-75" src="{{ $linkheader }}"/>
                <div class="absolute w-screen h-screen md:h-auto bottom-0 {{ $warnabg }} text-white pt-10 pb-10 md:ps-20">
                    <div class="flex md:inline-flex md:items-center h-full flex-wrap">
                        <img src="{{ Vite::asset('resources/images/logo_hitam_putih.svg') }}" class="w-[130px] invert block ms-auto me-auto">
                        <div class="text-place md:ms-10 text-center md:text-left">
                            <p class="text-lg md:text-2xl font-bold">Sekolah Maitreyawira Tanjungpinang</p>
                            <h1 class="text-5xl/15 font-bold">{{$sekolah->nama}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Isi Dalam --}}
    <div class="flex justify-center items-center section-1">
        <div class="my-25 px-2 reveal-250 w-full md:w-[75%]">
            <h1 class="font-extrabold text-2xl/relaxed md:text-4xl/relaxed text-center text-blue-950">SELAMAT DATANG DI {{Str::upper($sekolah->nama)}}</h1>
            <div class="text-lg/loose text-gray-800 text-center">{!! $sekolah->profile->deskripsi ?? '' !!}</div>
        </div>
    </div>
    <div class="flex justify-center items-center bg-gray-200">
        <div class="my-25 px-5 reveal-250 grid grid-cols-1 md:grid-cols-3 w-full md:w-[80%] items-center gap-2">
            <div class="kata-sambutan col-span-1 md:col-span-2 order-2 md:order-1 text-justify">
                <p class="text-2xl/8 font-bold mb-5">Kata Sambutan Kepala Sekolah</p>
                <div class="text-base/loose">
                    {!! $sekolah->profile->kata_sambutan_kepsek ?? '' !!}
                </div>
            </div>
            <div class="kepala-sekolah col-span-1 order-1 md:order-2">
                @if ($sekolah != null && $sekolah->profile != null && $sekolah->profile->gambar_kepsek != null)
                    <img src="{{ asset('storage/kepsek/'.$sekolah->profile->gambar_kepsek) }}" class="w-fit" />
                @endif
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center section-1">
        <div class="my-25 px-2 reveal-250 w-full md:w-[75%]">
            <p class="text-xl md:text-2xl text-center text-blue-950 mb-5">Visi Sekolah</p>
            <h1 class="text-2xl/relaxed md:text-4xl/relaxed text-center text-gray-800">{!! $sekolah->profile->visi_sekolah ?? '' !!}</h1>
        </div>
    </div>
    <div class="flex justify-center items-center bg-blue-50">
        <div class="my-25 px-10 md:px-2 reveal-250 w-full md:w-[75%]">
            <p class="text-xl md:text-2xl text-center text-blue-950 mb-5">Misi Sekolah</p>
            <div class="text-base/relaxed md:text-lg/relaxed text-justify text-gray-800 has-bulleting">{!! $sekolah->profile->misi_sekolah ?? '' !!}</div>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="my-20 px-2 w-[80%]">
            <h1 class="font-bold text-2xl md:text-3xl text-center text-blue-950 reveal">SEKOLAH KITA </h1>
            <div class="my-10 grid grid-cols-1 md:grid-cols-3 gap-2 w-full">
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-250">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-yellow.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">school</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-lg text-blue-950">Jumlah Murid</p>
                        <p class="text-2xl font-black text-blue-950">{{$total_siswa ?? 0}}</p>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-500">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-blue.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">person_4</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-lg text-blue-950">Jumlah Guru</p>
                        <p class="text-2xl font-black text-blue-950">{{ $total_guru ?? 0 }}</p>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-750">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-red.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">emoji_events</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-lg text-blue-950">Total Prestasi</p>
                        <p class="text-2xl font-black text-blue-950">{{ $total_akademik ?? 0 + $total_non_akademik ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center section-2">
        <div class="my-20 px-10 w-full md:w-[90%]">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-2 items-center">
                <div class="col-span-1 md:col-span-6 mb-10"><p class="text-xl md:text-3xl font-bold text-center">PROFIL SEKOLAH</p></div>
                <div class="profile-place col-span-1 md:col-span-4">
                    <div class="grid grid-cols-6">
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Nama Sekolah</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->nama ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">NSS Sekolah</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->nss ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">NPSN Sekolah</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->npsn ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">SK Izin Operasional</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->sk_izin_operasional ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Tanggal Izin Operasional</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ date('d F Y',strtotime($sekolah->profile->tanggal_izin_operasional ?? '')) ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Akreditasi</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->akreditasi ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Nama Kepala Sekolah</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->nama_kepsek ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-6"><p class="text-base font-black mb-2 ">Alamat Sekolah</p></div>

                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Alamat Jalan</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->alamat_jalan ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Kelurahan / Desa</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->alamat_kelurahan ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Kecamatan</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->alamat_kecamatan ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Kota</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->alamat_kota ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Provinsi</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->alamat_provinsi ?? '' }}</p></div>
                        <div class="col-span-6 md:col-span-2"><p class="text-base md:text-left italic">Kode Pos</p></div>
                        <div class="col-span-6 md:col-span-4 mb-3"><p class="text-base md:text-left">: {{ $sekolah->profile->alamat_kode_pos ?? '' }}</p></div>
                    </div>
                </div>
                <div class="image-place col-span-1 md:col-span-2">
                    <div class="w-[300px] h-[340px] bg-gray-400 p-5 rounded-lg md:-rotate-10">
                        @if ($sekolah != null && $sekolah->profile != null && $sekolah->profile->gambar_sekolah != null)
                            <img src="{{ asset('storage/sekolah/'.$sekolah->profile->gambar_sekolah) }}" class="w-[300px] h-full object-cover rounded-lg">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center">
        {!! $sekolah->profile->maps ?? '' !!}
    </div>
    <div class="flex justify-center items-center">
        <div class="my-20 px-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="col-span-1">
                    <p class="text-lg font-bold text-center mb-10">Jumlah Guru Berdasarkan Persentase Jenis Kelamin</p>
                    <div id="chart-guru"></div>
                </div>
                <div class="col-span-1">
                    <p class="text-lg font-bold text-center mb-10">Jumlah Guru Berdasarkan Persentase Guru BerSertifikasi</p>
                    <div id="chart-sertifikasi"></div>
                </div>
                <div class="col-span-1">
                    <p class="text-lg font-bold text-center mb-10">Jumlah Guru Berdasarkan Persentase Pendidikan Terakhir</p>
                    <div id="chart-pendik"></div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-8 gap-5 mt-10">
                <div class="col-span-6 md:col-start-3 md:col-span-4">
                    <p class="text-lg font-bold text-center mb-10">Jumlah Prestasi Akademi Berdasarkan Tingkatan</p>
                    <div id="chart-akademik"></div>
                </div>
            </div>
        </div>
    </div>
     {{-- Berita Kami --}}
    <div class="flex justify-center items-center section-4 mt-20">
        <div class="w-full px-2 my-10">
            <h1 class="font-bold text-2xl md:text-3xl text-center text-blue-950 reveal">BERITA SEKOLAH</h1>
            <div class="py-2 w-[80%] mx-auto news-container">
                @foreach ($berita as $item)
                    @php
                        $isiBerita = strip_tags($item->isi);
                        $isiBerita = Str::limit($isiBerita,200,'...');
                    @endphp
                    <div class="slide-item w-[33%] p-5">
                        <div class="news-card w-full bg-white shadow-xl rounded-xl">
                            <div class="w-full h-[200px] image-place">
                                <img class="w-full h-full object-cover rounded-t-xl" src="{{ asset('storage/berita/'.$item->gambar) }}">
                            </div>
                            <div class="w-full article-place py-10 px-5 max-h-[300px]">
                                <h4 class="text-blue-950 text-lg/6 font-black">{{Str::limit($item->judul,50,'...')}}</h4>
                                <div class="text-blue-950 text-sm/6 mt-5 text-justify">{!! $isiBerita !!}</div>
                            </div>
                            <div class="w-full border-t-amber-300 border-t-1 px-5 py-3 flex justify-between items-center">
                                <p class="text-amber-800 text-sm/6 font-bold">{{ date('d F Y',strtotime($item->tanggal)) }}</p>
                                <a href="{{ route('home.berita.show',$item->uuid) }}" class="bg-amber-300 rounded-xl text-sm/6 py-1 px-2 hover:bg-amber-500 transition-all duration-100 cursor-pointer">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script type="module">
        var options = {
            chart: {
                width: '100%',
                type: 'pie'
            },
            series: [{{ $jumlah_guru_laki ?? '' }},{{ $jumlah_guru_perempuan ?? '' }}],
            labels: ['Laki-laki','Perempuan'],
            colors: ['#9EC6F3','#DA6C6C']
        }
        var options2 = {
            chart: {
                width: '100%',
                type: 'pie'
            },
            series: [{{$sertifikasi}},{{ $total_guru - $sertifikasi }}],
            labels: ['Sudah','Belum'],
            colors: ['#B0DB9C','#DA6C6C']
        }
        var options3 = {
            chart: {
                width: '100%',
                type: 'pie'
            },
            series: [{{ $pendik_akhir_smp ?? '' }},{{ $pendik_akhir_sma ?? '' }},{{ $pendik_akhir_s1 ?? '' }},{{ $pendik_akhir_s2 ?? '' }}],
            labels: ['SMP','SMA/K','Sarjana','Master'],
            colors: ['#DA6C6C','#FADA7A','#9EC6F3','#B0DB9C']
        }
        var options4 = {
            chart : {
                type: 'bar'
            },
            series: [{
                name: 'Akademik',
                data: [{{ $prestasi_akademik_kota.",".$prestasi_akademik_provinsi.",".$prestasi_akademik_nasional }}]
            },{
                name: 'Non Akademik',
                data: [{{ $prestasi_non_akademik_kota.",".$prestasi_non_akademik_provinsi.",".$prestasi_non_akademik_nasional }}]
            }
            ],
            colors: ['#FADA7A','#9EC6F3','#B0DB9C'],
            xaxis: {
                categories: ['Kota','Provinsi','Nasional']
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart-guru"), options);
        var chart2 = new ApexCharts(document.querySelector("#chart-sertifikasi"), options2);
        var chart3 = new ApexCharts(document.querySelector("#chart-pendik"), options3).render();
        var chart4 = new ApexCharts(document.querySelector("#chart-akademik"), options4).render();

        chart.render();
        chart2.render();

        $(".news-container").slick({
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        arrows:true
                    }
                },
                {
                    breakpoint: 763,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        arrows:true
                    }
                }
            ]
        })
    </script>
@endsection
