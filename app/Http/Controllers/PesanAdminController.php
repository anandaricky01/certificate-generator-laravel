<?php

namespace App\Http\Controllers;

use App\Models\PesanAdmin;
use Illuminate\Http\Request;

class PesanAdminController extends Controller
{
    public function index(){
        return view('pesan-admin');
    }

    public function kirimPesan(Request $request, PesanAdmin $pesan){
        $credentials = $this->validate(
            $request, [
                'nama' => 'required|string',
                'nim' => 'required|string',
                'pesan' => 'required|string'
            ]
        );

        $pesan->create($credentials);

        return redirect('/pesan-admin')->with('success', 'Pesan anda sudah diproses admin, silahkan tunggu sekitar 1 - 2 jam agar diproses.');
    }
}
