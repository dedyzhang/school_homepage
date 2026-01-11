@extends('layouts.main')

@section('container')
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">INTERVIEW SPMB {{$sekolah->kode}}</h1>
        <p class="text-gray-600 italic">Halaman untuk mengatur Interview Siswa SPMB</p>
        <div class="border-b border-b-gray-300 mt-3"></div>
        <div class="mt-10">
            <a class="button-d bg-green-400 hover:bg-green-600 focus:ring-green-400 w-full block sm:inline sm:w-auto mb-1" href="{{ route('spmb.cetak.siswa',$sekolah->uuid) }}">Cetak Daftar Siswa</a>
        </div>
    </div>
    @if(session('success'))
        <div class="p-4 mt-5 bg-white rounded-lg shadow-md">
            <div id="alert-1" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 mt-3" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Sukses!</span> {!! session('success') !!}
                </div>
                
            </div>
        </div>
    @endif
    <div class="p-4 mt-5 bg-white rounded-lg shadow-md">
        @foreach($kuestioner_array as $item)
            @php
                if($jawaban && count($jawaban) > 0) {
                    $jawaban_filter = current(array_filter($jawaban,function($elem) use ($item) {
                        return $elem['id_kuestioner'] == $item['id_kuestioner'];
                    }));
                } else {
                    $jawaban_filter = null;
                }
            @endphp
            @switch($item['jenis'])
                @case('teks')
                    <div class="mb-2 mt-2" data-id="{{ $item['id_kuestioner'] }}">
                        <p class="soal_kuestioner">{{$item['kuestioner']}}</p>
                        <div class="mt-1">
                            <input type="text" name="jawaban_{{ $item['id_kuestioner'] }}" id="jawaban_{{ $item['id_kuestioner'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ isset($jawaban_filter) && $jawaban_filter != null ? $jawaban_filter['jawaban'] : '' }}">
                        </div>
                    </div>
                    @break
                @case('longteks')
                    <div class="mb-2 mt-2" data-id="{{ $item['id_kuestioner'] }}">
                        <p class="soal_kuestioner">{{$item['kuestioner']}}</p>
                        <div class="mt-1">
                            <textarea type="text" name="jawaban_{{ $item['id_kuestioner'] }}" id="jawaban_{{ $item['id_kuestioner'] }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ isset($jawaban_filter) && $jawaban_filter != null ? $jawaban_filter['jawaban'] : '' }}
                            </textarea>
                        </div>
                    </div>
                    @break
                @case('option')
                    <div class="mb-2 mt-2" data-id="{{ $item['id_kuestioner'] }}">
                        <p class="soal_kuestioner">{{$item['kuestioner']}}</p>
                        <div class="mt-1 block">
                            @foreach($item['opsi'] as $elem)
                                <div class="block items-center me-4 mb-2 w-full">
                                    <input id="opsi_{{$item['id_kuestioner']."_".$loop->iteration}}" type="radio" value="{{$elem}}" name="opsi_{{$item['id_kuestioner']}}" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none" {{ isset($jawaban_filter) && $jawaban_filter != null && $jawaban_filter['jawaban'] == $elem ? 'checked' : '' }}>
                                    <label for="opsi_{{$item['id_kuestioner']."_".$loop->iteration}}" class="select-none ms-2 text-sm font-medium text-heading">{{$elem}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @break
                @case('checkbox')
                    @php
                        if(isset($jawaban_filter) && $jawaban_filter != null) {
                            $jawaban_checkbox = $jawaban_filter['jawaban'];
                        } else {
                            $jawaban_checkbox = [];
                        }
                    @endphp
                    <div class="mb-2 mt-2" data-id="{{ $item['id_kuestioner'] }}">
                        <p class="soal_kuestioner">{{$item['kuestioner']}}</p>
                        <div class="mt-1 block">
                            @foreach($item['opsi'] as $elem)
                                <div class="block items-center me-4 mb-2 w-full">
                                    <input id="opsi_{{$item['id_kuestioner']."_".$loop->iteration}}" type="checkbox" value="{{$elem}}" name="opsi_{{$item['id_kuestioner']}}" class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none" {{ isset($jawaban_checkbox) && in_array($elem,$jawaban_checkbox) ? 'checked' : '' }}>
                                    <label for="opsi_{{$item['id_kuestioner']."_".$loop->iteration}}" class="select-none ms-2 text-sm font-medium text-heading">{{$elem}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @break
                @default      
            @endswitch
        @endforeach
        <div class="mt-4 mb-1">
            <button class="button-d bg-blue-600 hover:bg-blue-800 focus:ring-blue-400 w-full block sm:inline sm:w-auto mb-1 text-white cursor-pointer" id="simpan_interview" data-sekolah="{{ $sekolah->uuid }}" data-siswa="{{ $siswa->uuid }}">Simpan Jawaban Interview</button>
        </div>
    </div>
    <script type="module">
        $('#simpan_interview').on('click', function() {
            let siswa_uuid = $(this).data('siswa');
            let sekolah_uuid = $(this).data('sekolah');
            var jawabanArray = [];
            let error = 0;
            $('[data-id]').each(function() {
                let id_kuestioner = $(this).data('id');
                let jawaban = null;

                if ($(this).find('input[type="text"]').length) {
                    jawaban = $(this).find('input[type="text"]').val();
                } else if ($(this).find('textarea').length) {
                    jawaban = $(this).find('textarea').val();
                } else if ($(this).find('input[type="radio"]').length) {
                    jawaban = $(this).find('input[type="radio"]:checked').val() || null;
                } else if ($(this).find('input[type="checkbox"]').length) {
                    jawaban = [];
                    $(this).find('input[type="checkbox"]:checked').each(function() {
                        jawaban.push($(this).val());
                    });
                }

                if(jawaban == "" || jawaban == null || (Array.isArray(jawaban) && jawaban.length === 0)) {
                    error++;
                } else {
                    jawabanArray.push({
                        id_kuestioner: id_kuestioner,
                        jawaban: jawaban
                    });
                }
            });

            if(error > 0) {
                oAlert('red','Peringatan','Semua pertanyaan harus diisi!');
                return false;
            }
            loading();
            console.log(jawabanArray);

            var url =  "{{ route('spmb.interview.update',':id') }}";
            url = url.replace(':id',siswa_uuid);
            $.ajax({
                type: "POST",
                url : url,
                data : {
                    jawabanArray: jawabanArray
                },
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success : function(data) {
                    if(data.success == true) {
                        removeLoading();
                        var url2 = "{{ route('spmb.interview.show',':id2') }}";
                        url2 = url2.replace(':id2',sekolah_uuid);
                        console.log(url2);
                        cAlert('green','Sukses',data.message,false,url2);
                    }
                },
                error: function(error) {
                    console.log(error.responseText.message);
                }
            });
        });
    </script>
@endsection