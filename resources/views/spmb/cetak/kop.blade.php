@php
    if (!isset($kop) || empty($kop)) {
        $kop = \App\Helpers\SpmbHelper::getKopSurat($sekolah->uuid, $sekolah);
    }
@endphp

<div class="kop-surat mb-4 pb-3" style="border-bottom: 3px double #000;">
    <table style="width: 100%; border-collapse: collapse; border: none; margin: 0; padding: 0;">
        <tr>
            {{-- Logo Kiri --}}
            <td style="width: 15%; vertical-align: middle; text-align: center; border: none; padding: 0 8px 0 0;">
                @if(!empty($kop['logo_kiri']) && file_exists(public_path('storage/' . $kop['logo_kiri'])))
                    <img src="{{ asset('storage/' . $kop['logo_kiri']) }}" alt="Logo Kiri" style="max-height: 80px; max-width: 90px; object-fit: contain; display: inline-block;">
                @endif
            </td>

            {{-- Teks Tengah Kop Surat --}}
            <td style="width: 70%; vertical-align: middle; text-align: center; border: none; padding: 0 4px;">
                @if(!empty($kop['nama_yayasan']))
                    <p style="margin: 0; font-size: 11pt; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px; color: #111; line-height: 1.2;">
                        {{ $kop['nama_yayasan'] }}
                    </p>
                @endif
                
                <h1 style="margin: 2px 0 0 0; font-size: 15pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: #000; line-height: 1.2;">
                    {{ $kop['nama_sekolah'] ?? $sekolah->nama }}
                </h1>

                <p style="margin: 3px 0 0 0; font-size: 8.5pt; color: #333; line-height: 1.3;">
                    {{ $kop['alamat'] ?? ($sekolah->alamat ?? 'Tanjungpinang, Kepulauan Riau') }}
                </p>

                <p style="margin: 1px 0 0 0; font-size: 8pt; color: #444; line-height: 1.3;">
                    @if(!empty($kop['kontak'])) Telp/WA: {{ $kop['kontak'] }} @endif
                    @if(!empty($kop['kontak']) && !empty($kop['email'])) | @endif
                    @if(!empty($kop['email'])) Email: {{ $kop['email'] }} @endif
                    @if(!empty($kop['keterangan'])) | {{ $kop['keterangan'] }} @endif
                </p>
            </td>

            {{-- Logo Kanan --}}
            <td style="width: 15%; vertical-align: middle; text-align: center; border: none; padding: 0 0 0 8px;">
                @if(!empty($kop['logo_kanan']) && file_exists(public_path('storage/' . $kop['logo_kanan'])))
                    <img src="{{ asset('storage/' . $kop['logo_kanan']) }}" alt="Logo Kanan" style="max-height: 80px; max-width: 90px; object-fit: contain; display: inline-block;">
                @endif
            </td>
        </tr>
    </table>
</div>
