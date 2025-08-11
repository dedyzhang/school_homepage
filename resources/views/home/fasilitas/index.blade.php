@extends('layouts.mainhome')

@section('container')
    <div id="first-div" class="flex items-center justify-between p-0 m-0 top-0 left-0 w-auto overflow-x-hidden header-besar">
        <div class="w-screen">
            <div class="relative h-[400] w-screen bg-black/50">
                <img class="w-screen h-[400] object-cover brightness-75" src="{{ Vite::asset('resources/images/header/fasilitas.jpg') }}"/>
                <div class="absolute w-screen h-full top-0 text-white pt-10 pb-10 md:ps-20">
                    <div class="flex sm:inline-flex items-center justify-center sm:items-center h-full flex-wrap">
                        <div class="text-place sm:ms-10 text-center sm:text-left">
                            <p class="text-4xl md:text-4xl font-bold">Fasilitas</p>
                            <h1 class="text-lg/10 md:text-2xl/15 font-bold">Fasilitas Sekolah Maitreyawira Tanjungpinang</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="my-25 px-5 w-full md:w-[90%]">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="reveal col-span-1 sm:col-span-3">
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-center">GEDUNG SEKOLAH MAITREYAWIRA</p>
                    <p class="text-base/8 text-center mt-10">
                        Sekolah Maitreyawira Tanjungpinang memiliki tiga bangunan megah yang dirancang khusus untuk mendukung proses pendidikan dari berbagai jenjang. Setiap gedung dialokasikan secara terpisah untuk tingkat pendidikan yang berbeda, mulai dari Playgroup dan Taman Kanak-Kanak (PGTK), Sekolah Dasar (SD), Sekolah Menengah Pertama (SMP), Sekolah Menegah Kejuruan (SMK) hingga Sekolah Menengah Atas (SMA) . Pembagian ruang yang terencana ini memungkinkan setiap jenjang mendapatkan lingkungan belajar yang aman, nyaman, dan sesuai dengan kebutuhan perkembangan peserta didik. Dengan fasilitas modern dan suasana yang mendukung pembelajaran holistik, ketiga gedung ini menjadi fondasi kuat dalam mewujudkan visi sekolah untuk membentuk manusia sejati, bajik, dan indah melalui pendidikan yang bermakna dan bernilai.
                    </p>
                </div>
                <div class="col-span-1 reveal-250">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas3.2.jpg') }}" class="w-full h-[300] object-cover rounded-lg" />
                    <p class="mt-5 flex items-center"><span class="material-icons-round text-red-400 me-3">pin_drop</span> Jl. Ir. Sutami No.38, Tj. Pinang Timur, Kec. Bukit Bestari, Kota Tanjung Pinang, Kepulauan Riau 29122</p>
                </div>
                <div class="col-span-1 reveal-500">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas3.1.jpg') }}" class="w-full h-[300] object-cover rounded-lg" />
                    <p class="mt-5 flex items-center"><span class="material-icons-round text-red-400 me-3">pin_drop</span> Jl. Terimal Sei Carang Jl. Bintan Center, Air Raja, Kec. Tanjungpinang Tim., Kota Tanjung Pinang, Kepulauan Riau 29125</p>
                </div>
                <div class="col-span-1 reveal-750">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas3.jpg') }}" class="w-full h-[300] object-cover rounded-lg" />
                    <p class="mt-5 flex items-center"><span class="material-icons-round text-red-400 me-3">pin_drop</span> Perm Jalan Akasia No.66, Jl. Ir. Sutami, Tanjung Pinang Timur, Bukit Bestari, Tanjung Pinang City, Riau Islands 29122</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center bg-blue-50">
        <div class="md:5 reveal w-full">
            <div class="grid grid-cols-1 sm:grid-cols-6 sm:gap-5">
                <div class="col-span-1 sm:col-span-4 text-gray-800 px-5 sm:px-30 py-20">
                    <p class="text-xl md:text-2xl text-center text-blue-950 mb-5 font-black">Ruang Kelas Nyaman dan Mendukung Pembelajaran Aktif</p>
                    <p class="text-base/8 text-justify text-gray-900">Setiap ruang kelas di Sekolah Maitreyawira Tanjungpinang dirancang untuk menciptakan suasana belajar yang nyaman, aman, dan inspiratif bagi seluruh jenjang pendidikan. Seluruh ruang kelas telah dilengkapi dengan fasilitas penunjang seperti AC untuk menjaga kenyamanan suhu ruangan, pojok baca yang mendorong minat literasi sejak dini, serta perlengkapan pembelajaran modern lainnya. Penataan ruang yang rapi dan fungsional memberikan suasana kondusif bagi proses pembelajaran aktif dan menyenangkan. Kami percaya, lingkungan belajar yang baik akan turut membentuk karakter, kreativitas, dan semangat belajar siswa.</p>
                </div>
                <div class="col-span-1 col-span-2">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas4.jpeg') }}" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="md:px-2 reveal-250 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-6 sm:gap-5">
                <div class="col-span-1 col-span-2 order-2 sm:order-1">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas2.jpg') }}" class="w-full h-full object-cover">
                </div>
                <div class="col-span-1 sm:col-span-4 text-gray-800 px-5 sm:px-30 py-20 order-1 sm:order-2">
                    <p class="text-xl md:text-2xl text-center text-blue-950 mb-5 font-black">Lapangan Luas untuk Kegiatan Outdoor yang Aktif dan Sehat</p>
                    <p class="text-base/8 text-justify text-gray-900">Sekolah Maitreyawira Tanjungpinang menyediakan lapangan yang luas dan representatif sebagai sarana utama untuk menunjang berbagai aktivitas luar ruang. Lapangan ini digunakan untuk pelajaran olahraga, kegiatan ekstrakurikuler, hingga berbagai acara sekolah yang melibatkan partisipasi siswa secara aktif. Dengan ruang terbuka yang memadai, siswa memiliki kesempatan untuk bergerak bebas, berolahraga, serta mengembangkan keterampilan fisik dan sosial mereka dalam suasana yang sehat dan menyenangkan. Fasilitas ini menjadi bagian penting dalam mendukung pendidikan yang seimbang antara akademik dan non-akademik.</p>
                </div>
            </div>

        </div>
    </div>
     <div class="flex justify-center items-center bg-yellow-50">
        <div class="md:px-2 reveal-750 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-6 sm:gap-5">
                <div class="col-span-1 sm:col-span-4 text-gray-800 px-5 sm:px-30 py-20">
                    <p class="text-xl md:text-2xl text-center text-blue-950 mb-5 font-black">Pembelajaran Interaktif dengan Infokus di Setiap Kelas</p>
                    <p class="text-base/8 text-justify text-gray-900">Sebagai upaya menghadirkan pembelajaran yang lebih interaktif dan menarik, setiap ruang kelas di Sekolah Maitreyawira Tanjungpinang, Seperti tingkatan SD, SMP dan SMK, telah dilengkapi dengan perangkat infokus (proyektor). Fasilitas ini memungkinkan guru menyampaikan materi pembelajaran secara visual dan multimedia, sehingga siswa lebih mudah memahami dan terlibat dalam proses belajar. Penggunaan infokus juga mendukung penerapan metode pembelajaran modern yang kreatif dan inovatif, sejalan dengan komitmen sekolah dalam menyediakan lingkungan belajar yang adaptif terhadap perkembangan teknologi pendidikan.</p>
                </div>
                <div class="col-span-1 col-span-2">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas1.jpg') }}" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="md:px-2 reveal-250 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-6 sm:gap-5">
                <div class="col-span-1 col-span-2 order-2 sm:order-1">
                    <img src="{{ Vite::asset('resources/images/school/fasilitas3.jpeg') }}" class="w-full h-full object-cover">
                </div>
                <div class="col-span-1 sm:col-span-4 text-gray-800 px-5 sm:px-30 py-20 order-1 sm:order-2">
                    <p class="text-xl md:text-2xl text-center text-blue-950 mb-5 font-black">Fasilitas Lengkap untuk Mendukung Tumbuh Kembang Siswa</p>
                    <p class="text-base/8 text-justify text-gray-900">Sekolah Maitreyawira Tanjungpinang tidak hanya menyediakan ruang kelas yang nyaman, tetapi juga dilengkapi dengan berbagai fasilitas pendukung lainnya untuk menunjang proses belajar dan perkembangan siswa secara menyeluruh. Tersedia laboratorium sebagai ruang eksplorasi sains dan teknologi, perpustakaan yang nyaman untuk menumbuhkan minat baca, serta kantin yang bersih dan sehat untuk memenuhi kebutuhan gizi harian siswa. Selain itu, tersedia juga area bermain yang aman dan menyenangkan, khususnya bagi siswa jenjang TK dan SD, sebagai bagian penting dari pembelajaran melalui aktivitas fisik dan sosial. Semua fasilitas ini dirancang untuk menciptakan lingkungan sekolah yang menyenangkan, edukatif, dan holistik.</p>
                </div>
            </div>

        </div>
    </div>

@endsection
