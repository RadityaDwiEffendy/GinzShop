<?php

namespace App\Http\Controllers;

use App\Models\Acctugas;
use App\Models\Barang;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

$user = Auth::user();


class AuthController extends Controller
{

    public function verifyPassword(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'adnda harus login terlebih dahulu'], 401);
        }
        $request->validate([
            'password' => 'required'
        ]);

        $user = Auth::user();


        if (Hash::check($request->password, $user->password)){
            return response()->json(['status' => 'success'],200);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Password Salah!'],403);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function managementAkun()
    {
        $akun = User::all();
        $user = Auth::user();
        return view('main.akun-manager', ['user' => $user], compact('akun'));
    }



    public function sidebar()
    {
        $user = Auth::user();
        return view('main.sidebar', ['user' => $user]);
    }

    public function datamaster()
    {
        $user = Auth::user();
        $barangs = Barang::all();
        return view('main.datamaster', compact('barangs', 'user'));
    }
    
    public function transaksi(Request $request)
    {
        $barank = Barang::all();
        $user = Auth::user();
        if ($request->ajax()) {
            $query = $request->input('search');
            $result = Barang::where('kode_barang', 'like', "%{$query}%");



            if (is_numeric($query) && strlen($query) == 4) {
                $result = Barang::Where('kode_barang', $query)->get();
            }

            $html = '';
            if ($result->isEmpty()) {
                $html = '<p> Barang Tidak Di Temukan </p>';
            } else {
                $html .= '<div class = "resbar">';
                foreach ($result as $barang) {
                    $html .= '<p>' . $barang->nama_barang . '</p>' .
                        '<button class="add-barang" data-id="' . $barang->id . '" data-nama="' . $barang->nama_barang . '" data-harga="' . $barang->harga . '" type="button">Add</button>';
                }

                $html .= '</div>';
            }

            return response()->json(['html' => $html]);
        }

        return view('main.transaksi', ['user' => $user, 'barank' => $barank]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('main.profile', ['user' => $user]);
    }


    public function tugas()
{
 
    $tugasPicked = Acctugas::where('picker', Auth::user()->name)->first(); 
    $user = Auth::user();


    if ($user->role_id == 3) {
        $tugas = Tugas::whereNotNull('kasir_job')->get();
    } elseif ($user->role_id == 2) {
        $tugas = Tugas::whereNotNull('kurir_job')->get();
    } else {
        $tugas = [];
    }

    return view('main.tugas', compact('user', 'tugas', 'tugasPicked'));
}

}
