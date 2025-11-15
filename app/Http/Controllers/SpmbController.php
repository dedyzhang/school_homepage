<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpmbController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user->access == 'superadmin') {
            $sekolah = Sekolah::all();
        } else {
            $sekolah = Sekolah::where('uuid', $user->tingkat)->get();
        }
        return view('spmb.index',compact('sekolah'));
    }
    
    public function show(String $sekolah) {
        $sekolah = Sekolah::findOrFail($sekolah);
        return view('spmb.show',compact('sekolah'));
    }
}
