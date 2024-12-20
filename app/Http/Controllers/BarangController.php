<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\History;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{

    public function tambahbarang()
    {
        $user = Auth::user();

        return view('barang.tambah-barang', ['user' => $user]);
    }

    public function barangstore(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'kategory' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'satuan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Gambar bersifat opsional
        ]);
    
       
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
        }
    
        
        $data = [
            'kode_barang' => $request->input('kode_barang'),
            'kategory' => $request->input('kategory'),
            'nama_barang' => $request->input('nama_barang'),
            'merk' => $request->input('merk'),
            'stok' => $request->input('stok'),
            'harga' => $request->input('harga'),
            'satuan' => $request->input('satuan'),
            'gambar' => $filename
        ];
    
        try {
            Barang::create($data);
            return redirect()->route('main.datamaster')->with('success', 'Transaksi Berhasil!');
        } catch (\Exception $e) {
            Log::error('Error occurred while adding item: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi nanti.']);
        }
    }
    

    public function hapusBarangStore($id)
    {
    
        $barang = Barang::findOrFail($id);
        
  
        $barang->delete();
    
        
        return redirect()->route('main.datamaster')->with('success', 'Barang berhasil dihapus');
    }
    
    

    public function editbarang($id)
    {
        $barang = Barang::findOrFail($id);
        $user = Auth::user();
        return view('barang.edit-barang', ['user' => $user, 'id' => $id], compact('barang'));
    }

    public function editBarangStore(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'kode_barang' => 'nullable|unique:barangs,kode_barang,' . $barang->id,
            'kategory' => 'nullable',
            'nama_barang' => 'nullable',
            'merk' => 'nullable',
            'stok' => 'nullable',
            'harga' => 'nullable',
            'satuan' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if ($request->hasFile('gambar')) {

            if ($barang->gambar && Storage::exists('public/' . $barang->gambar)) {
                Storage::delete('public/' . $barang->gambar);
            }


            $gambar = $request->file('gambar');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('images', $namaFile, 'public');
            $data['gambar'] = $path;
        } else {

            unset($data['gambar']);
        }


        $barang->update($data);

        return redirect()->route('main.datamaster')->with('success', 'Data berhasil diupdate');
    }

    public function simpan(Request $request) {
        $barangNames = $request->input('barang_name');
        $barangQuantities = $request->input('barang_quantity');
        $barangPrices = $request->input('barang_price');
        $barangTotals = $request->input('barang_total');
    
        $total = $request->input('total');
        $uang = $request->input('uang');
        $kembali = $request->input('kembali');
    
        if (count($barangNames) !== count($barangPrices) || count($barangNames) !== count($barangQuantities)) {
            return response()->json(['success' => false, 'message' => 'Data Tidak Konsisten']);
        }
    

        for($i = 0; $i < count($barangNames); $i++){
            $barang = Barang::where('nama_barang', $barangNames[$i])->first();
    
            if ($barang) {
                if ($barang->stok < $barangQuantities[$i]) {
                 
                    session()->flash('error', "Stok {$barang->nama_barang} tidak mencukupi. Stok tersedia {$barang->stok}");
                    return redirect()->route('main.transaksi');
                }
            }
    

            History::create([
                'barang_name' => $barangNames[$i],
                'barang_quantity' => $barangQuantities[$i],
                'barang_price' => $barangPrices[$i],
                'barang_total' => $barangTotals[$i],
            ]);

            if ($barang) {
                $barang->stok -= $barangQuantities[$i];
                $barang->save();
            }
        }
    

        Transaksi::create([
            'total' => $total,
            'uang' => $uang,
            'kembali' => $kembali
        ]);
    
        return redirect()->route('main.transaksi')->with('success', 'Data Berhasil Ditambahkan');
    }
    
    

}
