<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $berita = Berita::orderBy('tanggal', 'DESC')->get();
        return view('home.index', compact('berita'));
    }

    public function profile(String $tingkat)
    {
        $toUpper = strtoupper($tingkat);
        $sekolah = Sekolah::with('profile')->where('kode', $toUpper)->first();
        $berita = Berita::where('tingkat', $sekolah->uuid)->orderBy('tanggal', 'DESC')->get();

        return view('home.profile', compact('sekolah', 'berita'));
    }

    /**
     * Berita Index
     */
    public function berita()
    {
        $berita = Berita::orderBy('tanggal', 'DESC')->paginate(6);
        return view('home.berita.index', compact('berita'));
    }
    /**
     * Berita - Show Berita
     */
    public function showBerita(String $uuid)
    {
        $berita = Berita::findOrFail($uuid);

        return view('home.berita.show', compact('berita'));
    }
}
