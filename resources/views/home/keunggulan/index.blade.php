@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[400] w-screen bg-black/50">
                <img class="w-screen h-[400] object-cover brightness-75" src="{{ Vite::asset('resources/images/header/keunggulan.jpeg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-4xl font-bold">Keunggulan</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Keunggulan Sekolah Maitreyawira Tanjungpinang</h1>
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
                    <p class="text-xl md:text-2xl font-black text-center">Keunggulan Akademik dan Kurikulum</p>
                    <p class="text-base/8 mt-5 text-justify">
                        Sekolah Maitreyawira Tanjungpinang mengedepankan kualitas akademik melalui penerapan kurikulum nasional yang dikembangkan secara holistik dan kontekstual. Didukung oleh tenaga pendidik yang kompeten dan fasilitas pembelajaran modern seperti infokus di kelas, proses belajar mengajar menjadi lebih interaktif dan bermakna. Selain itu, sekolah juga menerapkan kurikulum tambahan seperti Bahasa Mandarin sebagai bagian dari penguatan kemampuan bahasa asing dan wawasan multikultural siswa. Kami mengintegrasikan pembelajaran berbasis nilai, karakter, dan teknologi digital untuk membentuk peserta didik yang cakap, berkarakter, dan siap menghadapi tantangan masa depan.
                    </p>
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan1.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan2.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan3.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan4.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center bg-blue-50 reveal-250">
        <div class="md:5 reveal w-full">
            <div class="grid grid-cols-1 sm:grid-cols-6 sm:gap-5">
                <div class="col-span-1 sm:col-span-4 text-gray-800 px-5 sm:px-30 py-20">
                    <p class="text-xl md:text-2xl text-center text-blue-950 mb-5 font-black">Pembelajaran Berbasis Learning Management System (LMS)</p>
                    <p class="text-base/8 text-justify text-gray-900">Beberapa Tingkat di Sekolah Maitreyawira Tanjungpinang menerapkan sistem pembelajaran digital melalui platform Learning Management System (LMS) yang memudahkan interaksi antara guru dan siswa di dalam maupun di luar kelas. Dengan LMS, proses pembelajaran menjadi lebih terstruktur, fleksibel, dan terdokumentasi, serta memungkinkan siswa mengakses materi, tugas, dan evaluasi secara mandiri kapan saja. Inovasi ini mendukung terciptanya pembelajaran yang efektif, modern, dan adaptif terhadap perkembangan teknologi.</p>
                </div>
                <div class="col-span-1 col-span-2">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan6.jpg') }}" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
    <div class="flex items-center justify-center reveal-500">
        <div class="my-25 px-5 w-full md:w-[90%]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-5">
                <div class="col-span-1 md:col-span-4">
                    <p class="text-xl md:text-2xl font-black text-center">Kegiatan Observasi ke Instansi Pembelajaran Nyata</p>
                    <p class="text-base/8 mt-5 text-justify">
                        Sekolah Maitreyawira Tanjungpinang secara berkala melaksanakan kegiatan observasi ke berbagai instansi pembelajaran nyata seperti museum, pusat budaya, institusi pemerintahan, dan tempat bersejarah. Melalui kegiatan ini, siswa memperoleh pengalaman langsung yang memperkaya pemahaman mereka terhadap materi pelajaran sekaligus menumbuhkan rasa ingin tahu, kepedulian sosial, dan kemampuan berpikir kritis. Pembelajaran di luar kelas ini menjadi bagian penting dalam membentuk siswa yang aktif, berwawasan luas, dan siap menghadapi dunia nyata.
                    </p>
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan7.jpg') }}" class="w-full h-[300px] object-cover object-[25%_50%] border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan8.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan9.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan10.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center reveal-750 bg-red-50">
        <div class="my-25 px-5 w-full md:w-[90%]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-5">
                <div class="col-span-1 md:col-span-4">
                    <p class="text-xl md:text-2xl font-black text-center">Tenaga Pendidik yang Kompeten dan Profesional</p>
                    <p class="text-base/8 mt-5 text-justify">
                        Sekolah Maitreyawira Tanjungpinang didukung oleh tenaga pendidik yang kompeten dan profesional di bidangnya masing-masing. Para guru tidak hanya memiliki latar belakang pendidikan yang sesuai, tetapi juga terus mengembangkan diri melalui pelatihan, sertifikasi, dan penguasaan metode pembelajaran terkini. Dengan dedikasi dan keahlian yang dimiliki, para guru mampu menciptakan suasana belajar yang inspiratif, membimbing siswa meraih prestasi optimal, serta membentuk karakter yang bajik dan unggul.
                    </p>
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan5.jpg') }}" class="w-full h-[300px] object-cover object-[60%_50%] border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan11.jpg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan12.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
                <div class="col-span-1">
                    <img src="{{ Vite::asset('resources/images/school/keunggulan13.jpeg') }}" class="w-full h-[300px] object-cover border-10 border-gray-200 rounded-lg">
                </div>
            </div>
        </div>
    </div>
@endsection
