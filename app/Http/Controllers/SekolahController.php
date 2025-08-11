<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = Sekolah::all()->sortBy('nama');
        return view('sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:sekolah,kode',
            'nama' => 'required',
            'alamat' => 'required',
            'contact' => 'required',
            'email' => 'required|email'
        ]);

        Sekolah::create([
            'kode' => strtoupper($request->kode),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'contact' => $request->contact,
            'email' => $request->email
        ]);

        return redirect()->route('sekolah.index')->with(['success' => 'Data Sekolah Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $uuid)
    {
        $sekolah = Sekolah::findOrFail($uuid);
        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $uuid)
    {
        $sekolah = Sekolah::findOrFail($uuid);
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'contact' => 'required',
            'email' => 'required|email'
        ]);
        $sekolah->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'contact' => $request->contact,
            'email' => $request->email
        ]);
        return redirect()->route('sekolah.index')->with(['success' => 'Data Sekolah Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $uuid)
    {
        $sekolah = Sekolah::findOrFail($uuid);
        $sekolah->delete();
    }
}
