<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->access == "superadmin") {
            $berita = Berita::with('sekolah')->orderBy('tanggal', 'DESC')->get();
        } else {
            $berita = Berita::with('sekolah')->where('tingkat', $user->tingkat)->orderBy('tanggal', 'DESC')->get();
        }
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sekolah = Sekolah::all();
        $user = Auth::user();
        return view('berita.create', compact('sekolah', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate(
            [
                'gambar' => 'required|max:2048|mimes:png,jpg',
                'judul' => 'required',
                'isi' => 'required',
                'tingkat' => 'required'
            ],
            [
                'judul.required' => 'Judul Wajib Diisi',
                'isi.required' => 'Isi Berita Wajib Diisi',
                'tingkat.required' => 'Kategori Tingkat Wajib Diisi',
                'gambar.required' => 'Gambar Wajib Diisi',
                'gambar.max' => 'Gambar Harus Dibawah 2 MB',
                'gambar.mimes' => 'Gambar Harus Berekstensi PNG dan JPG',
            ]
        );
        $file = $request->file('gambar');
        $filename = $file->hashName();
        $file->storeAs('berita', $filename);

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tingkat' => $request->tingkat,
            'tanggal' => date('Y-m-d H:i:s'),
            'gambar' => $filename,
            'author' => $user->name,
        ]);

        return redirect()->route('berita.index')->with(['success' => 'Berita Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $uuid)
    {
        $berita = Berita::findOrFail($uuid);
        $tingkat = $berita->sekolah->nama;

        return response()->json([
            'success' => true,
            'berita' => $berita,
            'tingkat' => $tingkat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $uuid)
    {
        $berita = Berita::findOrFail($uuid);
        $sekolah = Sekolah::all();

        return view('berita.edit', compact('berita', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $uuid)
    {
        $berita = Berita::findOrFail($uuid);
        $request->validate(
            [
                'gambar' => 'max:2048|mimes:png,jpg',
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Diisi',
                'isi.required' => 'Isi Berita Wajib Diisi',
                'gambar.max' => 'Gambar Harus Dibawah 2 MB',
                'gambar.mimes' => 'Gambar Harus Berekstensi PNG dan JPG',
            ]
        );
        if ($request->hasFile('gambar')) {
            $oldPath = storage_path('app/public/berita/') . $berita->gambar;
            unlink($oldPath);
            $file = $request->file('gambar');
            $filename = $file->hashName();
            $file->storeAs('berita', $filename);

            $berita->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $filename,
            ]);
        } else {
            $berita->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
            ]);
        }
        return redirect()->route('berita.index')->with(['success' => 'Berita Berhasil Ditambah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $uuid)
    {
        $berita = Berita::findOrFail($uuid);
        $oldPath = storage_path('app/public/berita/') . $berita->gambar;
        unlink($oldPath);

        $berita->delete();
    }
}
