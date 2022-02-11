<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Persyaratan;
class PendaftaranController extends Controller
{
    //

    public function peserta()
    {
        return view('peserta');
    }

    public function persyaratan(Request $r)
    {
        $nama = $r->nama;
        $alamat = $r->alamat;
        return view('persyaratan',compact('nama','alamat'));
    }

    public function storePeserta(Request $request)
    {
        $peserta = New Peserta;
        $peserta->nama = $request->nama;
        $peserta->alamat = $request->alamat;
        $peserta->save();

        $persyaratan = new Persyaratan();
        $persyaratan->ijazah = $request->ijazah;
        $persyaratan->id_peserta = $peserta->id;
        $persyaratan->save();

        return redirect('profilepeserta');
    }

    public function profilePeserta()
    {
        // $peserta = Peserta::findOrFail($id);
        return view('profile');
    }

}
