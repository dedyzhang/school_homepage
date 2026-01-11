@inject('carbon', 'Carbon\Carbon')
<table>
    <tr>
        <td bgcolor="#AAC4F5" width="5" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">No</td>
        <td bgcolor="#AAC4F5" width="10" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Id Website</td>
        <td bgcolor="#AAC4F5" width="15" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">NIS</td> 
        <td bgcolor="#AAC4F5" width="7" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Gelombang</td> 
        @foreach ($formulir as $item)
            @if (isset($nama_formulir[$item]))
                <td bgcolor="{{ $nama_formulir[$item]['warna'] }}" width="{{ $nama_formulir[$item]['width'] }}" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">{{ $nama_formulir[$item]['nilai'] }}</td>
            @else
                @switch($item)
                    @case('ttl')
                        <td bgcolor="#AAC4F5" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tempat Lahir</td>
                        <td bgcolor="#AAC4F5" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tanggal Lahir</td>
                        @break
                    @case('anak_ke')
                        <td bgcolor="#FEEAC9" width="7" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Anak Ke</td>
                        <td bgcolor="#FEEAC9" width="7" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Dari Ke</td>
                        @break
                    @case('ttl_ayah')
                        <td bgcolor="#badc58" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tempat Lahir Ayah</td>
                        <td bgcolor="#badc58" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tanggal Lahir Ayah</td>
                        @break
                    @case('ttl_ibu')
                        <td bgcolor="#badc58" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tempat Lahir Ibu</td>
                        <td bgcolor="#badc58" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tanggal Lahir Ibu</td>
                        @break
                    @case('ttl_wali')
                        <td bgcolor="#badc58" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tempat Lahir Wali</td>
                        <td bgcolor="#badc58" width="20" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tanggal Lahir Wali</td>
                        @break
                    @default
                        <td>{{ $item }}</td>
                @endswitch                
            @endif
        @endforeach
        <td bgcolor="#badc58" width="30" style="word-wrap: break-word; border:1px solid #000; vertical-align:middle; text-align:center">Tanggal Daftar</td>
    </tr>
    @foreach ($siswa as $siswaI)
        <tr>
            <td style="text-align:center; font-size:10px; border:1px solid #000; text-align:center">{{$loop->iteration}}</td>
            <td style="font-size:10px; border:1px solid #000; text-align:center">{{$siswaI->uuid}}</td>
            <td style="font-size:10px; border:1px solid #000; text-align:center">{{$siswaI->nis}}</td>
            <td style="font-size:10px; border:1px solid #000; text-align:center">{{$siswaI->gelombang}}</td>
            @php
                $fSiswa = unserialize($siswaI->biodata);
            @endphp
            @foreach ($formulir as $item)
                @if(array_key_exists($item, $fSiswa))
                    @if($item != 'anak_ke')
                        <td style="font-size: 10px; border:1px solid #000; {{ in_array($item,$center) ? 'text-align:center' : '' }}">{{$fSiswa[$item]}}</td>
                    @else
                        <td style="font-size: 10px; border:1px solid #000; text-align:center">{{isset($fSiswa['anak_ke']) ? $fSiswa['anak_ke'] : ''}}</td>
                        <td style="font-size: 10px; border:1px solid #000; text-align:center">{{isset($fSiswa['dari_ke']) ? $fSiswa['dari_ke'] : ''}}</td>
                    @endif
                @else
                    @switch($item)
                        @case('ttl')
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tempat_lahir']) ? $fSiswa['tempat_lahir'] : ''}}</td>
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tanggal_lahir']) ? $carbon::parse(strtotime($fSiswa['tanggal_lahir']))->format('d F Y') : ''}}</td>
                            @break
                        @case('anak_ke')
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['anak_ke']) ? $fSiswa['anak_ke'] : ''}}</td>
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['dari_ke']) ? $fSiswa['dari_ke'] : ''}}</td>
                            @break
                        @case('ttl_ayah')
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tempat_lahir_ayah']) ? $fSiswa['tempat_lahir_ayah'] : ''}}</td>
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tanggal_lahir_ayah']) ? $carbon::parse(strtotime($fSiswa['tanggal_lahir_ayah']))->format('d F Y') : ''}}</td>
                            @break
                        @case('ttl_ibu')
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tempat_lahir_ibu']) ? $fSiswa['tempat_lahir_ibu'] : ''}}</td>
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tanggal_lahir_ibu']) ? $carbon::parse(strtotime($fSiswa['tanggal_lahir_ibu']))->format('d F Y') : ''}}</td>
                            @break
                        @case('ttl_wali')
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tempat_lahir_wali']) ? $fSiswa['tempat_lahir_wali'] : ''}}</td>
                            <td style="font-size: 10px; border:1px solid #000">{{isset($fSiswa['tanggal_lahir_wali']) ? $carbon::parse(strtotime($fSiswa['tanggal_lahir_wali']))->format('d F Y') : ''}}</td>
                            @break
                        @default
                            <td style="font-size: 10px; border:1px solid #000"></td>
                    @endswitch  
                @endif
            @endforeach
            <td style="font-size: 10px; border:1px solid #000">{{$carbon::parse($siswaI->created_at)->format('d M Y H:i:s')}}</td>
        </tr>
    @endforeach
</table>