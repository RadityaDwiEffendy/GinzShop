<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

$user = Auth::user();


class AuthController extends Controller
{
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function managementAkun()
    {
        $akun = User::all();
        $user = Auth::user();
        return view('main.akun-manager', ['user'=> $user], compact('akun'));
    }



    public function sidebar()
    {
        $user = Auth::user();
        return view('main.sidebar',['user' => $user]);
    }

    public function datamaster()
    {
        $user = Auth::user();
        $barangs = Barang::all();
        return view('main.datamaster', compact('barangs'), ['user' =>$user]);
    }

    public function transaksi(Request $request)
    {
        $barank = Barang::all();
        $user = Auth::user();
        if ($request->ajax()) {
            $query = $request->input('search');
            $result = Barang::where('kode_barang','like', "%{$query}%");
                


            if(is_numeric($query) && strlen($query) == 4){
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

        return view('main.transaksi', ['user'=>$user, 'barank' => $barank]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('main.profile', ['user' => $user]);
    }


    


    




}