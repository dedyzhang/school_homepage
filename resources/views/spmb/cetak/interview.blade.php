<table>
    <tr>
        <td bgcolor="#AAC4F5" width="5" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">No</td>
        <td bgcolor="#AAC4F5" width="10" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Id Website</td>
        <td bgcolor="#AAC4F5" width="15" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">NIS</td> 
        <td bgcolor="#AAC4F5" width="7" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Gelombang</td>
        <td bgcolor="#AAC4F5" width="30" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Nama Siswa</td>
        @foreach($list_interview_kuestioner as $kuestioner)
            @switch($kuestioner['jenis'])
                @case('option')
                    <td bgcolor="#FEEAC9" width="50" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ $kuestioner['kuestioner'] }}</td>
                    @break
                @case('teks')
                    <td bgcolor="#CBDCEB" width="50" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ $kuestioner['kuestioner'] }}</td>
                    @break
                @case('longteks')
                    <td bgcolor="#C5D89D" width="50" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ $kuestioner['kuestioner'] }}</td>
                    @break
                @case('checkbox')
                    <td bgcolor="#FDACAC" width="50" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ $kuestioner['kuestioner'] }}</td>
                    @break
                @default 
            @endswitch
        @endforeach
    </tr>
    @foreach ($siswa as $elem)
    @php
        $biodata = unserialize($elem->biodata);
        if(isset($elem->interview) && $elem->interview != null) {
            $interview_data = unserialize($elem->interview);
        } else {
            $interview_data = array();
        }
    @endphp
    <tr>   
        <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{$loop->iteration}}</td>
        <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{$elem->uuid}}</td>
        <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{$elem->nis}}</td>
        <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{$elem->gelombang}}</td>
        <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{$biodata['nama']}}</td>
        @foreach ($list_interview_kuestioner as $kues)
            @php
                if($interview_data && count($interview_data) > 0) {
                    $jawaban_filter = current(array_filter($interview_data,function($jawaban) use ($kues) {
                        return $jawaban['id_kuestioner'] == $kues['id_kuestioner'];
                    }));
                } else {
                    $jawaban_filter = null;
                }
            @endphp
            @switch($kues['jenis'])
                @case('teks')
                    <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ isset($jawaban_filter) && $jawaban_filter != null ? $jawaban_filter['jawaban'] : '' }}</td>
                    @break
                @case('longteks')
                    <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ isset($jawaban_filter) && $jawaban_filter != null ? $jawaban_filter['jawaban'] : '' }}</td>
                    @break
                @case('option')
                    <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ isset($jawaban_filter) && $jawaban_filter != null ? $jawaban_filter['jawaban'] : '' }}</td>
                    @break
                @case('checkbox')
                    <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">
                        @if(isset($jawaban_filter) && $jawaban_filter != null)
                            @foreach($jawaban_filter['jawaban'] as $cb)
                                {{ $cb }}@if(!$loop->last), @endif
                            @endforeach
                        @endif
                    </td>
                    @break
                @default
                    <td style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center"></td>
            @endswitch
        @endforeach
    </tr>
    @endforeach
</table>