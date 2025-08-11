<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.home', compact('user'));
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->remember == "on" ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $session = $request->session()->regenerate();
            $id = Auth::user()->uuid;

            return redirect()->intended('/home');
        }
        return back()->with('error', 'Username atau Password Salah')
            ->withInput($request->only('username'));
    }
    /**
     * Untuk Logout
     */
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/signin')->with('success', 'Berhasil Logout');
    }
    /**
     * Ganti Password Pertama Kali
     */
    public function gantiPassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
                'confirm-password' => 'required|same:password',
            ],
            [
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 8 karakter',
                'password.regex' => 'Password harus mengandung huruf kapital, angka, dan simbol',
                'confirm-password.required' => 'Konfirmasi password harus diisi',
                'confirm-password.same' => 'Konfirmasi password tidak sesuai',
            ]
        );
        $password = Hash::make($request->password);
        $user = Auth::user();
        $user->update([
            'password' => $password,
            'token' => 0,
        ]);
        return redirect('/home')->with('success', 'Password berhasil diubah');
    }
    /**
     * Reset Password
     */
    public function resetPassword(String $uuid)
    {
        $user = User::findOrFail($uuid);
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];
        $password = Hash::make($rand);
        $user->update([
            'password' => $password,
            'token' => 1,
        ]);

        return response()->json([
            'status' => 'success',
            'password' => $rand
        ]);
    }
}
