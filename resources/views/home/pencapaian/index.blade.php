@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[400] w-screen bg-black/50">
                <img class="w-screen h-[400] object-cover brightness-75" src="{{ Vite::asset('resources/images/header/pencapaian.jpeg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-4xl font-bold">Pencapaian</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Pencapaian Sekolah Maitreyawira Tanjungpinang</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center reveal">
        <div class="my-25 px-5 w-full md:w-[90%]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-5">
                <div class="col-span-1 md:col-span-4">
                    <p class="text-xl md:text-2xl font-black text-center">Prestasi Akademik yang Konsisten</p>
                    <p class="text-base/8 mt-5 text-justify">
                        Sekolah Maitreyawira Tanjungpinang telah membuktikan komitmennya dalam mencetak siswa berprestasi melalui capaian akademik yang membanggakan. Setiap tahunnya, siswa berhasil meraih peringkat tinggi dalam ujian sekolah maupun ujian nasional, serta memenangkan berbagai lomba akademik di tingkat kota, provinsi, bahkan nasional. Keberhasilan ini mencerminkan kualitas pengajaran yang solid dan strategi pembelajaran yang efektif.
                    </p>
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian1.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian2.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian7.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian3.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center reveal-500">
        <div class="my-25 px-5 w-full md:w-[90%]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-5">
                <div class="col-span-1 md:col-span-4">
                    <p class="text-xl md:text-2xl font-black text-center">Keberhasilan di Bidang Non-Akademik</p>
                    <p class="text-base/8 mt-5 text-justify">
                        Tidak hanya unggul di bidang akademik, Sekolah Maitreyawira Tanjungpinang juga berprestasi di berbagai ajang non-akademik. Siswa-siswinya kerap menorehkan kemenangan dalam kompetisi seni, olahraga, dan keterampilan seperti lomba pidato, lomba musik, turnamen olahraga, hingga festival kreativitas. Pencapaian ini membuktikan bahwa sekolah memberikan perhatian seimbang antara kecerdasan intelektual dan pengembangan bakat.
                    </p>
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian4.jpg') }}" class="w-full h-[300px] object-cover object-[25%_50%] border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian5.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian6.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/pencapaian8.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
            </div>
        </div>
    </div>

@endsection
