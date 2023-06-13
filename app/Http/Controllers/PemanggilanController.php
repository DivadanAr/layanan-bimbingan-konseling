<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\Pemanggilan;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class PemanggilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth()->id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $walas = Kelas::where('wali_kelas_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $pemanggilan = Pemanggilan::all();
        return view('data-pemanggilan', compact('pemanggilan', 'siswa','kelas','guru', 'walas'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth()->id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $walas = Kelas::where('wali_kelas_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $pemanggilan = Pemanggilan::all();
        return view('create-pemanggilan', compact('pemanggilan', 'siswa','kelas','guru', 'walas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $guru = GuruBk::where('user_id', Auth()->id())->first();
        $walas = Kelas::where('guru_bk_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $walas->id)->first();

        $pemanggilan = Pemanggilan::create([
            'siswa_id'=> $siswa->id,
            'guru_bk_id' => $walas->guru_bk_id,
            'wali_kelas_id' => $walas->wali_kelas_id,
            'hari' => $request->input('hari'),
            'tanggal' => $request->input('tanggal'),
            'jam' => $request->input('jam'),
            'tempat' => $request->input('tempat'),
            'acara' => $request->input('acara'),

        ]);

        return redirect()->route('pemanggilan.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemanggilan $pemanggilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemanggilan $pemanggilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemanggilan $pemanggilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemanggilan = Pemanggilan::findOrFail($id);

        $pemanggilan->delete();
      

        return redirect()->route('pemanggilan.index')->with('success', 'data pemanggilan berhasil dihapus.');
    }

    public function exportpdf($id)
    {

        $formattedDate = Carbon::now()->format('d F Y');

        $pemanggilan = Pemanggilan::findOrFail($id);

        $userId = Auth::id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $walas = Kelas::where('wali_kelas_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();

    
        $data = [
            'guru' => $guru,
            'kelas' => $kelas,
            'walas' => $walas,
            'siswa' => $siswa,
            'pemanggilan' => $pemanggilan,
            'formattedDate' => $formattedDate,
        ];
    
        $pdf = PDF::loadView('exportpdf', $data);
        $pdf->setPaper('A4', 'portrait');
    
        return $pdf->stream("Surat Pemanggilan Orang Tua.pdf");
    }
}
