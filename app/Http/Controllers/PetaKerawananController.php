<?php

namespace App\Http\Controllers;

use App\Exports\PetaKerawananExport;
use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\Kerawanan;
use App\Models\PetaKerawanan;
use App\Models\Siswa;
use App\Models\Walas;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
 

class PetaKerawananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('wali_kelas')) {
            $userId = Auth()->id();
            $walasId = Walas::where('user_id', $userId)->first();
            $kelasId = Kelas::where('wali_kelas_id', $walasId->id)->first();
            $data = PetaKerawanan::where('kelas_id', $kelasId->id)->get();
    
            $data = $data->groupBy('siswa_id')->map(function ($item) {
                $item[0]->jenis_kerawanan = $item->pluck('jenis_kerawanan.jenis_kerawanan')->implode(', ');
                return $item[0];
            });
    
            return view('data-peta-kerawanan', compact('data'));
    
        } 
        
        if (Auth::user()->hasRole('guru_bk')){
            $userId = Auth()->id();
            $walasId = GuruBk::where('user_id', $userId)->first();
            $kelasId = Kelas::where('guru_bk_id', $walasId->id)->first();
            $data = PetaKerawanan::where('kelas_id', $kelasId->id)->get();
    
            $data = $data->groupBy('siswa_id')->map(function ($item) {
                $item[0]->jenis_kerawanan = $item->pluck('jenis_kerawanan.jenis_kerawanan')->implode(', ');
                return $item[0];
            });
    
            return view('data-peta-kerawanan', compact('data'));
    
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Auth::user()->hasRole('guru_bk')) {
            $userId = Auth()->id();
            $GuruBk = GuruBk::where('user_id', $userId)->first();
            $kelas = Kelas::where('guru_bk_id', $GuruBk->id)->first();
            $siswa = Siswa::where('kelas_id', $kelas->id)->get();
            $jenis_kerawanan = Kerawanan::all();
    
            return view('create-peta-kerawanan', compact('siswa','jenis_kerawanan'));
        } 
        
        if(Auth::user()->hasRole('wali_kelas')){
            $userId = Auth()->id();
            $walas = Walas::where('user_id', $userId)->first();
            $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
            // $siswa = Siswa::where('kelas_id', $kelas->id)->get();
            $siswa = $walas->kelas->siswa()->whereDoesntHave('peta_kerawanan')->get();
            $jenis_kerawanan = Kerawanan::all(); 

            return view('create-peta-kerawanan', compact('siswa','jenis_kerawanan'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('wali_kelas')) {
            $userId = Auth()->id();
            $walas = Walas::where('user_id', $userId)->first();
            $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
            $validator = Validator::make($request->all(), [
                'siswa_id' => 'required',
                'jenis_kerawanan_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $request->validate([
                'siswa_id' => 'required',
            ]);
    
            $validated = $request->validate([
                'jenis_kerawanan_id' => 'required|array',
            ]);
    
                foreach ($validated['jenis_kerawanan_id'] as $jenisKerawananId) {
                    PetaKerawanan::create([
                        'siswa_id' => $request->input('siswa_id'),
                        'kelas_id' => $kelas->id,
                        'wali_kelas_id' => $walas->id,    
                        'jenis_kerawanan_id' => $jenisKerawananId,
                    ]);
                }
            
            return redirect()->route('peta-kerawanan.index')->with('succes', 'Kerawanan siswa '.$request->input('nama').', berhasil ditambahkamn');
    
        }

        if (Auth::user()->hasRole('guru_bk')) {
            $userId = Auth()->id();
            $wguru = GuruBk::where('user_id', $userId)->first();
            $kelas = Kelas::where('guru_bk_id', $wguru->id)->first();
            $validator = Validator::make($request->all(), [
                'siswa_id' => 'required',
                'jenis_kerawanan_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $request->validate([
                'siswa_id' => 'required',
            ]);
    
            $validated = $request->validate([
                'jenis_kerawanan_id' => 'required|array',
            ]);
    
                foreach ($validated['jenis_kerawanan_id'] as $jenisKerawananId) {
                    PetaKerawanan::create([
                        'siswa_id' => $request->input('siswa_id'),
                        'kelas_id' => $kelas->id,
                        'wali_kelas_id' => $kelas->wali_kelas_id,    
                        'jenis_kerawanan_id' => $jenisKerawananId,
                    ]);
                }
            
            return redirect()->route('peta-kerawanan.index')->with('succes', 'Kerawanan siswa '.$request->input('nama').', berhasil ditambahkamn');
    
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export() 
    {
        
    return Excel::download(new PetaKerawananExport, 'Rekap Peta Kerawanan.xlsx')->deleteFileAfterSend();
    }

    
}
