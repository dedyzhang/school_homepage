<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->access == 'superadmin') {
            $sekolah = Sekolah::all();
        } else {
            $sekolah = Sekolah::where('uuid', $user->tingkat)->get();
        }
        return view('profile.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $uuid)
    {
        $sekolah = Sekolah::with('profile')->findOrFail($uuid);

        return view('profile.show', compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $uuid)
    {
        $sekolah = Sekolah::with('profile')->findOrFail($uuid);

        return view('profile.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $uuid)
    {
        $sekolah = Sekolah::with('profile')->findOrFail($uuid);

        $request->validate([
            'gambar_kepsek' => 'max:2048|mimes:png,jpg,jpeg',
            'gambar_sekolah' => 'max:2048|mimes:png,jpg,jpeg'
        ], [
            'gambar_kepsek.max' => 'Gambar Harus Dibawah 2 MB',
            'gambar_kepsek.mimes' => 'Gambar Harus Berekstensi PNG dan JPG',
            'gambar_sekolah.max' => 'Gambar Harus Dibawah 2 MB',
            'gambar_sekolah.mimes' => 'Gambar Harus Berekstensi PNG dan JPG',
        ]);

        if ($sekolah->profile) {
            if ($request->hasFile('gambar_kepsek')) {
                if ($sekolah->profile->gambar_kepsek != null) {
                    $oldLink = storage_path('app/public/kepsek/') . $sekolah->profile->gambar_kepsek;
                    if (file_exists($oldLink)) {
                        unlink($oldLink);
                    }
                }
                $file = $request->file('gambar_kepsek');
                $filename = $file->hashName();
                $file->storeAs('kepsek', $filename);
            }
            if ($request->hasFile('gambar_sekolah')) {
                if ($sekolah->profile->gambar_sekolah != null) {
                    $oldLink = storage_path('app/public/sekolah/') . $sekolah->profile->gambar_sekolah;
                    if (file_exists($oldLink)) {
                        unlink($oldLink);
                    }
                }
                $file = $request->file('gambar_sekolah');
                $filename_sekolah = $file->hashName();
                $file->storeAs('sekolah', $filename_sekolah);
            }

            $jumlah_siswa = array(
                'l' => $request->jumlah_siswa_laki,
                'p' => $request->jumlah_siswa_perempuan
            );
            $jumlah_siswa = serialize($jumlah_siswa);

            $jumlah_guru = array(
                'l' => $request->jumlah_guru_laki,
                'p' => $request->jumlah_guru_perempuan
            );
            $jumlah_guru = serialize($jumlah_guru);

            $pendik_guru = array(
                'smp' => $request->pendik_akhir_guru_smp,
                'sma' => $request->pendik_akhir_guru_sma,
                's1' => $request->pendik_akhir_guru_s1,
                's2' => $request->pendik_akhir_guru_s2,
            );
            $pendik_guru = serialize($pendik_guru);

            $prestasi_akademik = array(
                'kota' => $request->prestasi_akademik_kota,
                'provinsi' => $request->prestasi_akademik_provinsi,
                'nasional' => $request->prestasi_akademik_nasional,
            );
            $prestasi_akademik = serialize($prestasi_akademik);

            $prestasi_non_akademik = array(
                'kota' => $request->prestasi_non_akademik_kota,
                'provinsi' => $request->prestasi_non_akademik_provinsi,
                'nasional' => $request->prestasi_non_akademik_nasional,
            );
            $prestasi_non_akademik = serialize($prestasi_non_akademik);

            $sekolah->profile->update([
                'nss' => $request->nss,
                'npsn' => $request->npsn,
                'id_sekolah' => $sekolah->uuid,
                'alamat_jalan' => $request->alamat,
                'alamat_kelurahan' => $request->kelurahan,
                'alamat_kecamatan' => $request->kecamatan,
                'alamat_kota' => $request->kota,
                'alamat_provinsi' => $request->provinsi,
                'alamat_kode_pos' => $request->kode_pos,
                'maps' => $request->maps,
                'nama_kepsek' => $request->nama_kepsek,
                'gambar_kepsek' => $filename ?? $sekolah->profile->gambar_kepsek,
                'gambar_sekolah' => $filename_sekolah ?? $sekolah->profile->gambar_sekolah,
                'sk_izin_operasional' => $request->sk_izin_operasional,
                'tanggal_izin_operasional' => $request->tanggal_izin_operasional,
                'deskripsi' => $request->deskripsi,
                'visi_sekolah' => $request->visi_sekolah,
                'misi_sekolah' => $request->misi_sekolah,
                'kata_sambutan_kepsek' => $request->kata_sambutan_kepsek,
                'akreditasi' => $request->akreditasi,
                'jumlah_siswa' => $jumlah_siswa,
                'jumlah_guru' => $jumlah_guru,
                'jumlah_guru_sertifikasi' => $request->jumlah_guru_sertifikasi,
                'pendik_akhir_guru' => $pendik_guru,
                'prestasi_akademik' => $prestasi_akademik,
                'prestasi_non_akademik' => $prestasi_non_akademik,
            ]);
        } else {
            if ($request->hasFile('gambar_kepsek')) {
                $file = $request->file('gambar_kepsek');
                $filename = $file->hashName();
                $file->storeAs('kepsek', $filename);
            } else {
                $filename = '';
            }
            if ($request->hasFile('gambar_sekolah')) {
                $file = $request->file('gambar_sekolah');
                $filename_sekolah = $file->hashName();
                $file->storeAs('sekolah', $filename_sekolah);
            } else {
                $filename_sekolah = '';
            }
            $jumlah_siswa = array(
                'l' => $request->jumlah_siswa_laki,
                'p' => $request->jumlah_siswa_perempuan
            );
            $jumlah_siswa = serialize($jumlah_siswa);

            $jumlah_guru = array(
                'l' => $request->jumlah_guru_laki,
                'p' => $request->jumlah_guru_perempuan
            );
            $jumlah_guru = serialize($jumlah_guru);

            $pendik_guru = array(
                'smp' => $request->pendik_akhir_guru_smp,
                'sma' => $request->pendik_akhir_guru_sma,
                's1' => $request->pendik_akhir_guru_s1,
                's2' => $request->pendik_akhir_guru_s2,
            );
            $pendik_guru = serialize($pendik_guru);

            $prestasi_akademik = array(
                'kota' => $request->prestasi_akademik_kota,
                'provinsi' => $request->prestasi_akademik_provinsi,
                'nasional' => $request->prestasi_akademik_nasional,
            );
            $prestasi_akademik = serialize($prestasi_akademik);

            $prestasi_non_akademik = array(
                'kota' => $request->prestasi_non_akademik_kota,
                'provinsi' => $request->prestasi_non_akademik_provinsi,
                'nasional' => $request->prestasi_non_akademik_nasional,
            );
            $prestasi_non_akademik = serialize($prestasi_non_akademik);

            Profile::create([
                'nss' => $request->nss,
                'npsn' => $request->npsn,
                'id_sekolah' => $sekolah->uuid,
                'alamat_jalan' => $request->alamat,
                'alamat_kelurahan' => $request->kelurahan,
                'alamat_kecamatan' => $request->kecamatan,
                'alamat_kota' => $request->kota,
                'alamat_provinsi' => $request->provinsi,
                'alamat_kode_pos' => $request->kode_pos,
                'maps' => $request->maps,
                'nama_kepsek' => $request->nama_kepsek,
                'gambar_kepsek' => $filename,
                'gambar_sekolah' => $filename_sekolah,
                'sk_izin_operasional' => $request->sk_izin_operasional,
                'tanggal_izin_operasional' => $request->tanggal_izin_operasional,
                'deskripsi' => $request->deskripsi,
                'visi_sekolah' => $request->visi_sekolah,
                'misi_sekolah' => $request->misi_sekolah,
                'kata_sambutan_kepsek' => $request->kata_sambutan_kepsek,
                'akreditasi' => $request->akreditasi,
                'jumlah_siswa' => $jumlah_siswa,
                'jumlah_guru' => $jumlah_guru,
                'jumlah_guru_sertifikasi' => $request->jumlah_guru_sertifikasi,
                'pendik_akhir_guru' => $pendik_guru,
                'prestasi_akademik' => $prestasi_akademik,
                'prestasi_non_akademik' => $prestasi_non_akademik,
            ]);
        }
        $sekolah->update([
            'email' => $request->email,
            'contact' => $request->contact
        ]);

        return redirect()->route('profile.show', $sekolah->uuid)->with('success', 'Profil Sekolah Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
