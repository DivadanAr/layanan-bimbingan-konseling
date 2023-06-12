<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\LayananBk;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;

class KonselingBKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layanan-bk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $userId = Auth()->id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $jenis_layanan = LayananBk::all();
        return view('create-konseling', compact('jenis_layanan', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
}
