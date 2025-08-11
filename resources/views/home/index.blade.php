@extends('layouts.mainhome')

@section('container')
    {{-- Body Part of Website  --}}
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="slick-slider h-screen lg:h-[calc(100vh+100px)] w-screen">
            <div class="relative w-screen h-screen lg:h-[calc(100vh+100px)] bg-black/50">
                <div class="text-place absolute top-30 sm:top-50 left-0 sm:left-20 z-10">
                    <h1 class="text-4xl/16 text-center sm:text-5xl/16 sm:text-left text-white font-bold">SEKOLAH</h1>
                    <h1 class="text-4xl/16 text-center sm:text-5xl/16 sm:text-left text-white font-bold">MAITREYAWIRA TANJUNGPINANG</h1>
                    <p class="text-[16px] sm:text-[20px] text-center sm:text-left text-white px-10 sm:px-0">Menginspirasi, Mendidik, dan Membangun Generasi Unggul</p>

                </div>
                <img class="w-screen h-screen lg:h-[calc(100vh+100px)] object-cover brightness-75" src="{{ Vite::asset('resources/images/slider/home-slideshow1.jpg') }}"/>
            </div>
            <div class="relative w-screen h-screen lg:h-[calc(100vh+100px)] bg-black/50">
                <div class="text-place absolute top-50 sm:top-50 left-0 sm:left-20 z-10">
                    <h1 class="text-4xl/16 text-center sm:text-5xl/16 sm:text-left text-white font-bold px-5 sm:px-0">LEARN WITH US</h1>
                    <p class="text-[16px] sm:text-[20px] text-center sm:text-left text-white sm:w-[70%] px-10 sm:px-0">Temukan potensi terbaikmu. Belajar,tumbuh,dan raih impian bersama kami</p>

                </div>
                <img class="w-screen h-screen lg:h-[calc(100vh+100px)] object-cover brightness-75" src="{{ Vite::asset('resources/images/slider/home-slideshow2.jpg') }}"/>
            </div>
            <div class="relative w-screen h-screen lg:h-[calc(100vh+100px)] bg-black/50">
                <div class="text-place absolute top-50 sm:top-50 left-0 sm:left-20 z-10">
                    <h1 class="text-4xl/16 text-center sm:text-5xl/16 sm:text-left text-white font-bold px-5 sm:px-0">Menumbuhkan Karakter, Menggapai Prestasi</h1>
                    <p class="text-[16px] sm:text-[20px] text-center sm:text-left text-white sm:w-[70%] px-10 sm:px-0">Mengutamakan pembentukan karakter sebagai fondasi untuk meraih keberhasilan akademik maupun non-akademik.</p>

                </div>
                <img class="w-screen h-screen lg:h-[calc(100vh+100px)] object-cover brightness-75" src="{{ Vite::asset('resources/images/slider/home-slideshow3.jpeg') }}"/>
            </div>
            <div class="relative w-screen h-screen lg:h-[calc(100vh+100px)] bg-black/50">
                <div class="text-place absolute top-50 sm:top-50 left-0 sm:left-20 z-10">
                    <h1 class="text-4xl/16 text-center sm:text-5xl/16 sm:text-left text-white font-bold px-5 sm:px-0">Belajar dengan Hati, Berkarya untuk Negeri</h1>
                    <p class="text-[16px] sm:text-[20px] text-center sm:text-left text-white sm:w-[70%] px-10 sm:px-0">Menghadirkan pendidikan yang tulus dan inspiratif demi melahirkan generasi yang siap berkontribusi bagi bangsa.</p>

                </div>
                <img class="w-screen h-screen lg:h-[calc(100vh+100px)] object-cover brightness-75" src="{{ Vite::asset('resources/images/slider/home-slideshow4.jpg') }}"/>
            </div>
            <div class="relative w-screen h-screen lg:h-[calc(100vh+100px)] bg-black/50">
                <div class="text-place absolute top-50 sm:top-50 left-0 sm:left-20 z-10">
                    <h1 class="text-4xl/16 text-center sm:text-5xl/16 sm:text-left text-white font-bold px-5 sm:px-0">Mengasah Potensi, Menggapai Mimpi</h1>
                    <p class="text-[16px] sm:text-[20px] text-center sm:text-left text-white sm:w-[70%] px-10 sm:px-0">Memberikan ruang dan dukungan bagi setiap siswa untuk berkembang sesuai minat dan bakatnya.</p>

                </div>
                <img class="w-screen h-screen lg:h-[calc(100vh+100px)] object-cover brightness-75" src="{{ Vite::asset('resources/images/slider/home-slideshow5.jpg') }}"/>
            </div>
        </div>
    </div>
    <div class="relative lg:rounded-full p-5 bg-white lg:max-w-[70%] mx-auto lg:-top-15 lg:shadow-xl">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="icon-place flex justify-center items-center gap-3 header-icon flex-wrap md:flex-nowrap py-2 md:py-0">
                <img class="size-40 md:size-30 reveal" src="{{ Vite::asset('resources/images/Icon/header-icon1.png') }}" />
                <div class="text-place w-full md:w-fit">
                    <p class="text-xl md:text-2xl font-semibold text-blue-950 text-center md:text-left">Daftar</p>
                    <p class="text-l md:text-xl font-semibold text-blue-950  text-center md:text-left">Sekolah Kami</p>
                </div>
            </div>
            <div class="icon-place flex justify-center items-center gap-3 header-icon flex-wrap md:flex-nowrap py-2 md:py-0">
                <img class="size-40 md:size-30 reveal-250" src="{{ Vite::asset('resources/images/Icon/header-icon2.png') }}" />
                <div class="text-place w-full md:w-fit">
                    <p class="text-xl md:text-2xl font-semibold text-blue-950 text-center md:text-left">Ngajar</p>
                    <p class="text-l md:text-xl font-semibold text-blue-950  text-center md:text-left">Bersama Kami</p>
                </div>
            </div>
            <div class="icon-place flex justify-center items-center gap-3 header-icon flex-wrap md:flex-nowrap py-2 md:py-0">
                <img class="size-40 md:size-30 reveal-500" src="{{ Vite::asset('resources/images/Icon/header-icon3.png') }}" />
                <div class="text-place w-full md:w-fit">
                    <p class="text-xl md:text-2xl font-semibold text-blue-950 text-center md:text-left">Keliling</p>
                    <p class="text-l md:text-xl font-semibold text-blue-950  text-center md:text-left">Sekolah Kami</p>
                </div>
            </div>
        </div>

    </div>
    {{-- Alasan Sekolah Disini --}}
    <div class="flex justify-center items-center section-1">
        <div class="my-25 px-2 reveal-750">
            <h1 class="font-bold text-2xl md:text-4xl text-center text-blue-950">KENAPA SEKOLAH DI SINI ??</h1>
            <p class="text-justify md:text-center py-5 w-[90%] md:w-[70%] mx-auto text-sm md:text-lg leading-8 text-blue-950"><b class="font-extrabold">Sekolah Maitreyawira Tanjungpinang</b> adalah pilihan tepat bagi orang tua yang ingin pendidikan terbaik untuk anaknya. Dengan lingkungan belajar yang aman, nyaman, dan penuh kasih, kami mengembangkan karakter, kecerdasan, dan keterampilan siswa secara seimbang. Didukung oleh tenaga pendidik profesional serta pendekatan pembelajaran yang aktif dan berwawasan global, Sekolah Maitreyawira membentuk generasi yang cerdas, berakhlak mulia, dan siap menghadapi masa depan.</p>
        </div>
    </div>
    {{-- Sekolah Kita --}}
    <div class="flex justify-center items-center section-2">
        <div class="my-20 px-2">
            <h1 class="font-bold text-2xl md:text-3xl text-center text-gray-800 reveal">SEKOLAH KAMI</h1>
            <p class="my-10 w-[80%] mx-auto text-center text-sm md:text-lg reveal">Berikut adalah sekolah-sekolah yang berada di bawah naungan Sekolah Maitreyawira, yang bersama-sama mengusung visi dan misi pendidikan humanis serta berbasis nilai-nilai cinta kasih universal untuk membentuk generasi yang cerdas, berkarakter, dan peduli sesama.</p>
            <div class="my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 md:gap-10 w-full lg:w-[80%] lg:mx-auto px-0 lg">
                <div class="mx-auto reveal-250">
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','kbtk') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>KB/TK Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','sd') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SD Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','smp') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SMP Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>

                </div>
                <div class="mx-auto reveal-500">
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-blue-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-blue-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','sma') }}" class="text-place px-6 text-sm border-0 bg-none text-blue-700 text-left group-hover:underline group-hover:font-bold">
                            <p>SMA Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-blue-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-blue-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','smk') }}" class="text-place px-6 text-sm border-0 bg-none text-blue-700 text-left group-hover:underline group-hover:font-bold">
                            <p>SMK Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                </div>
                <div class="mx-auto reveal-750">
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','kbtkbc') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>KB/TK Maitreyawira</p>
                            <p>Bintan Center</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','sdbc') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SD Maitreyawira</p>
                            <p>Bintan Center</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.profile','smpbc') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SMP Maitreyawira</p>
                            <p>Bintan Center</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Motto Sekolah --}}
    <div class="flex justify-center items-center section-3">
        <div class="my-20 px-2 w-[80%]">
            <h1 class="font-bold text-2xl md:text-3xl text-center text-blue-950 reveal">MOTTO SEKOLAH </h1>
            <div class="my-10 grid grid-cols-1 md:grid-cols-3 gap-2 w-full">
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-250">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-yellow.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">emoji_emotions</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-xl font-black text-blue-950">Bright Hearts</p>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-500">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-blue.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:50px">emoji_objects</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-xl font-black text-blue-950">Bright Mind</p>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap my-5 md:my-0 reveal-750">
                    <div class="logo-place relative w-30 hover:animate-[jello_1s]">
                        <img class="w-full" src="{{ Vite::asset('resources/images/Icon/liquid-red.svg') }}" />
                        <i class="material-icons-outlined absolute top-[50%] left-[50%] -translate-[50%] text-white" style="font-size:60px">emoji_events</i>
                    </div>
                    <div class="text-place mt-3 w-full text-center">
                        <p class="text-xl font-black text-blue-950">Bright Future</p>
                    </div>
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
                                <div class="badge-place mt-3"><span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-blue-700/10 ring-inset">{{ $item->sekolah->kode }}</span></div>
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
        $(".slick-slider").slick({
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
        });
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
