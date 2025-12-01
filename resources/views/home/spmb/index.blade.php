@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[500] w-screen bg-black/50">
                <img class="w-screen h-[500] background-horizontalscroll object-cover brightness-75" src="{{ Vite::asset('resources/images/header/spmb.svg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-8xl font-bold">SPMB</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Sistem Penerimaan Siswa Baru</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center section-1 relative flex-wrap">
        <div class="my-25 px-2 reveal-250 w-full md:w-[75%]">
            <p class="text-xl md:text-2xl text-center text-blue-950 mb-5">Sistem Penerimaan Siswa Baru</p>
            <h1 class="text-2xl/relaxed md:text-4xl/relaxed text-center text-gray-800 italic">
                Sistem Penerimaan Siswa Baru Sekolah Maitreyawira didasarkan pada visi dan misi sekolah untuk menciptakan lingkungan belajar yang harmonis bagi semua siswa.
            </h1>
            <h3 class="text-base/relaxed md:text-2xl/relaxed text-center text-gray-700 mt-5 sm:mt-15">
            Ayo Daftar & Bergabung Bersama Kami</h3>
        </div>
        <div class="w-full relative md:absolute flex justify-between bottom-0 left-0 px-5 md:px-0">
            <img src="{{ Vite::asset('resources/images/spmb/cowok_smp.png') }}" class="w-[100px] sm:w-[200px] reveal" />
            <img src="{{ Vite::asset('resources/images/spmb/cewek_tk.png') }}" class="absolute bottom-0 left-20 md:relative md:-ms-[80%] w-[100px] sm:w-[200px] reveal-500" />
            <img src="{{ Vite::asset('resources/images/spmb/cowok_tk_binsen.png') }}" class="absolute bottom-0 right-25 md:relative md:-me-[80%] w-[100px] sm:w-[200px] reveal-750" />
            <img src="{{ Vite::asset('resources/images/spmb/cewek_smp_binsen.png') }}" class="w-[100px] sm:w-[200px] reveal-250" />
        </div>
    </div>
    <div class="flex justify-center items-center bg-blue-50">
        <div class="reveal-250 w-full pt-10 pb-10">
            <h4 class="text-3xl text-center font-black pt-4">Foto Sekolah Kita</h4>
            <p class="text-center pb-10">Mari bergabung bersama kami dan dapatkan pengalaman belajar yang luar biasa bersama guru-guru kami yang berdedikasi, profesional, dan penuh inspirasi.</p>
            <div class="w-full overflow-hidden">
                <div class="photobanner slider">
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/fasilitas3.jpeg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/keunggulan7.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/keunggulan8.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/keunggulan11.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/keunggulan9.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/pencapaian6.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/keunggulan2.jpeg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/keunggulan1.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/images/school/fasilitas1.jpg') }}" class="w-[400px] h-50 object-cover">
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
    <div class="flex justify-center items-center section-3">
        <div class="mt-20 px-2 w-[80%]">
            <h1 class="font-bold text-2xl md:text-3xl text-center text-blue-950 reveal">INFO SPMB MASING-MASING SEKOLAH</h1>
            <p class="text-center text-gray-950 mt-4 reveal-250">Silahkan Klik Salah Satu dari Sekolah Ini untuk mengetahui Info Pendaftaran</p>
            <div class="my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 md:gap-10 w-full lg:w-[80%] lg:mx-auto px-0 lg">
                <div class="mx-auto reveal-250">
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.spmb.sekolah','kbtk') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>KB/TK Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.spmb.sekolah','sd') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SD Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.spmb.sekolah','smp') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
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
                        <a href="{{ route('home.spmb.sekolah','sma') }}" class="text-place px-6 text-sm border-0 bg-none text-blue-700 text-left group-hover:underline group-hover:font-bold">
                            <p>SMA Maitreyawira</p>
                            <p>Tanjungpinang</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-blue-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-blue-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.spmb.sekolah','smk') }}" class="text-place px-6 text-sm border-0 bg-none text-blue-700 text-left group-hover:underline group-hover:font-bold">
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
                        <a href="{{ route('home.spmb.sekolah','kbtkbc') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>KB/TK Maitreyawira</p>
                            <p>Bintan Center</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.spmb.sekolah','sdbc') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SD Maitreyawira</p>
                            <p>Bintan Center</p>
                        </a>
                    </div>
                    <div class="school-item bg-white flex items-center rounded-lg shadow-md border-amber-500 border-0 hover:border hover:shadow-xl hover:-translate-y-1 transition-all duration-200 ease-out cursor-pointer box-border w-[300px] my-7 group">
                        <div class="item-logo bg-amber-200 p-3 rounded-l-lg">
                            <img class="size-13" src="{{ Vite::asset('resources/images/logo.png') }}" />
                        </div>
                        <a href="{{ route('home.spmb.sekolah','smpbc') }}" class="text-place px-6 text-sm border-0 bg-none text-amber-800 text-left group-hover:underline group-hover:font-bold">
                            <p>SMP Maitreyawira</p>
                            <p>Bintan Center</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="h-[200px] w-full">
            <img class="w-screen h-[300px] long-horizontal object-cover" src="{{ Vite::asset('resources/images/spmb/all_spmb_student.svg') }}"/>
        </div>
    </div>
    <script type="module">
        $('.slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    </script>
@endsection
