<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::with('sekolah')->get();
        return view('user.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sekolah = Sekolah::all();
        return view('user.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users,username',
            'tingkat' => 'required',
        ]);
        $pass = 'Admin.' . $request->nik;

        $password = Hash::make($pass);
        User::create([
            'name' => $request->name,
            'tingkat' => $request->tingkat,
            'username' => $request->nik,
            'password' => $password,
            'access' => 'admin',
            'token' => '1',
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Admin Berhasil Diedit!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $uuid)
    {
        $user = User::findOrFail($uuid);
        $sekolah = Sekolah::all();
        return view('user.edit', compact('user', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $uuid)
    {
        $user = User::findOrFail($uuid);
        $request->validate([
            'name' => 'required',
            'tingkat' => 'required',
        ]);
        $user->update([
            'name' => $request->name,
            'tingkat' => $request->tingkat
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Admin Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $uuid)
    {
        $user = User::findOrFail($uuid);
        $user->delete();
    }
}
