<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class staffGudangController extends Controller
{
    public function tambahbarangstaff()
    {
        return view('staff.staff-barang-staff');
    }

    public function sidebarGudang()
    {
        $user = Auth::user();
        return view('staff.gudangSidebar',['user' =>$user]);
    }

    public function dataGudang()
    {
        $user = Auth::user();
        $barangs = Barang::all();
        return view('staff.gudangDatamaster',['user' => $user], compact('barangs'));
    }

    
    public function homeGudang()
    {   
        $user = Auth::user();
        $totalBarang = Barang::sum('stok');
        $totalakun = User::count();
        $jumlahBarang = Barang::count();
        $telahTerjual = History::sum('barang_quantity');
        return view('staff.gudangHome',compact('totalBarang', 'totalakun', 'jumlahBarang', 'telahTerjual'), ['user' => $user]);
    }
}
