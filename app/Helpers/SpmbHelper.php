<?php

namespace App\Helpers;

use App\Models\Sekolah;
use App\Models\spmbSettings;

class SpmbHelper
{
    /**
     * Ambil pengaturan Kop Surat sekolah atau default
     */
    public static function getKopSurat(string $idSekolah, ?Sekolah $sekolah = null): array
    {
        if (!$sekolah) {
            $sekolah = Sekolah::find($idSekolah);
        }

        $setting = spmbSettings::where([
            ['id_sekolah', '=', $idSekolah],
            ['jenis', '=', 'kop_surat_spmb']
        ])->first();

        $data = [];
        if ($setting && !empty($setting->nilai)) {
            $unserialized = @unserialize($setting->nilai);
            if (is_array($unserialized)) {
                $data = $unserialized;
            }
        }

        return [
            'logo_kiri' => $data['logo_kiri'] ?? null,
            'logo_kanan' => $data['logo_kanan'] ?? null,
            'nama_yayasan' => $data['nama_yayasan'] ?? 'YAYASAN MAITREYAWIRA',
            'nama_sekolah' => $data['nama_sekolah'] ?? ($sekolah->nama ?? 'SEKOLAH MAITREYAWIRA'),
            'alamat' => $data['alamat'] ?? ($sekolah->alamat ?? 'Tanjungpinang, Kepulauan Riau'),
            'kontak' => $data['kontak'] ?? ($sekolah->contact ?? ''),
            'email' => $data['email'] ?? ($sekolah->email ?? ''),
            'keterangan' => $data['keterangan'] ?? 'Sistem Penerimaan Murid Baru (SPMB)',
        ];
    }

    /**
     * Default template Surat Pernyataan jika sekolah belum mengubahnya
     */
    public static function getDefaultTemplate(): string
    {
        return '<p style="text-align: center; font-size: 15pt; margin-bottom: 2px;"><strong>SURAT PERNYATAAN CALON PESERTA DIDIK BARU</strong></p>
<p style="text-align: center; font-size: 13pt; margin-top: 0; margin-bottom: 5px;"><strong>[SEKOLAH]</strong></p>
<p style="text-align: center; font-size: 11pt; color: #555; margin-top: 0; margin-bottom: 15px;">TAHUN AJARAN [TAHUN_AJARAN]</p>

<p>Saya yang bertanda tangan di bawah ini:</p>

<table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;" cellpadding="5">
    <tbody>
        <tr>
            <td style="width: 32%; vertical-align: top;">Nama Penyetuju / Pencentang</td>
            <td style="width: 3%; vertical-align: top;">:</td>
            <td style="width: 65%; vertical-align: top;"><strong>[NAMA_PENYETUJU]</strong></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Nama Calon Peserta Didik</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;"><strong>[NAMA_SISWA]</strong></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">NISN</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">[NISN]</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Tempat, Tanggal Lahir</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">[TEMPAT_LAHIR], [TANGGAL_LAHIR]</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Jenis Kelamin</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">[JENIS_KELAMIN]</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Agama</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">[AGAMA]</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Sekolah Tujuan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">[SEKOLAH]</td>
        </tr>
    </tbody>
</table>

<p>Menyatakan dengan sesungguhnya dan penuh kesadaran serta tanggung jawab bahwa:</p>

<ol style="margin-left: 20px; line-height: 1.8;">
    <li>Seluruh data, identitas, dan keterangan yang dicantumkan dalam formulir pendaftaran ini adalah <strong>benar, sah, dan sesuai dengan dokumen aslinya</strong>.</li>
    <li>Bersedia mematuhi dan menjunjung tinggi seluruh tata tertib, peraturan akademik, dan ketentuan yang berlaku di <strong>[SEKOLAH]</strong>.</li>
    <li>Bersedia mengikuti seluruh tahapan seleksi, wawancara, verifikasi berkas, dan proses penerimaan siswa baru sesuai jadwal yang telah ditentukan pihak sekolah.</li>
    <li>Apabila di kemudian hari terbukti bahwa data atau dokumen yang diberikan tidak benar/dipalsukan, maka saya bersedia menerima sanksi sesuai ketentuan sekolah termasuk <strong>pembatalan status kelulusan / dikeluarkan dari sekolah</strong>.</li>
</ol>

<p style="line-height: 1.8;">Demikian surat pernyataan ini saya buat dan setujui secara sadar tanpa adanya paksaan dari pihak manapun untuk dipergunakan sebagai kelengkapan pendaftaran SPMB.</p>';
    }

    /**
     * Format tanggal ke bahasa Indonesia (contoh: 19 Oktober 2026)
     */
    public static function formatTanggalIndonesia($date): string
    {
        if (!$date) {
            return '-';
        }

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $time = is_numeric($date) ? $date : strtotime($date);
        if (!$time) {
            return (string)$date;
        }

        $tgl = date('j', $time);
        $bln = $bulan[(int)date('n', $time)] ?? date('F', $time);
        $thn = date('Y', $time);

        return "{$tgl} {$bln} {$thn}";
    }

    /**
     * Render template surat pernyataan dengan data siswa & sekolah
     */
    public static function renderPernyataan(string $template, array $biodata, Sekolah $sekolah, ?string $namaPenyetuju = null, ?string $nis = null, $tanggal = null): string
    {
        $namaSiswa = $biodata['nama'] ?? '';
        $tempatLahir = $biodata['tempat_lahir'] ?? '';
        $tanggalLahirRaw = $biodata['tanggal_lahir'] ?? null;
        $tanggalLahir = $tanggalLahirRaw ? self::formatTanggalIndonesia($tanggalLahirRaw) : '-';

        $jkRaw = strtolower($biodata['jk'] ?? '');
        $jk = ($jkRaw === 'l' || $jkRaw === 'laki-laki') ? 'Laki-Laki' : (($jkRaw === 'p' || $jkRaw === 'perempuan') ? 'Perempuan' : '-');

        $agama = $biodata['agama'] ?? '-';
        $nisn = !empty($biodata['nisn']) ? $biodata['nisn'] : '-';
        $alamat = $biodata['alamat'] ?? '-';
        $noHp = $biodata['no_handphone'] ?? ($biodata['no_whatsapp'] ?? '-');

        $penyetuju = $namaPenyetuju ?: ($biodata['nama_penyetuju'] ?? $namaSiswa);
        $tglPernyataan = self::formatTanggalIndonesia($tanggal ?: now());

        $currentYear = (int)date('Y');
        $tahunAjaran = $currentYear . '/' . ($currentYear + 1);

        $replacements = [
            '[NAMA_SISWA]' => $namaSiswa,
            '[TEMPAT_LAHIR]' => $tempatLahir,
            '[TANGGAL_LAHIR]' => $tanggalLahir,
            '[JENIS_KELAMIN]' => $jk,
            '[AGAMA]' => $agama,
            '[NISN]' => $nisn,
            '[ALAMAT]' => $alamat,
            '[NO_HP]' => $noHp,
            '[NO_HANDPHONE]' => $noHp,
            '[SEKOLAH]' => $sekolah->nama,
            '[NAMA_SEKOLAH]' => $sekolah->nama,
            '[KODE_SEKOLAH]' => $sekolah->kode,
            '[TAHUN_AJARAN]' => $tahunAjaran,
            '[NIS]' => $nis ?: '-',
            '[NAMA_PENYETUJU]' => $penyetuju,
            '[TANGGAL_PERNYATAAN]' => $tglPernyataan,
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $template);
    }
}
