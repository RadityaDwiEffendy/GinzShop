<?php

namespace App\Http\Controllers;

use App\Models\Acctugas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class TugasController extends Controller
{
    public function tugasPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'reward' => 'required',
            'kasir_job' => 'nullable|unique:tugas,kasir_job',
            'kurir_job' => 'nullable'
        ]);

        $tugas = Tugas::create([
            'title' => $request->title,
            'description' => $request->description,
            'reward' => $request->reward,
            'kasir_job' => $request->kasir_job,
            'kurir_job' => $request->kurir_job,
        ]);


        return redirect()->route('main.tugas')->with('success', 'Tugas Berhasil di Post');
    }
    
    public function tugasPicker(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'reward' => 'required',
            'kasir_job' => 'nullable|unique:acctugas,kasir_job',
            'kurir_job' => 'nullable'
        ]);
    
       
        $picker = Auth::user()->name;
    
        $tugas = Tugas::findOrFail($id);
    
        
        Acctugas::create([
            'picker' => $picker, 
            'title' => $tugas->title,
            'description' => $tugas->description,
            'reward' => $tugas->reward,
            'kasir_job' => $tugas->kasir_job,
            'kurir_job' => $tugas->kurir_job,
        ]);
    
        
        $tugas->delete();
    
        return redirect()->route('main.tugas')->with('success', 'Tugas Berhasil di Ambil dan Dipindahkan');
    }
    


    public function hapusTugas($id)
    {
 
        $tugasPicked = Acctugas::findOrFail($id);
    

        if ($tugasPicked->picker !== Auth::user()->name) {
            return redirect()->route('main.tugas')->with('error', 'Tugas tidak valid atau sudah diambil oleh orang lain.');
        }

        $tugasPicked->delete();
    
        return redirect()->route('main.tugas')->with('success', 'Tugas Selesai.');
    }
    


}
